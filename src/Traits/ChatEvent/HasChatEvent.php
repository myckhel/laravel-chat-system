<?php
namespace Myckhel\ChatSystem\Traits\ChatEvent;

use Myckhel\ChatSystem\Models\Message;
use Myckhel\ChatSystem\Models\ChatEvent;
use Myckhel\ChatSystem\Models\Conversation;
use DB;
/**
 *
 */
trait HasChatEvent
{
  function scopeWhereNotTrashed($q, $maker_id) {
    $q->whereDoesntHave('trashed', fn ($q) => $q->where('all', true)->orWhere('maker_id', $maker_id));
  }
  function chatEvents(){
    return $this->morphMany(ChatEvent::class, 'made')
    ->groupByRaw('`type` desc')
    ->orderBy('id', 'desc');
  }
  function chatEvent(){
    return $this->morphOne(ChatEvent::class, 'made')->latest();
  }
  function delivery($maker = null) {
    return $this->morphOne(ChatEvent::class, 'made')
    ->whereType('deliver')->latest()
    ->when(
      $maker,
      fn ($q) => $q->whereMakerType($maker->id)->whereMadeType(get_class($maker))
    );
  }
  function trashed() {
    return $this->morphOne(ChatEvent::class, 'made')
    ->whereType('delete')->latest();
  }
  function read() {
    return $this->morphOne(ChatEvent::class, 'made')
    ->whereType('read')->latest();
  }

  public static function bootHasChatEvent(){
    static::deleting(function ($model) {
      if (in_array(SoftDeletes::class, class_uses_recursive($model))) {
          if (! $model->forceDeleting) {
              return;
          }
      }
     ChatEvent::whereMadeType(get_class($model))->whereMadeId($model->id)->delete();
    });

  }
}

?>
