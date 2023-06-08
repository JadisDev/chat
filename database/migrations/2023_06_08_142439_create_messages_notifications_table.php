<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages_notifications', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');
			$table->integer('message_id')->unsigned();
			$table->foreign('message_id')->references('id')->on('messages');
			$table->integer('conversation_id')->unsigned();
			$table->foreign('conversation_id')->references('id')->on('conversations');
			$table->boolean('read');
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
        Schema::dropIfExists('messages_notifications');
    }
}
