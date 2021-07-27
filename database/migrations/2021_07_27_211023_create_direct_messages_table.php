<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direct_messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('direct_id');
            $table->unsignedBigInteger('sender_user_id');
            $table->unsignedBigInteger('receiver_user_id');
            $table->unsignedBigInteger('parent_message_id');
            $table->boolean('is_edited');
            $table->boolean('is_viewed');
            $table->boolean('is_deleted');
            $table->text('content');
            $table->timestamps();

            $table->foreign('direct_id')->references('id')->on('directs');
            $table->foreign('sender_user_id')->references('id')->on('users');
            $table->foreign('receiver_user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('direct_messages');
    }
}
