@extends('layouts.admin')

@section('content')
    <div class="content">
        <h1>{{ $request->title }}</h1>
    </div>

    <div class="content">
        <div class="block block-rounded block-bordered">
            <div class="block-content">
                <div class="row mb-3">
                    <div class="col-12 col-sm-4 text-sm-right"><label>Advertentie type</label></div>
                    <div class="col-12 col-sm-8">
                        @switch($request->type)
                            @case('product')
                                Product
                            @break

                            @case('service')
                                Dienst
                            @break

                            @case('vacancy')
                                Vacature voor vrijwilliger
                            @break
                        @endswitch
                    </div>
                </div>
                <hr/>

                @if(!empty($request->description))
                    <div class="row mb-3">
                        <div class="col-12 col-sm-4 text-sm-right"><label>Advertentie omschrijving</label></div>
                        <div class="col-12 col-sm-8">{!! $request->description !!}</div>
                    </div>
                    <hr/>
                @endif

                <!-- @if(!empty($request->project))
                    <div class="row mb-3">
                        <div class="col-12 col-sm-4 text-sm-right"><label>Project</label></div>
                        <div class="col-12 col-sm-8">
                            <a href="{{ route('admin/project', ['project' => $request->project]) }}">{{ $request->project->name }}</a>
                        </div>
                    </div>
                    <hr/>
                @endif -->

                @if(!empty($request->event))
                    <div class="row mb-3">
                        <div class="col-12 col-sm-4 text-sm-right"><label>Event</label></div>
                        <div class="col-12 col-sm-8">
                            <a href="{{ route('admin/event', ['event' => $request->event]) }}">{{ $request->event->name }}</a>
                        </div>
                    </div>
                    <hr/>
                @endif

                <div class="row mb-3">
                    <div class="col-12 text-right">
                        <form method="post" action="{{ action('Backend\VeadsRequestController@destroy', compact('request')) }}">
                            @csrf
                            @method('DELETE')
                            <div class="btn-group">
                                <a href="{{ action('Backend\VeadsRequestController@index') }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Terug naar alle advertenties"><span class="fas fa-arrow-left"></span></a>
                                <a href="{{ action('Backend\VeadsRequestController@edit', compact('request')) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Advertentie aanpassen"><span class="fas fa-pencil-alt"></span></a>
                                <button class="btn btn-sm btn-primary" onclick="return confirm('Weet u zeker dat u de advertentie \'{{ $request->title }}\' wilt verwijderen?');" data-toggle="tooltip" data-placement="top" title="Advertentie verwijderen"><span class="fas fa-trash"></span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(count($request->responses) > 0)
        <div class="content">
            <h3>Reacties</h3>
        </div>

        <div class="content">
            <div class="block block-rounded block-bordered">
                <div class="block-content">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Naam</th>
                            <th>E-mailadres</th>
                            <th>Telefoonnummer</th>
                            <th>Acties</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($request->responses as $response)
                            <tr>
                                <td>{{ $response->first_name }} {{ $response->last_name }}</td>
                                <td>{{ $response->email }}</td>
                                <td>{{ $response->phone ?? 'N/A' }}</td>
                                <td>
                                    <a href="{{ action('Backend\VeadsRequestController@response', ['veadsResponse' => $response]) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Details weergeven"><span class="fas fa-eye"></span></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
@endsection
