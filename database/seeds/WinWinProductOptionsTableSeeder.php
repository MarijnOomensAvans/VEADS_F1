<?php

use App\WinWinProductOption;
use Illuminate\Database\Seeder;

class WinWinProductOptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $options = [
            'uitlenen',
            'doneren'
        ];

        foreach($options as $option) {
            if (!empty(WinWinProductOption::where('option', $option)->first())) {
                print("Skipping Option " . $option . ", because this option is already seeded\n");
                continue;
            }

            $opt = new WinWinProductOption([
                'option' => $option
            ]);
            $opt->save();
        }
    }
}
