<?php

namespace Myckhel\ChatSystem\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Myckhel\ChatSystem\Database\Factories\ConversationUserFactory;
use Myckhel\ChatSystem\Traits\Config;

class ConversationUser extends Model
{
    use HasFactory, Config;
    protected $fillable = ['conversation_id', 'user_id'];
    protected $casts    = ['conversation_id' => 'int', 'user_id' => 'int'];
    protected $hidden   = ['pivot'];

    protected static function newFactory(){
      return ConversationUserFactory::new();
    }

    function user() {
      return $this->belongsTo(self::config('models.user'));
    }
    function conversation() {
      return $this->belongsTo(Conversation::class);
    }
}
