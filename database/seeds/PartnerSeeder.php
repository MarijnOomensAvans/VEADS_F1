<?php

use App\Picture;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (empty(\App\Partner::where('name', 'Modoll')->first())) {
            $name = 'modoll.jpg';
            $filename = Str::random(40) . '.jpg';
            Storage::put('images/' . $filename, file_get_contents(__DIR__ . '/assets/' . $name));

            $picture = new Picture();
            $picture->name = $name;
            $picture->path = $filename;
            $picture->date = \DateTime::createFromFormat('U', filectime(__DIR__ . '/assets/' . $name));
            $picture->save();

            $partner = new \App\Partner([
                'name' => 'Modoll',
                'link' => 'http://www.modoll.nl',
            ]);
            $partner->picture()->associate($picture);
            $partner->save();
        }

        if (empty(\App\Partner::where('name', 'Dollcare')->first())) {
            $name = 'dollcare.jpg';
            $filename = Str::random(40) . '.jpg';
            Storage::put('images/' . $filename, file_get_contents(__DIR__ . '/assets/' . $name));

            $picture = new Picture();
            $picture->name = $name;
            $picture->path = $filename;
            $picture->date = \DateTime::createFromFormat('U', filectime(__DIR__ . '/assets/' . $name));
            $picture->save();

            $partner = new \App\Partner([
                'name' => 'Dollcare',
                'link' => 'http://www.dollcare.nl',
            ]);
            $partner->picture()->associate($picture);
            $partner->save();
        }
    }
}
