@extends('layouts.admin')

@section('content')
    <div class="content">
        <h1>Donatie terugbetalen</h1>
    </div>

    <div class="content">
        <div class="block block-rounded block-bordered">
            <div class="block-content">
                @if(!$donation->payment->canBeRefunded())
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-danger">
                            Het is niet mogelijk om deze donatie terug te betalen.<br/>
                            <a href="{{ action('Backend\DonationController@show', compact('donation')) }}" class="btn btn-primary">Terug</a>
                        </div>
                    </div>
                </div>
                @else
                <div class="row">
                    <div class="col-12">
                        <form method="post" action="{{ action('Backend\DonationController@refund', compact('donation')) }}">
                            @csrf
                            <input type="hidden" name="confirm" value="1" />

                            <div class="alert alert-danger">
                                Weet u zeker dat u de donatie van '{{ $donation->full_name }}' wilt terugbetalen?<br/>
                                <button type="submit" class="btn btn-danger">Ja</button>
                                <a href="{{ action('Backend\DonationController@show', compact('donation')) }}" class="btn btn-secondary">Nee</a>
                            </div>
                        </form>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection