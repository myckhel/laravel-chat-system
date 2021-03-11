<?php

namespace Myckhel\ChatSystem\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Myckhel\ChatSystem\Database\Factories\ConversationUserFactory;

class ConversationUser extends Model
{
    use HasFactory;
    protected $fillable = ['conversation_id', 'user_id'];
    protected $casts    = ['conversation_id' => 'int', 'user_id' => 'int'];
    protected $hidden   = ['pivot'];

    protected static function newFactory(){
      return ConversationUserFactory::new();
    }

    function user() {
      return $this->belongsTo(config('chat-system.user_model'));
    }
    function conversation() {
      return $this->belongsTo(Conversation::class);
    }
}
