<?php

use Illuminate\Database\Seeder;

class Event_Date_TimesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event_date_times')->insert([
            'event_id' => '1',
            'start' => '2016-12-11 13:30:00',
            'end' => '2016-12-11 17:00:00',
        ]);
    }
}
