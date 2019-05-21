@extends('wizard.master', ['currentstep' => 9, 'nextlink' => '/wizard/done'])

@section('content')
    <p>Hieronder staan de gegevens zoals u deze heeft opgegeven. U heeft nu nog de mogelijkheid om deze gegevens aan te passen, voordat de website geïnstalleerd wordt.</p>

    <form method="post" action="/wizard/done" id="main-form">
        @csrf
    </form>

    <hr/>

    <h4>App gegevens</h4>
    <a href="/wizard/app">Wijzigen</a>

    <div class="row">
        <div class="col-sm-3 text-sm-right font-weight-bold">App naam</div>
        <div class="col-sm-9">{{ $details->getAppName() }}</div>
    </div>

    <div class="row">
        <div class="col-sm-3 text-sm-right font-weight-bold">App url</div>
        <div class="col-sm-9">{{ $details->getAppUrl() }}</div>
    </div>

    <hr/>

    <h4>Database gegevens</h4>
    <a href="/wizard/database">Wijzigen</a>

    <div class="row">
        <div class="col-sm-3 text-sm-right font-weight-bold">Database hostname</div>
        <div class="col-sm-9">{{ $details->getDbHost() }}</div>
    </div>

    <div class="row">
        <div class="col-sm-3 text-sm-right font-weight-bold">Database poort</div>
        <div class="col-sm-9">{{ $details->getDbPort() }}</div>
    </div>

    <div class="row">
        <div class="col-sm-3 text-sm-right font-weight-bold">Database gebruikersnaam</div>
        <div class="col-sm-9">{{ $details->getDbUser() }}</div>
    </div>

    <div class="row">
        <div class="col-sm-3 text-sm-right font-weight-bold">Database wachtwoord</div>
        <div class="col-sm-9">*****</div>
    </div>

    <div class="row">
        <div class="col-sm-3 text-sm-right font-weight-bold">Database</div>
        <div class="col-sm-9">{{ $details->getDbName() }}</div>
    </div>

    <hr/>

    <h4>Mail gegevens</h4>
    <a href="/wizard/mail">Wijzigen</a>

    <div class="row">
        <div class="col-sm-3 text-sm-right font-weight-bold">Mail driver</div>
        <div class="col-sm-9">{{ $details->getMailDriver() }}</div>
    </div>

    @if($details->getMailDriver() == 'smtp')
        <div class="row">
            <div class="col-sm-3 text-sm-right font-weight-bold">SMTP hostname</div>
            <div class="col-sm-9">{{ $details->getMailHost() }}</div>
        </div>

        <div class="row">
            <div class="col-sm-3 text-sm-right font-weight-bold">STMP poort</div>
            <div class="col-sm-9">{{ $details->getMailPort() }}</div>
        </div>

        <div class="row">
            <div class="col-sm-3 text-sm-right font-weight-bold">SMTP gebruikersnaam</div>
            <div class="col-sm-9">{{ $details->getMailUsername() }}</div>
        </div>

        <div class="row">
            <div class="col-sm-3 text-sm-right font-weight-bold">SMTP wachtwoord</div>
            <div class="col-sm-9">{{ empty($details->getMailPassword() ? '' : '*****') }}</div>
        </div>

        <div class="row">
            <div class="col-sm-3 text-sm-right font-weight-bold">SMTP encryptie</div>
            <div class="col-sm-9">{{ $details->getMailEncryption() }}</div>
        </div>
    @endif

    <div class="row">
        <div class="col-sm-3 text-sm-right font-weight-bold">Afzender mailadres</div>
        <div class="col-sm-9">{{ $details->getMailFromAddress() }}</div>
    </div>

    <div class="row">
        <div class="col-sm-3 text-sm-right font-weight-bold">Afzender naam</div>
        <div class="col-sm-9">{{ $details->getMailFromName() }}</div>
    </div>

    <hr/>

    <h4>Facebook gegevens</h4>
    <a href="/wizard/facebook">Wijzigen</a>

    <div class="row">
        <div class="col-sm-3 text-sm-right font-weight-bold">Facebook app id</div>
        <div class="col-sm-9">{{ $details->getFbAppId() }}</div>
    </div>

    <div class="row">
        <div class="col-sm-3 text-sm-right font-weight-bold">Facebook app secret</div>
        <div class="col-sm-9">*****</div>
    </div>

    <hr/>

    <h4>Instagram gegevens</h4>
    <a href="/wizard/instagram">Wijzigen</a>

    <div class="row">
        <div class="col-sm-3 text-sm-right font-weight-bold">Instagram client id</div>
        <div class="col-sm-9">{{ $details->getInstaClientId() }}</div>
    </div>

    <div class="row">
        <div class="col-sm-3 text-sm-right font-weight-bold">Instagram client secret</div>
        <div class="col-sm-9">*****</div>
    </div>

    <hr/>

    <h4>Mollie gegevens</h4>
    <a href="/wizard/mollie">Wijzigen</a>

    <div class="row">
        <div class="col-sm-3 text-sm-right font-weight-bold">Mollie key</div>
        <div class="col-sm-9">{{ $details->getMollieKey() }}</div>
    </div>

    <hr/>

    <h4>Google analytics gegevens</h4>
    <a href="/wizard/analytics">Wijzigen</a>

    <div class="row">
        <div class="col-sm-3 text-sm-right font-weight-bold">Google analytics tracking id</div>
        <div class="col-sm-9">{{ $details->getAnalyticsTrackingId() }}</div>
    </div>

    <div class="row">
        <div class="col-sm-3 text-sm-right font-weight-bold">Google analytics view id</div>
        <div class="col-sm-9">{{ $details->getAnalyticsViewId() }}</div>
    </div>

    <hr/>
@endsection