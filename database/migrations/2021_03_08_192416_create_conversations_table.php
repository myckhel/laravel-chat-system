<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Myckhel\ChatSystem\Traits\Config;

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
          $userModel  = Config::config('models.user');
          $user_table = (new $userModel)->getTable();

          $table->id();
          $table->foreignId('user_id')->constrained($user_table)->onDelete('cascade');
          $table->string('name')->nullable();
          $table->enum('type', ['private', 'group', 'issue'])->default('private')->index();
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
