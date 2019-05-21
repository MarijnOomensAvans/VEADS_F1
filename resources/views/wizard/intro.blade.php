@extends('wizard.master', ['currentstep' => 1, 'nextlink' => '/wizard/app'])

@section('content')
    <p>Deze installatiewizard maakt het mogelijk om de website voor Voor Elkaar Aan De Slag te installeren op een <a href="https://nl.wikipedia.org/wiki/LAMP" target="_blank">LAMP</a> (Linux, Apache, MySQL, PHP) server omgeving.</p>

    <p>Deze installatiewizard zal u helpen met het instellen van het volgende:</p>
    <ol>
        <li>App gegevens</li>
        <li>Database gegevens</li>
        <li>Mail gegevens</li>
        <li>Facebook gegevens</li>
        <li>Instagram gegevens</li>
        <li>Mollie gegevens</li>
        <li>Google analytics gegevens</li>
    </ol>
@endsection