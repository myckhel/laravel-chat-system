<?php

namespace Myckhel\ChatSystem\Traits\ChatEvent;

use Myckhel\ChatSystem\Models\ChatEvent;
use Illuminate\Database\Eloquent\Model;
use Myckhel\ChatSystem\Config;

/**
 *
 */
trait CanMakeChatEvent
{
  /**
   * Model has many chat event makers
   *
   * @param Model $model
   * @param int|null $id
   * @param string|null $type
   * @param int|null $made_id
   * @param int|null $made_type
   * @return MorphMany
   */
  function chatEventMakers(Model $model = null, int $id = null, string $type = null, int $made_id = null, string $made_type = null)
  {
    return $this->morphMany(Config::config('models.chat_event'), 'maker')->latest()
      ->when($type, fn ($q) => $q->whereType($type))
      ->when($made_id, fn ($q) => $q->whereMadeId($made_id))
      ->when($made_type, fn ($q) => $q->whereMadeType($made_type))
      ->when($id, fn ($q) => $q->whereId($id))
      ->when($model, fn ($q) => $q->whereId($model->id));
  }

  // public static function bootCanMakeChatEvent(){
  //   static::deleting(function ($model) {
  //     if (in_array(SoftDeletes::class, class_uses_recursive($model))) {
  //         if (! $model->forceDeleting) {
  //             return;
  //         }
  //     }
  //
  //     $model->chatEventMakers()->softDelete();
  //   });
  // }
}
