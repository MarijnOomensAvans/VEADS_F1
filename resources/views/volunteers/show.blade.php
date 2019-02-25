@extends('layouts.admin')

@section('content')
    <div class="content">
        <h1>{{ $volunteer->name }}</h1>
    </div>

    <div class="content">
        <div class="block block-rounded block-bordered">
            <div class="block-content">
                <div class="row mb-3">
                    <div class="col-12 col-sm-4"><label>Naam</label></div>
                    <div class="col-12 col-sm-8">{{ $volunteer->name }}</div>
                </div>
                <hr/>
                <div class="row mb-3">
                    <div class="col-12 col-sm-4"><label>Telefoonnummer</label></div>
                    <div class="col-12 col-sm-8">{{ $volunteer->phone_number }}</div>
                </div>
                <hr/>
                <div class="row mb-3">
                    <div class="col-12 col-sm-4"><label>Adres</label></div>
                    <div class="col-12 col-sm-8">
                        {{ $volunteer->address->street . ' ' . $volunteer->address->number . $volunteer->address->number_modifier }}<br/>
                        {{ $volunteer->address->zipcode . ' ' . $volunteer->address->city }}<br/>
                        {{ $volunteer->address->country }}
                    </div>
                </div>
                <hr/>
                <div class="row mb-3">
                    <div class="col-12 text-right">
                        <div class="btn-group">
                            <a href="{{ route('admin/volunteers') }}" class="btn btn-sm btn-primary"><span class="fas fa-arrow-left"></span></a>
                            <a href="{{ route('admin/volunteers/edit', ['volunteer' => $volunteer]) }}" class="btn btn-sm btn-primary"><span class="fas fa-pencil-alt"></span></a>
                            <a href="{{ route('admin/volunteers/destroy', ['volunteer' => $volunteer]) }}" class="btn btn-sm btn-primary"><span class="fas fa-trash"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection