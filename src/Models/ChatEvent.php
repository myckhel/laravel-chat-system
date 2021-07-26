<?php

namespace Myckhel\ChatSystem\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Myckhel\ChatSystem\Contracts\ChatEventMaker;
use Myckhel\ChatSystem\Database\Factories\ChatEventFactory;
use Myckhel\ChatSystem\Traits\Config;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Myckhel\ChatSystem\Contracts\IChatEvent;

class ChatEvent extends Model implements IChatEvent
{
    use HasFactory, Config;
    protected $fillable = ['maker_id', 'maker_type', 'made_id', 'made_type', 'type', 'all', 'created_at'];
    protected $casts    = ['maker_id' => 'int', 'made_id' => 'int', 'all' => 'bool'];

    protected static function newFactory(){
      return ChatEventFactory::new();
    }

    function scopeWithTrashed($q, ChatEventMaker $user) {
      $q->select('id', 'maker_id', 'maker_type', 'made_id', 'made_type', 'all')->whereMakerId($user->id)->orWhere('all', true);
    }

    function scopeNotMessanger($q, ChatEventMaker|int $user) {
      $q->whereDoesntHave('message', fn($q) => $q->whereUserId($user->id ?? $user));
    }

    function message(): BelongsTo {
      $message = self::config('models.message');
      return $this->belongsTo($message, 'made_id')->whereMadeType($message);
    }

    function conversation(): BelongsTo {
      $conversation = self::config('models.conversation');
      return $this->belongsTo($conversation, 'made_id')->whereMadeType($conversation);
    }

    function maker(): MorphTo{
      return $this->morphTo();
    }
    function made(): MorphTo{
      return $this->morphTo();
    }
}
