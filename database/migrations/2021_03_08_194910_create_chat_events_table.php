<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_events', function (Blueprint $table) {
            $table->id();
            $table->morphs('maker');
            $table->morphs('made');
            $table->enum('type', ['read', 'delete', 'deliver'])->index()->default('read');
            $table->boolean('all')->index()->default(0);
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
        Schema::dropIfExists('chat_events');
    }
}
