<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventPictureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_picture', function (Blueprint $table) {
            $table->unsignedInteger('event_id');
            $table->unsignedInteger('picture_id');
            $table->timestamps();

            $table->primary(['event_id', 'picture_id']);

            $table->foreign('event_id')->references('id')->on('events');
            $table->foreign('picture_id')->references('id')->on('pictures');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_picture');
    }
}
