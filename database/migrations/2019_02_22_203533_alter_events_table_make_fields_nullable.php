<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterEventsTableMakeFieldsNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->unsignedInteger('address_id')->nullable()->change();
            $table->string('name', 50)->nullable()->change();
            $table->longText('description')->nullable()->change();
            $table->float('price', 6, 2)->default('0.00')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->unsignedInteger('address_id')->change();
            $table->string('name', 50)->change();
            $table->longText('description')->change();
            $table->float('price', 6, 2)->default('0.00')->change();
        });
    }
}
