@extends('layouts.admin')

@section('content')
    <div class="content">
        @if(isset($team_member))
            <h1>Teamlid aanpassen</h1>
        @else
            <h1>Teamlid toevoegen</h1>
        @endif
    </div>

    <div class="content">
        <div class="block block-rounded block-bordered">
            <div class="block-content">
                <div class="row">
                    <div class="col-12">
                        <form method="post" action="{{ (isset($team_member) ? action('Backend\TeamMemberController@update', ['team_member' => $team_member]) : action('Backend\TeamMemberController@index')) }}" enctype="multipart/form-data">
                            @csrf

                            @if(isset($team_member))
                                @method('PUT')
                            @endif

                            @component('includes.forms.formgroup', [
                                'name' => 'first_name',
                                'title' => 'Voornaam',
                                'prefill' => $team_member->first_name ?? ''
                            ])@endcomponent

                            @component('includes.forms.formgroup', [
                                'name' => 'last_name',
                                'title' => 'Achternaam',
                                'prefill' => $team_member->last_name ?? ''
                            ])@endcomponent

                            @component('includes.forms.formgroup', [
                                'name' => 'function',
                                'title' => 'Functie',
                                'prefill' => $team_member->function ?? ''
                            ])@endcomponent

                            @component('includes.forms.wysiwyg', [
                                'name' => 'description',
                                'title' => 'Omschrijving',
                                'prefill' => $team_member->description ?? ''
                            ])@endcomponent

                            @component('includes.forms.image', [
                               'name' => 'image',
                               'title' => 'Foto\'s',
                               'prefill' => $team_member->picture->path ?? '' 
                           ])@endcomponent

                            <div class="form-group row">
                                <div class="col-12 text-right">
                                    @if(isset($team_member))
                                        <a href="{{ action('Backend\TeamMemberController@show', compact('team_member')) }}" class="btn btn-secondary">Annuleren</a>
                                    @else
                                        <a href="{{ action('Backend\TeamMemberController@index') }}" class="btn btn-secondary">Annuleren</a>
                                    @endif
                                    <button type="submit" class="btn btn-primary">Opslaan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
