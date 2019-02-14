<?php

use Illuminate\Database\Seeder;

class AddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('addresses')->insert([
            'id' => '1',
            'street' => 'Hinthamerstraat',
            'number' => '74',
            'number_modifier' => '',
            'zipcode' => '5211 MR',
            'city' => '‘s-Hertogenbosch',
            'country' => 'Nederland',
        ]);
    }
}
