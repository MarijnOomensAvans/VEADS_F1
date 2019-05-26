@extends('wizard.master', ['currentstep' => 5, 'nextlink' => '/wizard/instagram', 'prevlink' => '/wizard/mail'])

@section('content')
    <p>Bij deze stap vult u de gegevens voor facebook in.</p>

    <form method="post" action="/wizard/facebook" id="main-form">
        @csrf

        <div class="form-group row">
            <label for="fb_app_id" class="col-sm-2 col-form-label{{ $errors->has('fb_app_id') ? ' text-danger' : '' }}">Facebook app id</label>
            <div class="col-sm-10">
                <input type="text" class="form-control{{ $errors->has('fb_app_id') ? ' is-invalid' : '' }}" id="fb_app_id" name="fb_app_id" value="{{ old('fb_app_id', $details->getFbAppId()) }}" placeholder="Facebook app id" required />
                <small class="form-text text-muted">
                    Dit is het app id van facebook. (Dit app id is terug te vinden bij <a href="https://developers.facebook.com/apps/385136325656677/dashboard/" target="_blank">Facebook Developers</a>)
                </small>
                @if($errors->has('fb_app_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fb_app_id') }}
                    </div>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="fb_app_secret" class="col-sm-2 col-form-label{{ $errors->has('fb_app_secret') ? ' text-danger' : '' }}">Facebook app secret</label>
            <div class="col-sm-10">
                <input type="password" class="form-control{{ $errors->has('fb_app_secret') ? ' is-invalid' : '' }}" id="fb_app_secret" name="fb_app_secret" value="" placeholder="Facebook app secret" required />
                <small class="form-text text-muted">
                    Dit is het app secret van facebook. (Dit app secret is terug te vinden bij <a href="https://developers.facebook.com/apps/385136325656677/dashboard/" target="_blank">Facebook Developers</a>)
                </small>
                @if($errors->has('fb_app_secret'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fb_app_secret') }}
                    </div>
                @endif
            </div>
        </div>
    </form>
@endsection
