@extends('layouts.admin')

@section('content')
    <div class="content">
        <h1>Partners</h1>
    </div>

    <div class="content">
        <div class="block block-rounded block-bordered">
            <div class="block-content">
                <div class="row">
                    <div class="col-12 col-md-7">
                        <a href="{{ route('admin/partners/create') }}" class="btn btn-primary"><span class="fas fa-plus"></span> Partner toevoegen</a>
                    </div>
                    <div class="col-12 col-md-5">
                        <form method="get">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="q" placeholder="Partner zoeken" value="{{ $q }}">
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
                                <th>Partner naam</th>
                                <th class="text-center" style="width: 150px;">Acties</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($partners->total() < 1)
                                <tr class="table-info">
                                    <td class="text-center" colspan="5">Geen partners gevonden.</td>
                                </tr>
                            @endif
                            @foreach($partners as $partner)
                                <tr>
                                    <td>{{ $partner->name }}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="{{ route('admin/partner', ['partner' => $partner]) }}" class="btn btn-sm btn-primary"><span class="fas fa-eye"></span></a>
                                            <a href="{{ route('admin/partners/edit', ['partner' => $partner]) }}" class="btn btn-sm btn-primary"><span class="fas fa-pencil-alt"></span></a>
                                            <a href="{{ route('admin/partners/destroy', ['partner' => $partner]) }}" class="btn btn-sm btn-primary"><span class="fas fa-trash"></span></a>
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
                        {{ $partners->links() }}
                    </div>
                    <div class="col-sm-12 col-md-5 text-right">
                        <p>Pagina <strong>{{ $partners->currentPage() }}</strong> van {{ $partners->lastPage() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
