<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartnerEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partner_event', function (Blueprint $table) {
            $table->unsignedInteger('partner_id');
            $table->unsignedInteger('event_id');
            $table->timestamps();

            $table->foreign('partner_id')->references('id')->on('partners');
            $table->foreign('event_id')->references('id')->on('events');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partner_event');
    }
}
