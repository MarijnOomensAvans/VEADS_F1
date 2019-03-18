<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterApplicationsTableRemoveColumnsSplitName extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->dropForeign(['address_id']);
            $table->dropColumn('address_id');
            $table->dropColumn('name');
            $table->dropColumn('phone');
            $table->dropColumn('amount_of_people');
            $table->dropColumn('notes');
            $table->string('first_name', 50)->after('event_id');
            $table->string('last_name', 50)->after('first_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->unsignedInteger('address_id')->nullable();
            $table->string('name', 50);
            $table->string('phone', 20);
            $table->unsignedInteger('amount_of_people');
            $table->longText('notes');

            $table->foreign('address_id')->references('id')->on('addresses');
        });
    }
}
