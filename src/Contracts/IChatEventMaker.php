<?php
namespace Myckhel\ChatSystem\Contracts;

use Illuminate\Database\Eloquent\Model;
/**
 *
 */
interface IChatEventMaker
{
  public function chatEventMakers(Model $model = null, $id = null, $type = null, $made_id = null, $made_type = null);
}
