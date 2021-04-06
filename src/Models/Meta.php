<?php

namespace Myckhel\ChatSystem\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use \Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Meta extends Model
{
  use HasFactory;
  protected $fillable = ['name', 'value', 'type'];

  public function metable(): MorphTo{
    return $this->morphTo();
  }

  public function newCollection(array $models = Array()){
    return new Metas($models);
  }
}


/**
 *
 */
class Metas extends Collection
{
  public function keyValue()
  {
    $this->items = $this->keyBy('name')->toArray();
    $this->transform(fn ($item, $key) => $item['value']);
    return $this;
  }
}
