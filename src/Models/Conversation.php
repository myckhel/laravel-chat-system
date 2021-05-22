<?php

namespace Myckhel\ChatSystem\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Myckhel\ChatSystem\Jobs\Chat\MakeEvent;
use Carbon\Carbon;
use Myckhel\ChatSystem\Database\Factories\ConversationFactory;
use Myckhel\ChatSystem\Traits\ChatEvent\HasChatEvent;
use Myckhel\ChatSystem\Traits\Config;

class Conversation extends Model
{
  use HasFactory, HasChatEvent, Config;
  protected $fillable = ['user_id', 'name'];
  protected $casts    = ['user_id' => 'int'];
  protected $hidden   = ['pivot'];

  protected static function newFactory(){
    return ConversationFactory::new();
  }

  function scopeWhereHasLastMessage($q, $user = null) {
    $q->whereHas('last_message', fn ($q) =>
      $q->whereDoesntHave('metas', fn ($q) => $q->whereName('system'))
      ->whereConversationWasntDeleted($user)
    );
  }

  function makeDelete($user = null) {
    return $this->makeChatEvent($user);
  }
  function makeRead($user = null) {
    return $this->makeChatEvent($user, 'read', true);
  }
  function makeDelivery($user = null) {
    return $this->makeChatEvent($user, 'deliver', true);
  }

  private function makeChatEvent($user, $type = 'delete', $row = false) {
    $create = [
      'made_id'    => $this->id,
      'made_type'  => $this::class,
      'type'       => $type,
    ];

    return $row
      ? $user->chatEventMakers()->create($create)
      : $user->chatEventMakers()->updateOrCreate(
          $create,
          array_merge($create, ['created_at' => now()])
        );
  }

  public function last_message(){
    return $this->hasOne(self::config('models.message'))->latest();
  }

  function scopeWhereNotParticipant($q, $user) {
    $q->whereHas('participants', fn ($q) => $q->where('user_id', '!=', $user->id ?? $user));
  }

  public function participants(){
    return $this->hasMany(self::config('models.conversation_user'));
  }
  public function participant($user = null){
    return $this->hasOne(self::config('models.conversation_user'))->latest()
    ->when($user, fn ($q) => $q->whereUserId($user->id ?? $user));
  }
  public function otherParticipant($user = null){
    $user_id = $user->id ?? $user ?? auth()->user()->id ?? null;
    return $this->hasOne(self::config('models.conversation_user'))->latest()
    ->where('user_id', '!=', $user_id);
  }

  public function participant_id(){
    return $this->participants();
  }

  public function messages(){
    return $this->hasMany(self::config('models.message'));
  }

  public function unread($user = null){
    $user_id = $user->id ?? $user ?? auth()->user()->id;

    return $this->notMsgEvents('read', $user_id)->latest()->whereNotSender($user_id);
  }

  function notMsgEvents($type = null, $user = null) {
    $user_id = $user->id ?? $user ?? auth()->user()->id;

    return $this->messages()
    ->whereHas('conversation', fn ($q) =>
      $q->whereDoesntHave('chatEvents', fn ($q) =>
        $q->latest()->whereMakerId($user_id)
        ->when($type, fn ($q) => $q->whereType($type))
        ->whereColumn('created_at', '>', 'messages.created_at')
      )
    );
  }

  function undelivered($user = null){
    $user_id = $user->id ?? $user ?? auth()->user()->id;

    return $this->notMsgEvents('deliver', $user_id)
    ->where('user_id', '!=', $user_id);
  }

  public function author(){
    return $this->belongsTo(self::config('models.user'), 'user_id');
  }

  public function newCollection(array $models = Array()){
    return new ConversationCollection($models);
  }
}

class ConversationCollection extends Collection {
  function makeDelivered($user = null){
    $user = $user ?? auth()->user() ?? null;
    MakeEvent::dispatch($user, 'deliver', $this)->afterResponse();
    return $this;
  }

  function undelivered($user = null){
    $user_id = $user->id ?? $user ?? auth()->user()->id;

    return $this->notMsgEvents('deliver', $user_id)
    ->where('user_id', '!=', $user_id);
  }
}
