<?php
namespace Myckhel\ChatSystem\Traits\ChatEvent;

use Myckhel\ChatSystem\Models\Conversation;
use Myckhel\ChatSystem\Traits\Config;
/**
 *
 */
trait HasChatEvent
{
  use Config;
  function scopeWhereNotTrashed($q, $maker_id) {
    $q->whereDoesntHave('trashed', fn ($q) => $q->where('all', true)->orWhere('maker_id', $maker_id));
  }

  function chatEvents(){
    return $this->morphMany(self::config('models.chat_event'), 'made')
    ->groupByRaw('"type" desc')
    ->orderBy('id', 'desc');
  }

  function chatEvent(){
    return $this->morphOne(self::config('models.chat_event'), 'made')->latest();
  }

  function delivered($maker = null) {
    return $this->morphOne(self::config('models.chat_event'), 'made')
    ->whereType('deliver')->latest()
    ->when(
      $maker,
      fn ($q) => $q->whereMakerType($maker->id)->whereMadeType(get_class($maker))
    );
  }

  function trashed() {
    return $this->morphOne(self::config('models.chat_event'), 'made')
    ->whereType('delete')->latest();
  }

  function read() {
    return $this->morphOne(self::config('models.chat_event'), 'made')
    ->whereType('read')->latest();
  }

  public static function bootHasChatEvent(){
    static::deleting(function ($model) {
      if (in_array(SoftDeletes::class, class_uses_recursive($model))) {
          if (! $model->forceDeleting) {
              return;
          }
      }
     self::config('models.chat_event')::whereMadeType(get_class($model))->whereMadeId($model->id)->delete();
    });

  }
}
