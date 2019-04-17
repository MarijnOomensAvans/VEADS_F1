@extends('layouts.admin')

@section('content')
    <div class="content">
        <h1>Reactie op {{ $response->request->title }}</h1>
    </div>

    <div class="content">
        <div class="block block-rounded block-bordered">
            <div class="block-content">
                <div class="row mb-3">
                    <div class="col-12 col-sm-4 text-sm-right"><label>Reactie</label></div>
                    <div class="col-12 col-sm-8">
                        {{ $response->description }}
                    </div>
                </div>
                <hr/>

                <div class="row mb-3">
                    <div class="col-12 col-sm-4 text-sm-right"><label>Contactpersoon</label></div>
                    <div class="col-12 col-sm-8">{{ $response->first_name }} {{ $response->last_name }}</div>
                </div>
                <hr/>

                <div class="row mb-3">
                    <div class="col-12 col-sm-4 text-sm-right"><label>E-mailadres</label></div>
                    <div class="col-12 col-sm-8">
                        <a href="mailto:{{ $response->email }}">{{ $response->email }}</a></div>
                </div>
                <hr/>

                @if(!empty($response->phone))
                    <div class="row mb-3">
                        <div class="col-12 col-sm-4 text-sm-right"><label>Telefoonnummer</label></div>
                        <div class="col-12 col-sm-8">{{ $response->phone }}</div>
                    </div>
                    <hr/>
                @endif

                <div class="row mb-3">
                    <div class="col-12 text-right">
                        <div class="btn-group">
                            <a href="{{ action('Backend\VeadsRequestController@show', ['request' => $response->request]) }}" class="btn btn-sm btn-primary"><span class="fas fa-arrow-left"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
