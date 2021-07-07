<?php
namespace Myckhel\ChatSystem\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use ChatEventMaker;

interface IConversation
{
  public function participants(): HasMany;

  public function participant(ChatEventMaker $user = null): HasOne;

  public function otherParticipant(ChatEventMaker $user = null): HasOne;
}

?>
