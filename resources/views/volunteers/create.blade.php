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
                            <div class="form-group row">
                                <label class="col-sm-{{ $labelSmWidth }} col-lg-{{ $labelLgWidth }} col-form-label" for="first_name">Voornaam</label>
                                <div class="col-sm-{{ $inputSmWidth }} col-lg-{{ $inputLgWidth }}">
                                    <input type="text" name="first_name" id="first_name" class="form-control{{ ($errors->has('first_name') ? ' is-invalid' : '') }}" value="{{ old('first_name', $volunteer->first_name ?? '') }}" placeholder="Voornaam" />
                                    @if($errors->has('first_name'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('first_name') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-5">
                                <label class="col-sm-{{ $labelSmWidth }} col-lg-{{ $labelLgWidth }} col-form-label" for="last_name">Achternaam</label>
                                <div class="col-sm-{{ $inputSmWidth }} col-lg-{{ $inputLgWidth }}">
                                    <input type="text" name="last_name" id="last_name" class="form-control{{ ($errors->has('last_name') ? ' is-invalid' : '') }}" value="{{ old('last_name', $volunteer->last_name ?? '') }}" placeholder="Achternaam" />
                                    @if($errors->has('last_name'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('last_name') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-5">
                                <label class="col-sm-{{ $labelSmWidth }} col-lg-{{ $labelLgWidth }} col-form-label" for="phone_number">Telefoonnummer</label>
                                <div class="col-sm-{{ $inputSmWidth }} col-lg-{{ $inputLgWidth }}">
                                    <input type="tel" name="phone_number" id="phone_number" class="form-control{{ ($errors->has('phone_number') ? ' is-invalid' : '') }}" value="{{ old('phone_number', $volunteer->phone_number ?? '') }}" placeholder="Telefoonnummer" />
                                    @if($errors->has('phone_number'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('phone_number') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            @include('includes.forms.address', ['address' => (isset($volunteer) ? $volunteer->address : null)])

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
