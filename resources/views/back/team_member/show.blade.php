@extends('layouts.admin')

@section('content')
    <div class="content">
        <h1>{{ $team_member->full_name }}</h1>
    </div>

    <div class="content">
        <div class="block block-rounded block-bordered">
            <div class="block-content">
                @if(!empty($team_member->function))
                    <div class="row mb-3">
                        <div class="col-12 col-sm-4 text-sm-right"><label>Functie</label></div>
                        <div class="col-12 col-sm-8">{{ $team_member->function }}</div>
                    </div>
                    <hr/>
                @endif

                @if(!empty($team_member->description))
                    <div class="row mb-3">
                        <div class="col-12 col-sm-4 text-sm-right"><label>Omschrijving</label></div>
                        <div class="col-12 col-sm-8">{!! $team_member->description !!}</div>
                    </div>
                    <hr/>
                @endif


                <hr/>

                <div class="row">
                    <div class="col-12">
                        <label>Foto</label>
                    </div>
                </div>

                <div class="row mb-3 items-push img-fluid-100">
                    <div class="col-md-6 col-lg-4 col-xl-3 animated fadeIn">
                        <div class="options-container">
                            @if(!empty($team_member->picture))
                                <img class="img-fluid"
                                     src="/image/{{ $team_member->picture->path }}/{{ $team_member->picture->name }}"/>
                                <div class="options-overlay bg-black-75">
                                    <div class="options-overlay-content">
                                        <h3 class="h4 text-white mb-2">{{ $team_member->picture->name }}</h3>
                                        <h4 class="h6 text-white-75 mb-3">{{ $team_member->picture->date->format('d-m-Y') }}</h4>
                                    </div>
                                    @endif
                                </div>
                        </div>
                    </div>
                </div>
                <hr/>


                <div class="row mb-3">
                    <div class="col-12 text-right">
                        <form method="post"
                              action="{{ action('Backend\TeamMemberController@destroy', compact('team_member')) }}"
                              onsubmit="return confirm('Weet u zeker dat u het teamlid \'{{ $team_member->full_name }}\' wilt verwijderen?');">
                            @csrf
                            @method("DELETE")
                            <div class="btn-group">
                                <a href="{{ action('Backend\TeamMemberController@index') }}"
                                   class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Terug naar alle teamleden"><span class="fas fa-arrow-left"></span></a>
                                <a href="{{ action('Backend\TeamMemberController@edit', compact('team_member')) }}"
                                   class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Teamlid aanpassen"><span class="fas fa-pencil-alt"></span></a>
                                <button type="submit" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Teamlid verwijderen"><span class="fas fa-trash"></span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection