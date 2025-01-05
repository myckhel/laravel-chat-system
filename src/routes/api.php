<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Binkode\ChatSystem\Http\Controllers\ConversationController;
use Binkode\ChatSystem\Http\Controllers\MessageController;
use Binkode\ChatSystem\Http\Controllers\ChatEventController;
use Binkode\ChatSystem\Config;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

$middlewares  = Config::config('route.middlewares');
$prefix       = Config::config('route.prefix');

Route::group(['prefix' => $prefix, 'middleware' => $middlewares], function () {
  // conversations
  Route::get('conversations/count',                   [ConversationController::class, 'count']);
  Route::post('conversations/{conversation}/join',    [ConversationController::class, 'join']);
  Route::delete('conversations/{conversation}/join',  [ConversationController::class, 'leave']);
  // messages
  Route::delete('messages',         [MessageController::class, 'delete']);
  // apiResources
  Route::apiResources([
    'conversations'         =>  ConversationController::class,
    'messages'              =>  MessageController::class,
    'chat_events'           =>  ChatEventController::class,
  ]);
});
