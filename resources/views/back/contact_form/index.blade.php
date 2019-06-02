@extends('layouts.admin')

@section('content')
    <div class="content">
        <h1>Contact aanvragen</h1>
    </div>

    <div class="content">
        <div class="block block-rounded block-bordered">
            <div class="block-content">
                <div class="row">
                    <div class="col-12 col-md-5">
                        <form method="get">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="q" placeholder="Aanvraag zoeken" value="{{ $q }}">
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
                                <th>Email</th>
                                <th class="text-center" style="width: 150px;">Acties</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($contact_forms->total() < 1)
                                <tr class="table-info">
                                    <td class="text-center" colspan="3">Geen contact aanvragen gevonden.</td>
                                </tr>
                            @endif
                            @foreach($contact_forms as $contact_form)
                                <tr>
                                    <td>{{ $contact_form->name }}</td>
                                    <td>{{ $contact_form->email }}</td>
                                    <td class="text-center">
                                        <form method="post" action="{{ action('Backend\ContactFormController@destroy', compact('contact_form')) }}" onsubmit="return confirm('Weet u zeker dat u de contact aanvraag van \'{{ $contact_form->name }}\' wilt verwijderen?');">
                                            @csrf
                                            @method("DELETE")
                                            <div class="btn-group">
                                                <a href="{{ action('Backend\ContactFormController@show', compact('contact_form')) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Details weergeven"><span class="fas fa-eye"></span></a>
                                                <button type="submit" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Contact aanvraag verwijderen"><span class="fas fa-trash"></span></button>
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
                        {{ $contact_forms->links() }}
                    </div>
                    <div class="col-sm-12 col-md-5 text-right">
                        <p>Pagina <strong>{{ $contact_forms->currentPage() }}</strong> van {{ $contact_forms->lastPage() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
