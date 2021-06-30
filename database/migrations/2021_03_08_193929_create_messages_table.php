<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Myckhel\ChatSystem\Traits\Config;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $userModel  = Config::config('models.user');
            $user_table = (new $userModel)->getTable();
            $table->id();
            $table->foreignId('conversation_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained($user_table)->onDelete('cascade');
            $table->nullableMorphs('reply');
            $table->text('message')->nullable();
            $table->enum('type', ['user', 'system', 'activity'])->default('user')->index();
            $table->json('metas')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
