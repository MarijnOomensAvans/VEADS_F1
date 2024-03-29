@extends('layouts.admin')

@section('content')
    <div class="content">
        <h1>Evenementen</h1>
    </div>

    <div class="content">
        <div class="block block-rounded block-bordered">
            <div class="block-content">
                <div class="row">
                    <div class="col-12 col-md-7">
                        <a href="{{ route('admin/events/create') }}" class="btn btn-primary"><span class="fas fa-plus"></span> Evenement toevoegen</a>
                        <a href="{{ route('admin/events/featured') }}" class="btn btn-primary"><span class="fas fa-star"></span> Uitgelichte evenementen</a>
                    </div>
                    <div class="col-12 col-md-5">
                        <form method="get">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="q" placeholder="Evenement zoeken" value="{{ $q }}">
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
                                <th>Event naam</th>
                                <th class="d-none d-md-table-cell">Event start</th>
                                <th class="d-none d-lg-table-cell">Event locatie</th>
                                <th class="text-center d-none d-lg-table-cell" style="width: 150px;">Donaties</th>
                                <th class="text-center d-none d-md-table-cell" style="width: 100px">Gepubliceerd</th>
                                <th class="text-center" style="width: 150px;">Acties</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($events->total() < 1)
                                <tr class="table-info">
                                    <td class="text-center" colspan="6">Geen evenementen gevonden.</td>
                                </tr>
                            @endif
                            @foreach($events as $event)
                                <tr>
                                    <td>{{ $event->name }}</td>
                                    <td class="d-none d-md-table-cell">
                                        @if(!empty($event->datetime) && !empty($event->datetime->start))
                                            {{ $event->datetime->start->format('d-m-Y \o\m H:i') }}
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td class="d-none d-lg-table-cell">
                                        @if(!empty($event->address))
                                            {{ $event->address->city }}
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td class="text-center d-none d-lg-table-cell">&euro;{{ number_format($event->donations->sum('amount'), 2, ',', '.') }}</td>
                                    <td class="text-center d-none d-md-table-cell">
                                        @if($event->published)
                                            <span class="fa fa-check"></span>
                                        @else
                                            <span class="fa fa-times"></span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="{{ route('admin/event', ['event' => $event]) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Details weergeven"><span class="fas fa-eye"></span></a>
                                            <a href="{{ route('admin/events/edit', ['event' => $event]) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Evenement aanpassen"><span class="fas fa-pencil-alt"></span></a>
                                            <a href="{{ route('admin/events/destroy', ['event' => $event]) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Evenement verwijderen"><span class="fas fa-trash"></span></a>
                                            <a href="{{ route('admin/events/partners', ['event' => $event]) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Gekoppelde partners beheren"><span class="fas fa-hands-helping"></span></a>
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
                        {{ $events->links() }}
                    </div>
                    <div class="col-sm-12 col-md-5 text-right">
                        <p>Pagina <strong>{{ $events->currentPage() }}</strong> van {{ $events->lastPage() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
