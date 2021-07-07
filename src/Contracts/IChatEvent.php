<?php
namespace Myckhel\ChatSystem\Contracts;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

interface IChatEvent
{
  public function conversation(): BelongsTo;

  public function message(): BelongsTo;

  public function maker(): MorphTo;

  public function made(): MorphTo;
}

?>
