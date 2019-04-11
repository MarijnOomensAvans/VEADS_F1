@extends('layouts.admin')

@section('content')
    <div class="content">
        <h1>Donaties</h1>
    </div>

    <div class="content">
        <div class="block block-rounded block-bordered">
            <div class="block-content">
                <div class="row">
                    <div class="col-12">
                        <form method="get">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="q" placeholder="Donatie zoeken" value="{{ $q }}">
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
                                <th class="text-right" style="width: 150px;">Bedrag</th>
                                <th class="text-center" style="width: 150px;">Status</th>
                                <th class="text-center" style="width: 150px;">Acties</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($donations->total() < 1)
                                <tr class="table-info">
                                    <td class="text-center" colspan="4">Geen donaties gevonden.</td>
                                </tr>
                            @endif
                            @foreach($donations as $donation)
                                <tr>
                                    <td>{{ $donation->full_name }}</td>
                                    <td class="text-right">&euro;{{ number_format($donation->amount, 2, ',', '.') }}</td>
                                    <td class="text-center">
                                        @if(!empty($donation->refunded_at))
                                            <span class="badge badge-danger">Terugbetaald</span>
                                        @else
                                            @if(!empty($donation->paid_at))
                                                <span class="badge badge-success">Verwerkt</span>
                                            @else
                                                <span class="badge badge-warning">Wordt verwerkt</span>
                                            @endif
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="{{ action('Backend\DonationController@show', ['donation' => $donation]) }}" class="btn btn-sm btn-primary"><span class="fas fa-eye"></span></a>
                                            @if(!$donation->refunded)
                                                <a href="{{ action('Backend\DonationController@refund', ['donation' => $donation]) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Terugbetalen"><span class="fas fa-hand-holding-usd"></span></a>
                                            @endif
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
                        {{ $donations->links() }}
                    </div>
                    <div class="col-sm-12 col-md-5 text-right">
                        <p>Pagina <strong>{{ $donations->currentPage() }}</strong> van {{ $donations->lastPage() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
