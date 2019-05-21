@extends('wizard.master', ['currentstep' => 8, 'nextlink' => '/wizard/done', 'prevlink' => '/wizard/mollie'])

@section('content')
    <p>Bij deze stap vult u de gegevens voor google analytics in.</p>

    <form method="post" action="/wizard/analytics" id="main-form">
        @csrf

        <div class="form-group row">
            <label for="analytics_tracking_id" class="col-sm-2 col-form-label{{ $errors->has('analytics_tracking_id') ? ' text-danger' : '' }}">Google analytics tracking id</label>
            <div class="col-sm-10">
                <input type="text" class="form-control{{ $errors->has('analytics_tracking_id') ? ' is-invalid' : '' }}" id="analytics_tracking_id" name="analytics_tracking_id" value="{{ old('analytics_tracking_id', $details->getAnalyticsTrackingId()) }}" placeholder="Google analytics tracking id" required />
                <small class="form-text text-muted">
                    Dit is het tracking id van google analytics. (Zie de instructie video hieronder om het tracking id te achterhalen)
                </small>
                @if($errors->has('analytics_tracking_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('analytics_tracking_id') }}
                    </div>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="analytics_view_id" class="col-sm-2 col-form-label{{ $errors->has('analytics_view_id') ? ' text-danger' : '' }}">Google analytics view id</label>
            <div class="col-sm-10">
                <input type="text" class="form-control{{ $errors->has('analytics_view_id') ? ' is-invalid' : '' }}" id="analytics_view_id" name="analytics_view_id" value="{{ old('analytics_view_id', $details->getAnalyticsViewId()) }}" placeholder="Google analytics view id" required />
                <small class="form-text text-muted">
                    Dit is het view id van google analytics. (Zie de instructie video hieronder om het view id te achterhalen)
                </small>
                @if($errors->has('analytics_view_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('analytics_view_id') }}
                    </div>
                @endif
            </div>
        </div>
    </form>
@endsection

@section('footer')
    <hr/>

    <p>
        Instructie video - tracking id ophalen<br/>
        <iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/MP7Yb9wnT9M" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </p>

    <p>
        Instructie video - view id ophalen<br/>
        <iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/Oea4fXs9jVc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </p>
@endsection
