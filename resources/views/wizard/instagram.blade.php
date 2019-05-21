@extends('wizard.master', ['currentstep' => 6, 'nextlink' => '/wizard/mollie', 'prevlink' => '/wizard/facebook'])

@section('content')
    <p>Bij deze stap vult u de gegevens voor instagram in.</p>

    <form method="post" action="/wizard/instagram" id="main-form">
        @csrf

        <div class="form-group row">
            <label for="insta_client_id" class="col-sm-2 col-form-label{{ $errors->has('insta_client_id') ? ' text-danger' : '' }}">Instagram client id</label>
            <div class="col-sm-10">
                <input type="text" class="form-control{{ $errors->has('insta_client_id') ? ' is-invalid' : '' }}" id="insta_client_id" name="insta_client_id" value="{{ old('insta_client_id', $details->getInstaClientId()) }}" placeholder="Instagram client id" required />
                <small class="form-text text-muted">
                    Dit is het client id van instagram. (Dit client id is terug te vinden bij <a href="https://www.instagram.com/developer/clients/manage/" target="_blank">Instagram Developers</a>)
                </small>
                @if($errors->has('insta_client_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('insta_client_id') }}
                    </div>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="insta_client_secret" class="col-sm-2 col-form-label{{ $errors->has('insta_client_secret') ? ' text-danger' : '' }}">Instagram client secret</label>
            <div class="col-sm-10">
                <input type="password" class="form-control{{ $errors->has('insta_client_secret') ? ' is-invalid' : '' }}" id="insta_client_secret" name="insta_client_secret" value="" placeholder="Instagram client secret" required />
                <small class="form-text text-muted">
                    Dit is het client secret van instagram. (Dit client secret is terug te vinden bij <a href="https://www.instagram.com/developer/clients/manage/" target="_blank">Instagram Developers</a>)
                </small>
                @if($errors->has('insta_client_secret'))
                    <div class="invalid-feedback">
                        {{ $errors->first('insta_client_secret') }}
                    </div>
                @endif
            </div>
        </div>
    </form>
@endsection
