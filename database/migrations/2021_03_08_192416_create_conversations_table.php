<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConversationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('conversations', function (Blueprint $table) {
          $userModel  = config('chatsystem.user_model');
          $user_table = (new $userModel)->getTable();

          $table->id();
          $table->foreignId('user_id')->constrained($user_table)->onDelete('cascade');
          $table->string('name')->nullable();
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
        Schema::dropIfExists('conversations');
    }
}
