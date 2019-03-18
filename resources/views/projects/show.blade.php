@extends('layouts.admin')

@section('content')
    <div class="content">
        <h1>{{ $project->name }}</h1>
    </div>

    <div class="content">
        <div class="block block-rounded block-bordered">
            <div class="block-content">
                <div class="row mb-3">
                    <div class="col-12 col-sm-4"><label>Project omschrijving</label></div>
                    <div class="col-12 col-sm-8">{!! $project->description !!}</div>
                </div>
                <hr/>
                
                <div class="row mb-3">
                    <div class="col-12 col-sm-4"><label>Adres</label></div>
                    <div class="col-12 col-sm-8">
                        {{ $project->address->street . ' ' . $project->address->number . $project->address->number_modifier }}<br/>
                        {{ $project->address->zipcode . ' ' . $project->address->city }}<br/>
                        {{ $project->address->country }}
                    </div>
                </div>
                <hr/>
                
                @if(!empty($project->events))
                <div class="row mb-3">
                    <div class="col-12 col-sm-4"><label>Evenementen</label></div>
                    <div class="col-12 col-sm-8">
                        <div class="list-group">
                            @foreach($project->events as $event)
                                <a href="{{ route('admin/event', ['event' => $event]) }}" class="list-group-item list-group-item-action">{{ $event->name }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <hr/>
                @endif

                @if(count($project->volunteers))
                    <div class="row">
                        <div class="col-12 col-sm-4"><label>Vrijwilligers</label></div>
                        <div class="col-12 col-sm-8">
                            <ul class="list-group mb-3">
                                @foreach($project->volunteers as $volunteer)
                                    <li class="list-group-item">
                                        <a href="{{ route('admin/volunteer', ['volunteer' => $volunteer]) }}">{{ $volunteer->name }}</a>
                                        <a href="/admin/volunteers/{{ $volunteer->id }}/project/{{ $project->id }}/remove"><span class="fa fa-times-circle" data-toggle="tooltip" data-placement="top" title="Vrijwilliger verwijderen"></span></a>
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
                            <a href="{{ route('admin/projects') }}" class="btn btn-sm btn-primary"><span class="fas fa-arrow-left"></span></a>
                            <a href="{{ route('admin/projects/edit', ['project' => $project]) }}" class="btn btn-sm btn-primary"><span class="fas fa-pencil-alt"></span></a>
                            <a href="{{ route('admin/projects/destroy', ['project' => $project]) }}" class="btn btn-sm btn-primary"><span class="fas fa-trash"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection