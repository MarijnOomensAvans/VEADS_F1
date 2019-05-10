<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagPictureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_picture', function (Blueprint $table) {
            $table->unsignedInteger('tag_id');
            $table->unsignedInteger('picture_id');
            $table->timestamps();

            $table->foreign('tag_id')->references('id')->on('tags');
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
        Schema::dropIfExists('tag_picture');
    }
}
