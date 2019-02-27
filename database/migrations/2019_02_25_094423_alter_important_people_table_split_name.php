<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterImportantPeopleTableSplitName extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('important_people', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->string('first_name', 50);
            $table->string('last_name', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('important_people', function (Blueprint $table) {
            $table->string('name', 50);
            $table->dropColumn(['first_name', 'last_name']);
        });
    }
}
