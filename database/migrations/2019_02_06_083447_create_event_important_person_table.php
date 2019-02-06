<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventImportantPersonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_important_person', function (Blueprint $table) {
            $table->unsignedInteger('event_id');
            $table->unsignedInteger('important_person_id');
            $table->string('task', 50);
            $table->timestamps();

            $table->primary(['event_id', 'important_person_id']);

            $table->foreign('event_id')->references('id')->on('events');
            $table->foreign('important_person_id')->references('id')->on('important_people');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('event_important_person');
    }
}
