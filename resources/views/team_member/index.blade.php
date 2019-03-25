@extends('layouts.admin')

@section('content')
    <div class="content">
        <h1>Teamleden</h1>
    </div>

    <div class="content">
        <div class="block block-rounded block-bordered">
            <div class="block-content">
                <div class="row">
                    <div class="col-12 col-md-7">
                        <a href="{{ action('Backend\TeamMemberController@create') }}" class="btn btn-primary"><span class="fas fa-plus"></span> Teamlid toevoegen</a>
                    </div>
                    <div class="col-12 col-md-5">
                        <form method="get">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="q" placeholder="Lid zoeken" value="{{ $q }}">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-search mr-1"></i> Zoeken
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <table class="table table-striped table-vcenter">
                            <thead>
                            <tr>
                                <th>Voornaam</th>
                                <th>Achternaam</th>
                                <th class="d-none d-sm-table-cell">Functie</th>
                                <th class="text-center" style="width: 150px;">Acties</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($team_members->total() < 1)
                                <tr class="table-info">
                                    <td class="text-center" colspan="4">Geen teamleden gevonden.</td>
                                </tr>
                            @endif
                            @foreach($team_members as $team_member)
                                <tr>
                                    <td>{{ $team_member->first_name }}</td>
                                    <td>{{ $team_member->last_name }}</td>
                                    <td class="d-none d-sm-table-cell">{{ $team_member->function }}</td>
                                    <td class="text-center">
                                        <form method="post" action="{{ action('Backend\TeamMemberController@destroy', compact('team_member')) }}" onsubmit="return confirm('Weet u zeker dat u het teamlid \'{{ $team_member->full_name }}\' wilt verwijderen?');">
                                            @csrf
                                            @method("DELETE")
                                            <div class="btn-group">
                                                <a href="{{ action('Backend\TeamMemberController@show', compact('team_member')) }}" class="btn btn-sm btn-primary"><span class="fas fa-eye"></span></a>
                                                <a href="{{ action('Backend\TeamMemberController@edit', compact('team_member')) }}" class="btn btn-sm btn-primary"><span class="fas fa-pencil-alt"></span></a>
                                                <button type="submit" class="btn btn-sm btn-primary"><span class="fas fa-trash"></span></button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-7">
                        {{ $team_members->links() }}
                    </div>
                    <div class="col-sm-12 col-md-5 text-right">
                        <p>Pagina <strong>{{ $team_members->currentPage() }}</strong> van {{ $team_members->lastPage() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
