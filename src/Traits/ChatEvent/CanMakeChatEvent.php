<?php
namespace Myckhel\ChatSystem\Traits\ChatEvent;

use Myckhel\ChatSystem\Models\ChatEvent;
use Illuminate\Database\Eloquent\Model;
use Myckhel\ChatSystem\Traits\Config;

/**
 *
 */
trait CanMakeChatEvent
{
  use Config;
  function chatEventMakers(Model $model = null, $id = null, $type = null, $made_id = null, $made_type = null){
    return $this->morphMany(self::config('models.chat_event'), 'maker')->latest()
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

?>
