@extends('layouts.admin')

@section('content')
    <div class="content">
        <h1>{{ $event->name }}</h1>
    </div>

    <div class="content">
        <div class="block block-rounded block-bordered">
            <div class="block-content">
                <div class="row mb-3">
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

                @if(count($event->pictures))
                    <hr/>

                    <div class="row">
                        <div class="col-12">
                            <label>Foto's</label>
                        </div>
                    </div>

                    <div class="row mb-3 items-push img-fluid-100">
                        @foreach($event->pictures as $picture)
                            <div class="col-md-6 col-lg-4 col-xl-3 animated fadeIn">
                                <div class="options-container">
                                    <img class="img-fluid" src="/image/{{ $picture->path }}/{{ $picture->name }}" />
                                    <div class="options-overlay bg-black-75">
                                        <div class="options-overlay-content">
                                            <h3 class="h4 text-white mb-2">{{ $picture->name }}</h3>
                                            <h4 class="h6 text-white-75 mb-3">{{ $picture->date->format('d-m-Y') }}</h4>
                                            <a class="btn btn-sm btn-danger" href="{{ route('admin/events/image', ['event' => $event, 'image' => $picture]) }}">
                                                <i class="fa fa-times mr-1"></i> Verwijderen
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

                <hr/>
                <div class="row mb-3">
                    <div class="col-12 text-right">
                        <div class="btn-group">
                            <a href="{{ route('admin/events') }}" class="btn btn-sm btn-primary"><span class="fas fa-arrow-left"></span></a>
                            <a href="{{ route('admin/events/edit', ['event' => $event]) }}" class="btn btn-sm btn-primary"><span class="fas fa-pencil-alt"></span></a>
                            <a href="{{ route('admin/events/destroy', ['event' => $event]) }}" class="btn btn-sm btn-primary"><span class="fas fa-trash"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
