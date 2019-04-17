<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVeadsRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('veads_requests', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->enum('type', ['product', 'service', 'vacancy']);
            $table->string('title');
            $table->integer('amount')->nullable()->default(null);
            $table->longText('description')->nullable()->default(null);
            $table->unsignedInteger('event_id')->nullable()->default(null);
            $table->unsignedInteger('project_id')->nullable()->default(null);
            $table->timestamps();

            $table->foreign('event_id')->references('id')->on('events');
            $table->foreign('project_id')->references('id')->on('projects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('veads_requests');
    }
}
