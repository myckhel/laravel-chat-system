<?php

namespace Binkode\ChatSystem\Tests\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Binkode\ChatSystem\Traits\Message\HasMessage;
use Binkode\ChatSystem\Traits\ChatEvent\CanMakeChatEvent;
use Binkode\ChatSystem\Contracts\IChatEventMaker;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;


class User extends Authenticatable implements IChatEventMaker
{
  use HasFactory, HasMessage, CanMakeChatEvent;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name',
    'email',
    'password',
  ];

  public static function up()
  {
    $tableName = (new self())->getTable();
    Schema::create($tableName, function (Blueprint $table) use ($tableName) {
      $table->increments('id');
      $table->string('name')->nullable();
      $table->timestamps();
      $table->softDeletes();
    });
  }
}
