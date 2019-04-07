<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(EventsTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(ContactFormsTableSeeder::class);
        $this->call(EditableContentCategoriesSeeder::class);
        $this->call(EditableContentsSeeder::class);
    }
}
