@extends('wizard.master', ['currentstep' => 3, 'nextlink' => '/wizard/mail', 'prevlink' => '/wizard/app'])

@section('content')
    <p>Bij deze stap vult u de gegevens voor de database in.</p>

    @if($errors->has('db_error'))
        <div class="alert alert-danger">
            {{ $errors->first('db_error') }}
        </div>
    @endif

    <form method="post" action="/wizard/database" id="main-form">
        @csrf

        <div class="form-group row">
            <label for="db_host" class="col-sm-2 col-form-label{{ $errors->has('db_host') ? ' text-danger' : '' }}">Database hostname</label>
            <div class="col-sm-10">
                <input type="text" class="form-control{{ $errors->has('db_host') ? ' is-invalid' : '' }}" id="db_host" name="db_host" value="{{ old('db_host', $details->getDbHost()) }}" placeholder="Database hostname" required />
                <small class="form-text text-muted">
                    Dit is de hostname/het ip-adres van de database server. (meestal localhost of 127.0.0.1)
                </small>
                @if($errors->has('db_host'))
                    <div class="invalid-feedback">
                        {{ $errors->first('db_host') }}
                    </div>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="db_port" class="col-sm-2 col-form-label{{ $errors->has('db_port') ? ' text-danger' : '' }}">Database poort</label>
            <div class="col-sm-10">
                <input type="text" class="form-control{{ $errors->has('db_port') ? ' is-invalid' : '' }}" id="db_port" name="db_port" value="{{ old('db_port', $details->getDbPort()) }}" placeholder="Database poort" required />
                <small class="form-text text-muted">
                    Dit is de poort van de database server. (meestal 3306)
                </small>
                @if($errors->has('db_port'))
                    <div class="invalid-feedback">
                        {{ $errors->first('db_port') }}
                    </div>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="db_user" class="col-sm-2 col-form-label{{ $errors->has('db_user') ? ' text-danger' : '' }}">Database gebruikersnaam</label>
            <div class="col-sm-10">
                <input type="text" class="form-control{{ $errors->has('db_user') ? ' is-invalid' : '' }}" id="db_user" name="db_user" value="{{ old('db_user', $details->getDbUser()) }}" placeholder="Database gebruikersnaam" required />
                <small class="form-text text-muted">
                    Dit is de gebruikersnaam om verbinding te maken met de database server.
                </small>
                @if($errors->has('db_user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('db_user') }}
                    </div>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="db_pass" class="col-sm-2 col-form-label{{ $errors->has('db_pass') ? ' text-danger' : '' }}">Database wachtwoord</label>
            <div class="col-sm-10">
                <input type="password" class="form-control{{ $errors->has('db_pass') ? ' is-invalid' : '' }}" id="db_pass" name="db_pass" value="" placeholder="Database wachtwoord" required />
                <small class="form-text text-muted">
                    Dit is het wachtwoord om verbinding te maken met de database server.
                </small>
                @if($errors->has('db_pass'))
                    <div class="invalid-feedback">
                        {{ $errors->first('db_pass') }}
                    </div>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="db_name" class="col-sm-2 col-form-label{{ $errors->has('db_name') ? ' text-danger' : '' }}">Database</label>
            <div class="col-sm-10">
                <input type="text" class="form-control{{ $errors->has('db_name') ? ' is-invalid' : '' }}" id="db_name" name="db_name" value="{{ old('db_name', $details->getDbName()) }}" placeholder="Database" required />
                <small class="form-text text-muted">
                    Dit is de naam van de database.
                </small>
                @if($errors->has('db_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('db_name') }}
                    </div>
                @endif
            </div>
        </div>
    </form>
@endsection
