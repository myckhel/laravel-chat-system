<?php

namespace Myckhel\ChatSystem\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Collection;
// use App\Traits\HasVideo;
// use App\Traits\HasImage;
use Carbon\Carbon;
use Myckhel\ChatSystem\Traits\ChatEvent\HasChatEvent;
use Myckhel\ChatSystem\Contracts\ChatEventMaker;
use Myckhel\ChatSystem\Traits\HasMeta;
use Myckhel\ChatSystem\Database\Factories\MessageFactory;
use Myckhel\ChatSystem\Traits\Config;

class Message extends Model
{
    use HasFactory, HasChatEvent, HasMeta, Config;
    protected $fillable = ['conversation_id', 'user_id', 'reply_id', 'reply_type', 'message', 'type'];
    protected $casts    = ['conversation_id' => 'int', 'reply_id' => 'int', 'user_id' => 'int'];
    protected $searches = ['message'];
    protected $appends  = ['isSender'];
    protected $hidden   = ['media'];

    function scopeWhereNotSender($q, $user = null) {
      $user_id = $user->id ?? $user ?? auth()->user()->id;
      $q->where('user_id', '!=', $user_id);
    }

    function scopeWhereReply($q, $reply) {
      $q->when($reply['reply_id'] ?? null,
        fn ($q) => $q->whereReplyId($reply['reply_id'])
      )->when(
        $reply['reply_type'] ?? null,
        fn ($q) => $q->whereReplyType($reply['reply_type'])
      );
    }

    protected static function newFactory(){
      return MessageFactory::new();
    }

    function scopeNotMsgEvents($q, $type = null, $user = null, $conversationScope = null) {
      $user_id = $user->id ?? $user ?? auth()->user()->id;

      $q->whereHas('conversation', fn ($q) =>
        $q->whereDoesntHave('chatEvents', fn ($q) =>
          $q->whereMakerId($user_id)
          ->when($type, fn ($q) => $q->whereType($type))
          ->whereColumn('created_at', '>', 'messages.created_at')
        )->when($conversationScope, $conversationScope)
      );
    }

    function scopeWhereRelatedToUser($q, $user = null) {
      $q->whereHas('conversation', fn ($q) =>
        $q->whereHas('participants', fn ($q) => $q->whereUserId($user->id ?? $user))
      );
    }

    function scopeHasEvent($q, callable $eventScope = null) {
      $q->whereHas('chatEvents', fn ($q) =>
        $q->when($eventScope, $eventScope)
      );
    }

    function scopeHasNoEvent($q, callable $eventScope = null) {
      $q->whereDoesntHave('chatEvents', fn ($q) =>
        $q->when($eventScope, $eventScope)
      );
    }

    function getSystemAttribute() {
      return $this->id < 100;
    }

    function scopeWhereConversationWasntDeleted($q, ChatEventMaker $by = null) {
      $q->whereDoesntHave('conversation', fn ($q) =>
        $q->whereHas('chatEvents', fn ($q) =>
          $q->whereType('delete')
          ->whereColumn('created_at', '>', 'messages.created_at')
          ->where(fn ($q) => $q->where('all', true)->when($by, fn ($q) => $q->orWhere('maker_id', $by->id)))
        )
      );
    }

    function getIsSenderAttribute() {
      $user_id = auth()->user()->id ?? null;
      return $user_id === $this->user_id;
    }

    function makeDelete($user, $all = false) {
      return $this->makeChatEvent($user, 'delete', $all);
    }

    function participantsHasDeleted($maker_id = null){
      [$participantsCount, $deleteEventsCount] = [
        $this->conversation->participants()->count(),
        $this->chatEvents(false)->whereType('delete')
        ->when($maker_id, fn ($q) => $q->where('maker_id', '!=', $maker_id))
        ->count()
      ];
      return $deleteEventsCount == $participantsCount-1;
    }

    function makeRead($user) {
      return $this->makeChatEvent($user, 'read');
    }
    function makeDelivered($user) {
      return $this->makeChatEvent($user, 'deliver');
    }

    private function makeChatEvent($user, $type = 'read', $all = false) {
      $create = [
        'made_id'    => $this->id,
        'made_type'  => $this::class,
        'type'       => $type,
        'all'        => $all,
      ];

      return $user->chatEventMakers()->firstOrCreate($create, $create);
    }

    // public function otherParticipants($user = null){
    //   $user_id = $user->id ?? $user ?? auth()->user()->id ?? null;
    //   return ConversationUser::whereHas('conversation', fn ($q) =>
    //     $q->whereHas('participants', fn ($q) => $q->whereUserId($user_id))
    //   );
    // }

    public function participants($user = null){
      $user_id = $user->id ?? $user ?? null;
      return self::config('models.conversation_user')::whereHas('conversation', fn ($q) =>
        $q->whereId($this->conversation_id)->whereHas('participants', fn ($q) => $q->when($user_id, fn ($q) => $q->whereUserId($user_id)))
      );
    }

    public function conversation(){
      return $this->belongsTo(self::config('models.conversation'));
    }

    function chatEvents(Bool $distinctType = true){
      return $this->morphMany(self::config('models.chat_event'), 'made')
      ->when($distinctType, fn ($q) => $q->distinct('type'))
      ->latest();
    }

    // function latestMedia(){
    //   return $this->morphOne(Media::class, 'model')->latest();
    // }

    public function sender(){
      return $this->belongsTo(self::config('models.user'), 'user_id');
    }

    public function reply(): MorphTo {
      return $this->morphTo();
    }

    public function registerMediaCollections(): void{
      $this->addMediaCollection('image')
      ->acceptsMimeTypes($this->mimes)
      ->singleFile()->useDisk('msg_images')
      ->registerMediaConversions($this->convertionCallback(true));

      $this->addMediaCollection('videos')
      ->acceptsMimeTypes($this->v_mimes)->useDisk('msg_videos')
      ->registerMediaConversions($this->videoConvertionCallback());
    }

    public function newCollection(array $models = Array()){
      return new MessageCollection($models);
    }
}

class MessageCollection extends Collection {
  function prependSystemMessage(...$messages) {
    array_map(fn ($message) => $this->prepend($message), $messages);

    return $this;
  }

  function appendSystemMessage(...$messages) {
    array_map(fn ($message) => $this->push($message), $messages);

    return $this;
  }

  function makeRead($user = null){
    return $this->makeChatEvent($user);
  }

  function makeDelete(ChatEventMaker $user = null, $all = false){
    return $this->makeChatEvent($user, 'delete', $all);
  }

  function makeDelivered($user = null){
    return $this->makeChatEvent($user, 'deliver');
  }

  private function makeChatEvent(ChatEventMaker $user, $type = 'read', $all = false) {
    $create = [];
    $this->map(function ($msg) use(&$create, $all, $user) {
      $create[] = [
        'made_id'    => $msg->id,
        'made_type'  => $msg::class,
        'type'       => 'delete',
        'all'        => $all ? $msg->user_id === $user->id : false,
      ];
    });

    return $user->chatEventMakers()->createMany($create);
  }

}
