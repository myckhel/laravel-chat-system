<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Myckhel\ChatSystem\Http\Controllers\ConversationController;
use Myckhel\ChatSystem\Http\Controllers\MessageController;

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

$middlewares  = config('chat-system.route.middlewares');
$prefix       = config('chat-system.route.prefix');

Route::group(['prefix' => $prefix, 'middleware' => $middlewares], function(){
  Route::get('conversations/count', [ConversationController::class, 'count']);
  Route::delete('messages',         [MessageController::class, 'delete']);
  Route::apiResources([
    'conversations'         =>  ConversationController::class,
    'messages'              =>  MessageController::class,
    // 'chat_events'           =>  ChatEventController::class,
  ]);

});
