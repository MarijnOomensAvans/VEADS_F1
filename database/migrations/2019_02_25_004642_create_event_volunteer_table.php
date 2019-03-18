<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventVolunteerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_volunteer', function (Blueprint $table) {
            $table->unsignedInteger('event_id');
            $table->unsignedInteger('volunteer_id');
            $table->string('task', 50);
            $table->timestamps();

            $table->primary(['event_id', 'volunteer_id']);

            $table->foreign('event_id')->references('id')->on('events');
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
        Schema::dropIfExists('event_volunteer');
    }
}
