<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $event = \App\Event::where('name', '=', 'Missie X-Mas Benefietconcert 2016')->first();

        if (!empty($event)) {
            print("Skipping EventsTableSeeder, because table is already seeded\n");
            return;
        }

        $address = new \App\Address([
            'street' => 'Hinthamerstraat',
            'number' => '74',
            'number_modifier' => '',
            'zipcode' => '5211 MR',
            'city' => '‘s-Hertogenbosch',
            'country' => 'Nederland',
        ]);
        $address->save();

        $event = new \App\Event([
            'address_id' => $address->id,
            'name' => 'Missie X-Mas Benefietconcert 2016',
            'description' => '<p>Middels het Benefietconcert hopen wij de aandacht te vragen voor 3.500 kinderen die in armoede opgroeien in de gemeente ’s-Hertogenbosch. “ Dat kinderen verjaardagen niet kunnen vieren, Sinterklaas niet is langs geweest en ook kerst zeer sober gevierd wordt, dat is voor ons als VEADS onacceptabel” zei Anne Zonnenberg voorzitter VEADS. Tevens zal een gedeelte van de opbrengsten naar Stichting Leergeld \'s-Hertogenbosch gaan. Stichting Leergeld ‘s-Hertogenbosch wil dat ook arme kinderen kunnen deelnemen aan bezigheden binnen of buiten school.</p>
                              <p>Het programma bestaat uit muzikanten en artiesten die belangeloos optreden. Onze headliners zijn: Laura van den Elzen ( 2e bij Deutschland Sucht den Superstar ( DSDS ) en Alides Hidding ( TimeBandits ). Maar zij zijn niet de enige die komen opdagen ook Mark Hoffmann die vierde werd in Deutschland Sucht den Superstar is onderdeel van de show. Tevens hebben we 2 jonge debutanten: Amber van den Elzen ( jongere zusje van Laura ) en Frederique van den Akker. Andere artiesten zijn: Linda Pelders, Ben Spierings, Nicole de Koning en Bieke Wijnhoven.</p>
                              <p>Het benefietconcert zal worden afgesloten door alle artiesten samen op het op podium onder begeleiding van de hele dag excellerende Missie X-Mas Band.  De gelegenheidsband bestaat uit Paul van de Ven (bas), Ferd Berger (gitaar), Erik Hanegraaf (drums), Wim Cooijmans (toetsen) mede organisator Jan-Willem van den Akker ( vocals & harmonica ). Het concert zal worden opgenomen door het Media Leer Park en zal worden uitgezonden op TV73</p>',
            'price' => '7.50',
        ]);
        $event->save();

        $date = new \App\EventDateTime([
            'event_id' => $event->id,
            'start' => '2016-12-11 13:30:00',
            'end' => '2016-12-11 17:00:00',
        ]);
        $date->save();
    }
}
