<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectVolunteer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_volunteer', function (Blueprint $table) {
            $table->unsignedInteger('project_id');
            $table->unsignedInteger('volunteer_id');
            $table->timestamps();

            $table->primary(['project_id', 'volunteer_id']);

            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('volunteer_id')->references('id')->on('volunteers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_volunteer');
    }
}
