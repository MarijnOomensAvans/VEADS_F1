@extends('layouts.admin')

@section('content')
    <div class="content">
        <h1>Donatie van {{ $donation->full_name }}</h1>
    </div>

    <div class="content">
        <div class="block block-rounded block-bordered">
            <div class="block-content">
                <div class="row mb-3">
                    <div class="col-12 col-sm-4 text-sm-right"><label>Bedrag</label></div>
                    <div class="col-12 col-sm-8">&euro;{{ number_format($donation->amount, 2, ',', '.') }}</div>
                </div>
                <hr/>

                @if(!empty($donation->email))
                <div class="row mb-3">
                    <div class="col-12 col-sm-4 text-sm-right"><label>E-mailadres</label></div>
                    <div class="col-12 col-sm-8">
                        <a href="mailto:{{ $donation->email }}" target="_blank">{{ $donation->email }}</a>
                    </div>
                </div>
                <hr/>
                @endif

                @if(!empty($donation->event))
                <div class="row mb-3">
                    <div class="col-12 col-sm-4 text-sm-right"><label>Evenement</label></div>
                    <div class="col-12 col-sm-8">
                        <a href="{{ route('admin/event', ['event' => $donation->event]) }}">
                            {{ !empty($donation->event->name) ? $donation->event->name : 'Naamloos evenement' }}
                        </a>
                    </div>
                </div>
                <hr/>
                @endif

                <div class="row mb-3">
                    <div class="col-12 col-sm-4 text-sm-right"><label>Status</label></div>
                    <div class="col-12 col-sm-8">
                        @if(!empty($donation->refunded_at))
                            <span class="badge badge-danger">Terugbetaald per {{ $donation->refunded_at->format('H:i d-m-Y') }}</span>
                        @else
                            @if(!empty($donation->paid_at))
                                <span class="badge badge-success">Verwerkt per {{ $donation->paid_at->format('H:i d-m-Y') }}</span>
                            @else
                                <span class="badge badge-warning">Wordt verwerkt sinds {{ $donation->created_at->format('H:i d-m-Y') }}</span>
                            @endif
                        @endif
                    </div>
                </div>
                <hr/>

                <div class="row mb-3">
                    <div class="col-12 text-right">
                        <div class="btn-group">
                            <a href="{{ action('Backend\DonationController@index') }}" class="btn btn-sm btn-primary"><span class="fas fa-arrow-left"></span></a>
                            @if(empty($donation->refunded_at))
                                <a href="{{ action('Backend\DonationController@refund', ['donation' => $donation]) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Terugbetalen"><span class="fas fa-hand-holding-usd"></span></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
