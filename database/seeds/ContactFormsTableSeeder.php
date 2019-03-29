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

        $faker = \Faker\Factory::create();

        for($i = 0; $i < 100; $i++) {
            $contact_form = new \App\ContactForm([
                'name' => $faker->name,
                'email' => $faker->email,
                'question' => $faker->realText(1000)
            ]);
            $contact_form->save();
        }
    }
}
