@extends('layouts.admin')

@php
$labelSmWidth = 4;
$labelLgWidth = 3;

$inputSmWidth = 12 - $labelSmWidth;
$inputLgWidth = 12 - $labelLgWidth;
@endphp

@section('content')
    <div class="content">
        @if(isset($project))
            <h1>Vrijwilliger aanpassen</h1>
        @else
            <h1>Vrijwilliger toevoegen</h1>
        @endif
    </div>

    <div class="content">
        <div class="block block-rounded block-bordered">
            <div class="block-content">
                <div class="row">
                    <div class="col-12">
                        <form method="post" action="{{ (isset($volunteer) ? route('admin/volunteers/edit', ['volunteer' => $volunteer]) : route('admin/volunteers/create')) }}">
                            @csrf
                            <div class="form-group row mb-5">
                                <label class="col-sm-{{ $labelSmWidth }} col-lg-{{ $labelLgWidth }} col-form-label" for="name">Naam</label>
                                <div class="col-sm-{{ $inputSmWidth }} col-lg-{{ $inputLgWidth }}">
                                    <input type="text" name="name" id="name" class="form-control{{ ($errors->has('name') ? ' is-invalid' : '') }}" value="{{ old('name', $volunteer->name ?? '') }}" placeholder="Naam" />
                                    @if($errors->has('name'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            @include('includes.forms.address', ['address' => (isset($volunteer) ? $volunteer->address: null)])

                            <div class="form-group row">
                                <div class="col-12 text-right">
                                    <a href="{{ route('admin/volunteers') }}" class="btn btn-secondary">Annuleren</a>
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
