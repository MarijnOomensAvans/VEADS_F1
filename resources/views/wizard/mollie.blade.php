@extends('wizard.master', ['currentstep' => 7, 'nextlink' => '/wizard/analytics', 'prevlink' => '/wizard/instagram'])

@section('content')
    <p>Bij deze stap vult u de gegevens voor mollie in.</p>

    <form method="post" action="/wizard/mollie" id="main-form">
        @csrf

        <div class="form-group row">
            <label for="mollie_key" class="col-sm-2 col-form-label{{ $errors->has('mollie_key') ? ' text-danger' : '' }}">Mollie key</label>
            <div class="col-sm-10">
                <input type="text" class="form-control{{ $errors->has('mollie_key') ? ' is-invalid' : '' }}" id="mollie_key" name="mollie_key" value="{{ old('mollie_key', $details->getMollieKey()) }}" placeholder="Mollie key" required />
                <small class="form-text text-muted">
                    Dit is de key van mollie. (Deze key is terug te vinden bij <a href="https://www.mollie.com/dashboard/developers/api-keys" target="_blank">Mollie</a> onder het kopje "Developers" --> "API-keys" --> "Live API-key")
                </small>
                @if($errors->has('mollie_key'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mollie_key') }}
                    </div>
                @endif
            </div>
        </div>
    </form>
@endsection
