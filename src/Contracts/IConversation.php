<?php
namespace Myckhel\ChatSystem\Contracts;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

interface IConversation
{
  public function participants(): HasMany;

  public function participant(IChatEventMaker|int $user = null): HasOne;

  public function otherParticipant(IChatEventMaker $user = null): HasOne;
}

?>
