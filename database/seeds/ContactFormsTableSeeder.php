<?php

use Illuminate\Database\Seeder;

class ContactFormsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (\App\ContactForm::count() > 0) {
            print("Skipping ContactFormsTableSeeder, because table is already seeded\n");
            return;
        }

        factory(\App\ContactForm::class, 50);
    }
}
