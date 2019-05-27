@extends('layouts.admin')

@section('content')
    <div class="content">
        <h1>{{ $ambassador->name }}</h1>
    </div>

    <div class="content">
        <div class="block block-rounded block-bordered">
            <div class="block-content">
                @if(!empty($ambassador->company))
                    <div class="row mb-3">
                        <div class="col-12 col-sm-4 text-sm-right"><label>Bedrijf</label></div>
                        <div class="col-12 col-sm-8">{{ $ambassador->company }}</div>
                    </div>
                    <hr/>
                @endif

                @if(!empty($ambassador->url))
                    <div class="row mb-3">
                        <div class="col-12 col-sm-4 text-sm-right"><label>Link</label></div>
                        <div class="col-12 col-sm-8">
                            <a href="{{ $ambassador->url }}" target="_blank">{{ $ambassador->url }}</a>
                        </div>
                    </div>
                    <hr/>
                @endif

                @if(!empty(trim(strip_tags($ambassador->description))))
                        <div class="row mb-3">
                            <div class="col-12 col-sm-4 text-sm-right"><label>Omschrijving</label></div>
                            <div class="col-12 col-sm-8">{!! $ambassador->description !!}</div>
                        </div>
                        <hr/>
                @endif

                <div class="row mb-3">
                    <div class="col-12 col-sm-4 text-sm-right"><label>Gepubliceerd</label></div>
                    <div class="col-12 col-sm-8">
                        @if($ambassador->published)
                            <span class="fa fa-check"></span>
                        @else
                            <span class="fa fa-times"></span>
                        @endif
                    </div>
                </div>
                <hr/>

                <div class="row mb-3">
                    <div class="col-12 col-sm-4 text-sm-right"><label>Foto</label></div>
                    <div class="col-12 col-sm-8">
                        <div class="col-md-6 col-lg-4 col-xl-3 animated fadeIn">
                            <div class="options-container">
                                <img class="img-fluid" src="/image/{{ $ambassador->picture->path }}/{{ $ambassador->picture->name }}" />
                                <div class="options-overlay bg-black-75">
                                    <div class="options-overlay-content">
                                        <h3 class="h4 text-white mb-2">{{ $ambassador->picture->name }}</h3>
                                        <h4 class="h6 text-white-75 mb-3">{{ $ambassador->picture->date->format('d-m-Y') }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr/>

                <div class="row mb-3">
                    <div class="col-12 text-right">
                        <form method="post" action="{{ action('Backend\AmbassadorController@destroy', compact('ambassador')) }}">
                            @csrf
                            @method('DELETE')
                            <div class="btn-group">
                                <a href="{{ action('Backend\AmbassadorController@index') }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Terug naar alle ambassadeurs"><span class="fas fa-arrow-left"></span></a>
                                <a href="{{ action('Backend\AmbassadorController@edit', compact('ambassador')) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Ambassadeur aanpassen"><span class="fas fa-pencil-alt"></span></a>
                                <button type="submit" class="btn btn-sm btn-primary" onclick="return confirm('Weet u zeker dat u de ambassadeur \'{{ $ambassador->name }}\' wilt verwijderen?');" data-toggle="tooltip" data-placement="top" title="Ambassadeur verwijderen"><span class="fas fa-trash"></span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
