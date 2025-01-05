<?php

namespace Binkode\ChatSystem\Contracts;

use Illuminate\Database\Eloquent\Model;

/**
 *
 */
interface IChatEventMaker
{
  public function chatEventMakers(Model $model = null, int $id = null, string $type = null, int $made_id = null, string $made_type = null);
}
