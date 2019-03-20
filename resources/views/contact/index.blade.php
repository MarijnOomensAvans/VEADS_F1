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
                                    <input type="text" class="form-control" name="q" placeholder="Zoeken" value="{{ $q }}">
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
                                <th>E-mailadres</th>
                                <th class="text-center" style="width: 150px;">Acties</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($contacts->total() < 1)
                                <tr class="table-info">
                                    <td class="text-center" colspan="3">Geen contact aanvraag gevonden.</td>
                                </tr>
                            @endif
                            @foreach($contacts as $contact)
                                <tr>
                                    <td>{{ $volunteer->name }}</td>
                                    <td>{{ $volunteer->address->city }}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="{{ route('admin/contact', ['contact' => $contact]) }}" class="btn btn-sm btn-primary"><span class="fas fa-eye"></span></a>
                                            <a href="{{ route('admin/contacts/destroy', ['contact' => $contact]) }}" class="btn btn-sm btn-primary"><span class="fas fa-trash"></span></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-7">
                        {{ $contacts->links() }}
                    </div>
                    <div class="col-sm-12 col-md-5 text-right">
                        <p>Pagina <strong>{{ $contacts->currentPage() }}</strong> van {{ $contacts->lastPage() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
