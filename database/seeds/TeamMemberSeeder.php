<?php

use App\Picture;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TeamMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (empty(\App\TeamMember::where('first_name', 'Angelique')->where('last_name', 'de Rouw')->first())) {
            $name = 'angelique_de_rouw.jpg';
            $filename = Str::random(40) . '.jpg';
            Storage::put('images/' . $filename, file_get_contents(__DIR__ . '/assets/' . $name));

            $picture = new Picture();
            $picture->name = $name;
            $picture->path = $filename;
            $picture->date = \DateTime::createFromFormat('U', filectime(__DIR__ . '/assets/' . $name));
            $picture->save();

            $team_member = new \App\TeamMember([
                'picture_id' => $picture->id,
                'first_name' => 'Angelique',
                'last_name' => 'de Rouw',
                'function' => 'Oprichter VEADS',
                'description' => '<p>Naast oprichtster van stichting Veads is Angelique ook initiatiefneemster van Missie X-mas, Surprise dag, Houten huisje en Surprise Room. Angelique is als vrijwilliger in 2009 bij Boschtion media begonnen. Organiseren en netwerken is haar op het lijf geschreven. Ze verbindt mensen en organisaties makkelijk aan elkaar. In 2016 is Angelique genomineerd tot Brabander van het Jaar Tijdens een grandioos kerstdiner noemde Voormalig burgemeester Rombouts haar een geweldige Bosschenaar.</p>'
            ]);
            $team_member->save();
        }

        if (empty(\App\TeamMember::where('first_name', 'Huub')->where('last_name', 'de Rouw')->first())) {
            $name = 'huub_de_rouw.jpg';
            $filename = Str::random(40) . '.jpg';
            Storage::put('images/' . $filename, file_get_contents(__DIR__ . '/assets/' . $name));

            $picture = new Picture();
            $picture->name = $name;
            $picture->path = $filename;
            $picture->date = \DateTime::createFromFormat('U', filectime(__DIR__ . '/assets/' . $name));
            $picture->save();

            $team_member = new \App\TeamMember([
                'picture_id' => $picture->id,
                'first_name' => 'Huub',
                'last_name' => 'de Rouw',
                'function' => 'Voorzitter/penningmeester',
                'description' => '<p>Huub zijn leven staat altijd in het teken van een ander. Hij weet van aanpakken en weet anderen te motiveren en aan de slag te gaan.</p>'
            ]);
            $team_member->save();
        }

        if (empty(\App\TeamMember::where('first_name', 'Ilona')->where('last_name', 'Janssen')->first())) {
            $name = 'ilona_jansen.jpg';
            $filename = Str::random(40) . '.jpg';
            Storage::put('images/' . $filename, file_get_contents(__DIR__ . '/assets/' . $name));

            $picture = new Picture();
            $picture->name = $name;
            $picture->path = $filename;
            $picture->date = \DateTime::createFromFormat('U', filectime(__DIR__ . '/assets/' . $name));
            $picture->save();

            $team_member = new \App\TeamMember([
                'picture_id' => $picture->id,
                'first_name' => 'Ilona',
                'last_name' => 'Janssen',
                'function' => 'Secretaris',
                'description' => '<p>Bij Ilona thuis is het altijd de zoete inval en is ze een luisterend oor. Elk probleem trekt ze zich aan en probeert samen een oplossing te vinden. Ilona is een duizendpoot, sociaal bevlogen en ondernemend. Ze Initiatiefneemster van verschillende projecten en gericht op toekomst perspectieven en mogelijkheden. Operationeel en in een uitvoerende taak is Ilona op haar best.</p>'
            ]);
            $team_member->save();
        }

        if (empty(\App\TeamMember::where('first_name', 'Robbert')->where('last_name', 'Kesser')->first())) {
            $name = 'robbert_kesser.jpg';
            $filename = Str::random(40) . '.jpg';
            Storage::put('images/' . $filename, file_get_contents(__DIR__ . '/assets/' . $name));

            $picture = new Picture();
            $picture->name = $name;
            $picture->path = $filename;
            $picture->date = \DateTime::createFromFormat('U', filectime(__DIR__ . '/assets/' . $name));
            $picture->save();

            $team_member = new \App\TeamMember([
                'picture_id' => $picture->id,
                'first_name' => 'Robbert',
                'last_name' => 'Kesser',
                'function' => 'Bestuurslid'
            ]);
            $team_member->save();
        }

        if (empty(\App\TeamMember::where('first_name', 'Anne')->where('last_name', 'Zonnenberg')->first())) {
            $name = 'anne_zonnenberg.jpg';
            $filename = Str::random(40) . '.jpg';
            Storage::put('images/' . $filename, file_get_contents(__DIR__ . '/assets/' . $name));

            $picture = new Picture();
            $picture->name = $name;
            $picture->path = $filename;
            $picture->date = \DateTime::createFromFormat('U', filectime(__DIR__ . '/assets/' . $name));
            $picture->save();

            $team_member = new \App\TeamMember([
                'picture_id' => $picture->id,
                'first_name' => 'Anne',
                'last_name' => 'Zonnenberg',
                'function' => 'Bestuurslid'
            ]);
            $team_member->save();
        }
    }
}
