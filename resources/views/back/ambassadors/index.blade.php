@extends('layouts.admin')

@section('content')
    <div class="content">
        <h1>Ambassadeurs</h1>
    </div>

    <div class="content">
        <div class="block block-rounded block-bordered">
            <div class="block-content">
                <div class="row">
                    <div class="col-12 col-md-7">
                        <a href="{{ action('Backend\AmbassadorController@create') }}" class="btn btn-primary"><span class="fas fa-plus"></span> Ambassadeur toevoegen</a>
                    </div>
                    <div class="col-12 col-md-5">
                        <form method="get">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="q" placeholder="Ambassadeur zoeken" value="{{ $q }}">
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
                                <th>Naam</th>
                                <th>Bedrijf</th>
                                <th class="text-center d-none d-md-table-cell">Gepubliceerd</th>
                                <th class="text-center" style="width: 150px;">Acties</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($ambassadors->total() < 1)
                                <tr class="table-info">
                                    <td class="text-center" colspan="4">Geen ambassadeurs gevonden.</td>
                                </tr>
                            @endif
                            @foreach($ambassadors as $ambassador)
                                <tr>
                                    <td>{{ $ambassador->name }}</td>
                                    <td>{{ $ambassador->company }}</td>
                                    <td class="text-center d-none d-md-table-cell">
                                        @if($ambassador->published)
                                            <span class="fa fa-check"></span>
                                        @else
                                            <span class="fa fa-times"></span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <form method="post" action="{{ action('Backend\AmbassadorController@destroy', compact('ambassador')) }}">
                                            @csrf
                                            @method('DELETE')
                                            <div class="btn-group">
                                                <a href="{{ action('Backend\AmbassadorController@show', compact('ambassador')) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Details weergeven"><span class="fas fa-eye"></span></a>
                                                <a href="{{ action('Backend\AmbassadorController@edit', compact('ambassador')) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Ambassadeur aanpassen"><span class="fas fa-pencil-alt"></span></a>
                                                 <button type="submit" class="btn btn-sm btn-primary" onclick="return confirm('Weet u zeker dat u de ambassadeur \'{{ $ambassador->name }}\' wilt verwijderen?');" data-toggle="tooltip" data-placement="top" title="Ambassadeur verwijderen"><span class="fas fa-trash"></span></button>
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
                        {{ $ambassadors->links() }}
                    </div>
                    <div class="col-sm-12 col-md-5 text-right">
                        <p>Pagina <strong>{{ $ambassadors->currentPage() }}</strong> van {{ $ambassadors->lastPage() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
