<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directs', function (Blueprint $table) {
            $table->id();
            $table->string('hash');
            $table->unsignedBigInteger('creator_user_id');
            $table->unsignedBigInteger('guest_user_id');
            $table->timestamps();

            $table->foreign('creator_user_id')->references('id')->on('users');
            $table->foreign('guest_user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('direct');
    }
}
