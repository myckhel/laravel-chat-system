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

    function scopeWithAll($q, ChatEventMaker $user) {
      $q->select('*')->whereMakerId($user->id)->orWhere('all', true);
    }

    function scopeNotMessanger($q, ChatEventMaker|int $user) {
      $q->whereDoesntHave('message', fn($q) => $q->whereUserId($user->id ?? $user));
    }

    function message(): BelongsTo {
      return $this->belongsTo(self::config('models.message'), 'made_id');
    }

    function conversation(): BelongsTo {
      return $this->belongsTo(self::config('models.conversation'), 'made_id');
    }

    function maker(): MorphTo{
      return $this->morphTo();
    }
    function made(): MorphTo{
      return $this->morphTo();
    }
}
