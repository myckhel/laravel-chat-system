<?php

namespace Myckhel\ChatSystem\Traits\ChatEvent;

use Myckhel\ChatSystem\Config;

/**
 *
 */
trait HasChatEvent
{
  /**
   * adds query where model does not have trashed items
   * by the given maker.
   *
   * @param int|null $maker_id
   * @return QueryBuilder
   */
  function scopeWhereNotTrashed($q, $maker_id)
  {
    $q->whereDoesntHave('trashed', fn ($q) => $q->where('all', true)->orWhere('maker_id', $maker_id));
  }

  /**
   * Model has many chat_events
   *
   *
   * @return MorphMany
   */
  function chatEvents()
  {
    return $this->morphMany(Config::config('models.chat_event'), 'made')
      ->groupByRaw('"type" desc')
      ->orderBy('id', 'desc');
  }

  /**
   * Model has one chat_events
   *
   *
   * @return MorphOne
   */
  function chatEvent()
  {
    return $this->morphOne(Config::config('models.chat_event'), 'made')->latest();
  }

  /**
   * Model has one delivered events
   *
   *
   * @param ChatEventMaker|null $maker
   * @return MorphOne
   */
  function delivered(ChatEventMaker $maker = null)
  {
    return $this->morphOne(Config::config('models.chat_event'), 'made')
      ->whereType('deliver')->latest()
      ->when(
        $maker,
        fn ($q) => $q->whereMakerId($maker->id)->whereMadeType($maker::class)
      );
  }

  /**
   * Model has one trashed events
   *
   *
   * @return MorphOne
   */
  function trashed()
  {
    return $this->morphOne(Config::config('models.chat_event'), 'made')
      ->whereType('delete')->latest();
  }

  /**
   * Model has one read events
   *
   *
   * @return MorphOne
   */
  function read()
  {
    return $this->morphOne(Config::config('models.chat_event'), 'made')
      ->whereType('read')->latest();
  }

  /**
   * Boot chatEvent Trait
   *
   *
   */
  public static function bootHasChatEvent()
  {
    static::deleting(function ($model) {
      if (in_array(SoftDeletes::class, class_uses_recursive($model))) {
        if (!$model->forceDeleting) {
          return;
        }
      }
      Config::config('models.chat_event')::whereMadeType(get_class($model))->whereMadeId($model->id)->delete();
    });
  }
}
