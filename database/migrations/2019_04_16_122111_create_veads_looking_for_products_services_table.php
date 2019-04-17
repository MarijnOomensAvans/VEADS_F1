<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVeadsLookingForProductsServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('veads_looking_for_products_services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_service_name');
            $table->integer('amount')->nullable()->default(null);
            $table->string('description')->nullable()->default(null);
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
        Schema::dropIfExists('veads_looking_for_products_services');
    }
}
