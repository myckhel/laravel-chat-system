<?php

namespace Binkode\ChatSystem\Traits;

/**
 *
 */
trait HasDelete
{
  static function deleteChildren($model, string $relation)
  {
    if (static::canDeleteRelation($model)) {
      // $model->{$relation}()->chunkById(500, function ($child) {
      //   $child->fireModelEvent('deleting');
      //   // Here, we'll touch the owning models, verifying these timestamps get updated
      //   // for the models. This will allow any caching to get broken on the parents
      //   // by the timestamp. Then we will go ahead and delete the model instance.
      //   $child->touchOwners();
      // });

      $model->{$relation}()->delete();
    }
  }

  static function canDeleteRelation($model)
  {
    if (in_array(SoftDeletes::class, class_uses_recursive($model))) {
      if (! $model->forceDeleting) {
        return false;
      }
    }
    return true;
  }
}
