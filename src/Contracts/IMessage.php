<?php
namespace Myckhel\ChatSystem\Contracts;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

interface IMessage
{
  public function conversation(): BelongsTo;

  public function chatEvents(Bool $distinctType = true): MorphMany;

  public function sender(): BelongsTo;

  public function reply(): MorphTo;
}

?>
