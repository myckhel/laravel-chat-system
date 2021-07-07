<?php
namespace Myckhel\ChatSystem\Contracts;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

interface IConversationUser
{
  public function user(): BelongsTo;

  public function conversation(): BelongsTo;
}

?>
