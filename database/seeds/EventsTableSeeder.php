<?php

use App\Picture;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (empty(\App\Event::where('name', '=', 'Missie X-Mas Benefietconcert 2016')->first())) {
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
            $event->featured_position = 1;
            $event->save();

            $date = new \App\EventDateTime([
                'event_id' => $event->id,
                'start' => '2016-12-11 13:30:00',
                'end' => '2016-12-11 17:00:00',
            ]);
            $date->save();

            $name = 'missie-x-mas-benefietconcert.jpg';
            $filename = Str::random(40) . '.jpg';
            Storage::put('images/' . $filename, file_get_contents(__DIR__ . '/assets/' . $name));

            $picture = new Picture();
            $picture->name = $name;
            $picture->path = $filename;
            $picture->date = \DateTime::createFromFormat('U', filectime(__DIR__ . '/assets/' . $name));
            $picture->save();

            $event->pictures()->attach($picture->id);
        }

        if (empty(\App\Event::where('name', '=', 'VERBAZEN, VERNIEUWEN & VERRASSEN')->first())) {
            $event = new \App\Event([
                'name' => 'VERBAZEN, VERNIEUWEN & VERRASSEN',
                'description' => '<p>I.s.m. Galant vrijwilligersnetwerk 073 & Stichting Veads (Voor Elkaar aan de Slag) wordt er op 7 december de dag van de vrijwilligers voor max. 1.000 vrijwilligers uit de regio ‘s-Hertogenbosch in opdracht van de gemeente ‘s-Hertogenbosch een speciale dag georganiseerd.</p>
                                  <p>Hiervoor zijn op zoek naar bondgenoten met team spirit en daadkracht. Hiervoor hebben zich al een aantal partners gemeld. Zoals Doll Care, die een aantal andere bedrijven, zoals Smart Robot Solution, i-retail solution en Vegro, achter zich heeft staan en het Fietslabyrint werkt graag mee om invulling te geven aan 7 december.</p>
                                  <p>Ook is de interesse gewekt bij Barry Emons,die de grote waarde inziet van vrijwilligers en in overleg is met de directie om te kijken wat ze voor deze dag kunnen betekenen. Qineto, cinnovate, Dosocial en Miele willen meedenken en invulling geven om 7 dec. De dag van de vrijwilliger speciaal en bijzonder te maken.</p>
                                  <p>Daarnaast doen we een oproep aan jullie u om verder mee te denken. Weet u of heeft u (interactieve) workshops, activiteiten, producten en diensten waarin bezoekers uitgedaagd worden om actief aandacht te besteden aan (jonge)vrijwilligers met (nieuwe) technologie en methodes voor mantelzorgers en maatjes in de zorg. <strong>(Doelgroep nader te bepalen/aanpassen, doe vast een voorzet. Iedereen is te groot.)</strong></p>',
            ]);
            $event->featured_position = 2;
            $event->save();

            $date = new \App\EventDateTime([
                'event_id' => $event->id,
                'start' => '2019-12-07 12:00:00',
                'end' => '2019-12-07 18:00:00',
            ]);
            $date->save();

            $name = 'veads-happines.jpg';
            $filename = Str::random(40) . '.jpg';
            Storage::put('images/' . $filename, file_get_contents(__DIR__ . '/assets/' . $name));

            $picture = new Picture();
            $picture->name = $name;
            $picture->path = $filename;
            $picture->date = \DateTime::createFromFormat('U', filectime(__DIR__ . '/assets/' . $name));
            $picture->save();

            $event->pictures()->attach($picture->id);
        }
    }
}
