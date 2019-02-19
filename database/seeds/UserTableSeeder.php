<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::where('email', '=', 'info@veads.nl');

        if (!empty($user)) {
            print("Skipping UserTableSeeder, because table is already seeded\n");
            return;
        }

        $user = new \App\User([
            'name' => "VEADS",
            'email' => "info@veads.nl",
            'password' => Hash::make('veads2019')
        ]);
        $user->save();
    }
}
