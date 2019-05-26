@extends('wizard.master', ['currentstep' => 2, 'nextlink' => '/wizard/database', 'prevlink' => '/wizard/intro'])

@section('content')
    <p>Bij deze stap vult u de gegevens voor de app/website in.</p>

    <form method="post" action="/wizard/app" id="main-form">
        @csrf

        <div class="form-group row">
            <label for="app_name" class="col-sm-2 col-form-label{{ $errors->has('app_name') ? ' text-danger' : '' }}">App naam</label>
            <div class="col-sm-10">
                <input type="text" class="form-control{{ $errors->has('app_name') ? ' is-invalid' : '' }}" id="app_name" name="app_name" value="{{ old('app_name', $details->getAppName()) }}" placeholder="App naam" required />
                <small class="form-text text-muted">
                    Dit is de naam van de website, deze wordt gebruikt in de titel van de pagina's.
                </small>
                @if($errors->has('app_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('app_name') }}
                    </div>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="app_url" class="col-sm-2 col-form-label{{ $errors->has('app_url') ? ' text-danger' : '' }}">App url</label>
            <div class="col-sm-10">
                <input type="url" class="form-control{{ $errors->has('app_url') ? ' is-invalid' : '' }}" id="app_url" name="app_url" value="{{ old('app_url', $details->getAppUrl()) }}" placeholder="App url" required />
                <small class="form-text text-muted">
                    Dit is de url van de website, pas alleen aan als bovenstaande url niet correct is.
                </small>
                @if($errors->has('app_url'))
                    <div class="invalid-feedback">
                        {{ $errors->first('app_url') }}
                    </div>
                @endif
            </div>
        </div>
    </form>
@endsection
