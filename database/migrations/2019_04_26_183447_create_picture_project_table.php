<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePictureProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('picture_project', function (Blueprint $table) {
            $table->unsignedInteger('project_id');
            $table->unsignedInteger('picture_id');
            $table->timestamps();

            $table->primary(['project_id', 'picture_id']);

            $table->foreign('project_id')->references('id')->on('projects');
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
        Schema::dropIfExists('picture_project');
    }
}
