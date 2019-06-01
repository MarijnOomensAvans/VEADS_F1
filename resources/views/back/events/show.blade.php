@extends('layouts.admin')

@section('content')
    <div class="content">
        @if (empty($event->name))
            <h1>Naamloos evenement</h1>
        @else
            <h1>{{ $event->name }}</h1>
        @endif
    </div>

    <div class="content">
        <div class="block block-rounded block-bordered">
            <div class="block-content">
                @if(!empty($event->description))
                    <div class="row mb-3">
                        <div class="col-12 col-sm-4 text-sm-right"><label>Evenement omschrijving</label></div>
                        <div class="col-12 col-sm-8">{!! $event->description !!}</div>
                    </div>
                    <hr/>
                @endif

                @if(!empty($event->hasMany('App\Tag')))
                        <div class="row mb-3">
                            <div class="col-12 col-sm-4 text-sm-right"><label>Evenement Tags</label></div>
                                <div class="col-12 col-sm-8">{{$event->tags()->get()->implode('name',", ")}}</div>
                        </div>
                        <hr/>
                    @endif

                @if($event->participants()->count() > 0)
                <div class="row mb-3">
                    <div class="col-12 col-sm-4 text-sm-right"><label>Deelnemers ({{$event->participants()->count()}})</label></div>
                        <div class="col-12 col-sm-8">
                            <ul>
                                @foreach($event->participants as $participant)
                                    <li>{{$participant->name}} ({{$participant->email}})</li>
                                @endforeach
                            </ul>
                        </div>
                </div>
                <hr/>

                @endif


                <!-- @if(!empty($event->project))
                    <div class="row mb-3">
                        <div class="col-12 col-sm-4 text-sm-right"><label>Project</label></div>
                        <div class="col-12 col-sm-8">
                            <a href="{{ route('admin/project', ['project' => $event->project]) }}">{{ $event->project->name }}</a>
                        </div>
                    </div>
                    <hr/>
                @endif -->

                @if($event->price > 0)
                    <div class="row mb-3">
                        <div class="col-12 col-sm-4 text-sm-right"><label>Entreeprijs</label></div>
                        <div class="col-12 col-sm-8">&euro;{{ number_format($event->price, 2, ',', '.') }}</div>
                    </div>
                    <hr/>
                @endif

                @if(!empty($event->datetime))
                    @if(!empty($event->datetime->start))
                        <div class="row">
                            <div class="col-12 col-sm-4 text-sm-right"><label>Evenement begindatum/-tijd</label></div>
                            <div class="col-12 col-sm-8">{{ $event->datetime->start->format('d-m-Y \o\m H:i') }}</div>
                        </div>
                    @endif

                    @if(!empty($event->datetime->end))
                        <div class="row mb-3">
                            <div class="col-12 col-sm-4 text-sm-right"><label>Evenement einddatum/-tijd</label></div>
                            <div class="col-12 col-sm-8">{{ $event->datetime->end->format('d-m-Y \o\m H:i') }}</div>
                        </div>
                    @endif
                    <hr/>
                @endif

                @if(!empty($event->address))
                    <div class="row mb-3">
                        <div class="col-12 col-sm-4 text-sm-right"><label>Adres</label></div>
                        <div class="col-12 col-sm-8">
                            {{ $event->address->street . ' ' . $event->address->number . $event->address->number_modifier }}<br/>
                            {{ $event->address->zipcode . ' ' . $event->address->city }}<br/>
                            {{ $event->address->country }}
                        </div>
                    </div>
                    <hr/>
                @endif

                <div class="row mb-3">
                    <div class="col-12 col-sm-4 text-sm-right"><label>Gepubliceerd</label></div>
                    <div class="col-12 col-sm-8">
                        @if($event->published)
                            <span class="fa fa-check"></span>
                        @else
                            <span class="fa fa-times"></span>
                        @endif
                    </div>
                </div>
                <hr/>

                @if(count($event->pictures))
                    <div class="row">
                        <div class="col-12">
                            <label>Foto's</label>
                        </div>
                    </div>

                    <div class="row mb-3 items-push img-fluid-100">
                        @each('back.events.partials.picture', $event->pictures, 'picture')
                    </div>
                    <hr/>
                @endif

                @if(count($event->volunteers))
                    <div class="row">
                        <div class="col-12 col-sm-4 text-sm-right"><label>Vrijwilligers</label></div>
                        <div class="col-12 col-sm-8">
                            <ul class="list-group mb-3">
                                @foreach($event->volunteers as $volunteer)
                                    <li class="list-group-item">
                                        <a href="{{ route('admin/volunteer', ['volunteer' => $volunteer]) }}">{{ $volunteer->name }}</a>
                                        <a href="/admin/volunteers/{{ $volunteer->id }}/event/{{ $event->id }}/remove"><span class="fa fa-times-circle" data-toggle="tooltip" data-placement="top" title="Vrijwilliger verwijderen"></span></a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <hr/>
                @endif

                @if($event->donations()->count())
                    <div class="row">
                        <div class="col-12 col-sm-4 text-sm-right"><label>Donaties</label></div>
                        <div class="col-12 col-sm-8">
                            <ul class="list-group mb-3">
                                @foreach($event->donations as $donation)
                                    <li class="list-group-item">
                                        <a href="{{ action('Backend\DonationController@show', compact('donation')) }}">&euro;{{ number_format($donation->amount, 2, ',', '.') }} - {{ $donation->full_name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <hr/>
                @endif

                <div class="row mb-3">
                    <div class="col-12 text-right">
                        <div class="btn-group">
                            <a href="{{ route('admin/events') }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Terug naar alle evenementen"><span class="fas fa-arrow-left"></span></a>
                            <a href="{{ route('admin/events/edit', ['event' => $event]) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Evenement aanpassen"><span class="fas fa-pencil-alt"></span></a>
                            <a href="{{ route('admin/events/destroy', ['event' => $event]) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Evenement verwijderen"><span class="fas fa-trash"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
