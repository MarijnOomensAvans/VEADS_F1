<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomepageOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $components = DB::select('SELECT component FROM homepage_order ORDER BY `order` ASC');

        if (!empty($components)) {
            print("Skipping HomepageOrderSeeder, because table is already seeded\n");
            return;
        }

        DB::insert('INSERT INTO homepage_order (`order`, `component`) VALUES (1, "intro"), (2, "partners"), (3, "socialmedia"), (4, "events"), (5, "youtube"), (6, "allpartners")');
    }
}
