<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonatedProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donated_products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->integer('quantity');
            $table->boolean('lend');
            $table->unsignedInteger('volunteer_id')->nullable();
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('email')->unique()->nullable();
            $table->timestamps();

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
        Schema::dropIfExists('donated_products');
    }
}
