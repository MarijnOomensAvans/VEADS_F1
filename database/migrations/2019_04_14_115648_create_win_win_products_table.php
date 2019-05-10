<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWinWinProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('win_win_products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('product_name');
            $table->integer('amount');
            $table->string('description')->nullable()->default(null);
            $table->unsignedInteger('event_id')->nullable()->default(null);
            $table->unsignedInteger('project_id')->nullable()->default(null);
            $table->string('lend_donate');
            $table->timestamps();

            $table->foreign('event_id')->references('id')->on('events');
            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('lend_donate')->references('option')->on('win_win_product_options');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('win_win_products');
    }
}
