@extends('layouts.admin')

@section('content')
    <div class="content">
        <h1>{{ config('app.name') }} zoekt...</h1>
    </div>

    <div class="content">
        <div class="block block-rounded block-bordered">
            <div class="block-content">
                <div class="row">
                    <div class="col-12 col-md-7">
                        <a href="{{ action('Backend\VeadsRequestController@create') }}" class="btn btn-primary"><span class="fas fa-plus"></span> Advertentie toevoegen</a>
                    </div>
                    <div class="col-12 col-md-5">
                        <form method="get">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="q" placeholder="Advertentie zoeken" value="{{ $q }}">
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
                                <th>Advertentie</th>
                                <th class="d-none d-md-table-cell">Gevraagd aantal</th>
                                <th class="d-none d-md-table-cell">Aantal reacties</th>
                                <th class="text-center" style="width: 150px;">Acties</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($requests->total() < 1)
                                <tr class="table-info">
                                    <td class="text-center" colspan="4">Geen advertenties gevonden.</td>
                                </tr>
                            @endif
                            @foreach($requests as $request)
                                <tr>
                                    <td>{{ $request->title }}</td>
                                    <td class="d-none d-md-table-cell">
                                        {{ $request->amount }}
                                    </td>
                                    <td class="d-none d-md-table-cell">
                                       {{ count($request->responses) }}
                                    </td>
                                    <td class="text-center">
                                        <form method="post" action="{{ action('Backend\VeadsRequestController@destroy', compact('request')) }}">
                                            @csrf
                                            @method('DELETE')
                                            <div class="btn-group">
                                                <a href="{{ action('Backend\VeadsRequestController@show', compact('request')) }}" class="btn btn-sm btn-primary"><span class="fas fa-eye"></span></a>
                                                <a href="{{ action('Backend\VeadsRequestController@edit', compact('request')) }}" class="btn btn-sm btn-primary"><span class="fas fa-pencil-alt"></span></a>
                                                <button class="btn btn-sm btn-primary" onclick="return confirm('Weet u zeker dat u de advertentie \'{{ $request->title }}\' wilt verwijderen?');"><span class="fas fa-trash"></span></button>
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
                        {{ $requests->links() }}
                    </div>
                    <div class="col-sm-12 col-md-5 text-right">
                        <p>Pagina <strong>{{ $requests->currentPage() }}</strong> van {{ $requests->lastPage() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
