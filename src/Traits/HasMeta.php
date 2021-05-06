<?php
namespace Myckhel\ChatSystem\Traits;

use Myckhel\ChatSystem\Models\Meta;
use Myckhel\ChatSystem\Traits\Config;

/**
 *
 */
trait HasMeta
{
  use HasDelete, Config;
  public function addMeta($metas, $check = []){
    $meta = $this->metas()->updateOrCreate($check, $metas);
    $this->load('metas');
    return $meta;
  }

  public function addMetas($metas, $name, $value, $callback = false){
    $metas = $this->load(['metas' => function($q) use($name){
      $q->where('name', $name)->latest();
    }]);

    if (count($metas->metas) > 0) {
        $option = $metas->metas->first();
        $option->value = $value;
        $option->save();
    } else {
      $this->metas()->create([
        'name' => $name,
        'value' => $value,
      ]);
    }
    if($callback) $callback($this);
    return $this;
  }

  public function metas(){
    return $this->morphMany(self::config('models.meta'), 'metable');
  }

  public function scopeMetas($stmt, $metas = []){
    if ($metas) {
      $stmt->with(['metas' => function($q) use($metas){
        $q->whereIn('name', $metas);
      }]);
    } else {
      $stmt->with(['metas']);
    }

    return $stmt;
  }

  private function isAssoc(array $arr){
    if (array() === $arr) return false;
    return array_keys($arr) !== range(0, count($arr) - 1);
  }

  public function withMetas(Array $metas = [], $select = ['name', 'value', 'type']){
    $metas = $this->metas()->select($select)->where(function ($q) use($metas){
      if ($metas) {
        if ($this->isAssoc($metas)) {
          // $q->whereIn('name', $metas);
        } else {
          $q->whereIn('name', $metas);
        }
      } else {}
    })->get();

    $obj = new \stdClass();
    $metas->map(function ($meta) use(&$obj){
      $name = $meta->name;
      $obj->$name = $meta->value;
    });

    $this->metas = $obj;

    return $this;
  }

  public function updateMetas($name, $value, $type = null){
    if ($value) {
      return $this->metas()->updateOrCreate(['name' => $name, 'type' => $type], ['name' => $name, 'value' => $value, 'type' => $type]);
    }
  }

  public static function bootHasMeta()
  {
    static::deleting(fn ($model) => static::deleteChildren($model, 'metas'));
  }
}
