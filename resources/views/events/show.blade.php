@extends('layouts.admin')

@section('content')
    <div class="content">
        <h1>{{ $event->name }}</h1>
    </div>

    <div class="content">
        <div class="block block-rounded block-bordered">
            <div class="block-content">
                <div class="row mb-5">
                    <div class="col-12 col-sm-4"><label>Evenement omschrijving</label></div>
                    <div class="col-12 col-sm-8">{!! $event->description !!}</div>
                </div>
                <hr/>
                @if($event->price > 0)
                <div class="row mb-3">
                    <div class="col-12 col-sm-4"><label>Entreeprijs</label></div>
                    <div class="col-12 col-sm-8">&euro;{{ number_format($event->price, 2, ',', '.') }}</div>
                </div>
                <hr/>
                @endif
                <div class="row">
                    <div class="col-12 col-sm-4"><label>Evenement begindatum/-tijd</label></div>
                    <div class="col-12 col-sm-8">{{ $event->datetime->start->format('d-m-Y \o\m H:i') }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-12 col-sm-4"><label>Evenement einddatum/-tijd</label></div>
                    <div class="col-12 col-sm-8">{{ $event->datetime->end->format('d-m-Y \o\m H:i') }}</div>
                </div>
                <hr/>
                <div class="row mb-3">
                    <div class="col-12 col-sm-4"><label>Adres</label></div>
                    <div class="col-12 col-sm-8">
                        {{ $event->address->street . ' ' . $event->address->number . $event->address->number_modifier }}<br/>
                        {{ $event->address->zipcode . ' ' . $event->address->city }}<br/>
                        {{ $event->address->country }}
                    </div>
                </div>
                <hr/>
                <div class="row mb-3">
                    <div class="col-12 text-right">
                        <div class="btn-group">
                            <a href="{{ route('admin/events') }}" class="btn btn-sm btn-primary"><span class="fas fa-arrow-left"></span></a>
                            <a href="{{ route('admin/events/edit', ['event' => $event]) }}" class="btn btn-sm btn-primary"><span class="fas fa-pencil-alt"></span></a>
                            <a href="#" class="btn btn-sm btn-primary"><span class="fas fa-trash"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection