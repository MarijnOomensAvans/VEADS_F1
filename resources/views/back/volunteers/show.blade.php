@extends('layouts.admin')

@section('content')
    <div class="content">
        <h1>{{ $volunteer->name }}</h1>
    </div>

    <div class="content">
        <div class="block block-rounded block-bordered">
            <div class="block-content">
                <div class="row mb-3">
                    <div class="col-12 col-sm-4"><label>Naam</label></div>
                    <div class="col-12 col-sm-8">{{ $volunteer->name }}</div>
                </div>
                <hr/>
                <div class="row mb-3">
                    <div class="col-12 col-sm-4"><label>E-mailadres</label></div>
                    <div class="col-12 col-sm-8"><a href="mailto:{{ $volunteer->user->email }}" target="_blank">{{ $volunteer->user->email }} <span class="fa fa-external-link-alt"></span></a></div>
                </div>
                <hr/>
                <div class="row mb-3">
                    <div class="col-12 col-sm-4"><label>Telefoonnummer</label></div>
                    <div class="col-12 col-sm-8">{{ $volunteer->phone_number }}</div>
                </div>
                <hr/>
                <div class="row mb-3">
                    <div class="col-12 col-sm-4"><label>Adres</label></div>
                    <div class="col-12 col-sm-8">
                        {{ $volunteer->address->street . ' ' . $volunteer->address->number . $volunteer->address->number_modifier }}<br/>
                        {{ $volunteer->address->zipcode . ' ' . $volunteer->address->city }}<br/>
                        {{ $volunteer->address->country }}
                    </div>
                </div>
                <hr/>
                <div class="row mb-3">
                    <div class="col-12 text-right">
                        <div class="btn-group">
                            <a href="{{ route('admin/volunteers') }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Terug naar alle vrijwilligers"><span class="fas fa-arrow-left"></span></a>
                            <a href="{{ route('admin/volunteers/destroy', ['volunteer' => $volunteer]) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Vrijwilliger verwijderen"><span class="fas fa-trash"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="block block-rounded block-bordered">
            <div class="block-header block-header-default">
                <h3 class="block-title">Connecties <span class="fas fa-question-circle" data-toggle="tooltip" data-placement="right" title="Deze connecties geven aan met welke projecten en/of evenementen deze vrijwilliger verbonden is." style="font-size: 0.75em;"></span></h3>
            </div>
            <div class="block-content">
                <div class="row mb-3">
                    <div class="col-12 col-sm-4"><label>Projecten</label></div>
                    <div class="col-12 col-sm-8">
                        @if (count($volunteer->projects) > 0)
                            <ul class="list-group mb-3">
                                @foreach($volunteer->projects as $project)
                                    <li class="list-group-item">
                                        <a href="{{ route('admin/project', ['project' => $project]) }}">{{ $project->name }}</a>
                                        <a href="/admin/volunteers/{{ $volunteer->id }}/project/{{ $project->id }}/remove"  data-toggle="tooltip" data-placement="top" title="Vrijwilliger verwijderen uit project"><span class="fa fa-times-circle"></span></a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif

                        <volunteer-add-project-component volunteer="{{ $volunteer->id }}"></volunteer-add-project-component>
                    </div>
                </div>
                <hr/>

                <div class="row mb-3">
                    <div class="col-12 col-sm-4"><label>Evenementen</label></div>
                    <div class="col-12 col-sm-8">
                        @if (count($volunteer->events) > 0)
                            <ul class="list-group mb-3">
                                @foreach($volunteer->events as $event)
                                    <li class="list-group-item">
                                        <a href="{{ route('admin/event', ['event' => $event]) }}">{{ $event->name }}</a>
                                        <a href="/admin/volunteers/{{ $volunteer->id }}/event/{{ $event->id }}/remove"><span class="fa fa-times-circle" data-toggle="tooltip" data-placement="top" title="Vrijwilliger verwijderen uit evenement"></span></a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif

                        <volunteer-add-event-component volunteer="{{ $volunteer->id }}"></volunteer-add-event-component>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection