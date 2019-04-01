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

                <div class="row mb-3">
                    <div class="col-12 text-right">
                        <form method="post" action="{{ action('Backend\TeamMemberController@destroy', compact('team_member')) }}" onsubmit="return confirm('Weet u zeker dat u het teamlid \'{{ $team_member->full_name }}\' wilt verwijderen?');">
                            @csrf
                            @method("DELETE")
                            <div class="btn-group">
                                <a href="{{ action('Backend\TeamMemberController@index') }}" class="btn btn-sm btn-primary"><span class="fas fa-arrow-left"></span></a>
                                <a href="{{ action('Backend\TeamMemberController@edit', compact('team_member')) }}" class="btn btn-sm btn-primary"><span class="fas fa-pencil-alt"></span></a>
                                <button type="submit" class="btn btn-sm btn-primary"><span class="fas fa-trash"></span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection