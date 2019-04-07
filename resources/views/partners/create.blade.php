@extends('layouts.admin')

@php
$labelSmWidth = 4;
$labelLgWidth = 3;

$inputSmWidth = 12 - $labelSmWidth;
$inputLgWidth = 12 - $labelLgWidth;
@endphp

@section('content')
    <div class="content">
        @if(isset($partner))
            <h1>Partner aanpassen</h1>
        @else
            <h1>Partner toevoegen</h1>
        @endif
    </div>

    @if($errors->has('image'))
        <div class="content">
            <div class="alert alert-danger">
                {{ $errors->first('image') }}
            </div>
        </div>
    @endif

    <div class="content">
        <div class="block block-rounded block-bordered">
            <div class="block-content">
                <div class="row">
                    <div class="col-12">
                        <form method="post" action="{{ (isset($partner) ? route('admin/partners/edit', ['partner' => $partner]) : route('admin/partners/create')) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-{{ $labelSmWidth }} col-lg-{{ $labelLgWidth }} col-form-label" for="name">Partner naam</label>
                                <div class="col-sm-{{ $inputSmWidth }} col-lg-{{ $inputLgWidth }}">
                                    <input type="text" name="name" id="name" class="form-control{{ ($errors->has('name') ? ' is-invalid' : '') }}" value="{{ old('name', $partner->name ?? '') }}" placeholder="Partner naam" />
                                    @if($errors->has('name'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-{{ $labelSmWidth }} col-lg-{{ $labelLgWidth }} col-form-label" for="link">Partner link</label>
                                <div class="col-sm-{{ $inputSmWidth }} col-lg-{{ $inputLgWidth }}">
                                    <input type="text" name="link" id="link" class="form-control{{ ($errors->has('link') ? ' is-invalid' : '') }}" value="{{ old('link', $partner->link ?? 'http://') }}" placeholder="Partner website link" />
                                    @if($errors->has('link'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('link') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-5">
                                <label class="col-sm-{{ $labelSmWidth }} col-lg-{{ $labelLgWidth }} col-form-label" for="image">Foto</label>
                                <div class="col-sm-{{ $inputSmWidth / 2 }} col-lg-{{ $inputLgWidth }}">
                                    <input type="file" name="image" class="{{ ($errors->has('image') ? ' is-invalid' : '') }}" id="image" accept="image/jpeg,image/jpg,image/png,image/png,image/svg"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12 text-right">
                                    <a href="{{ route('admin/partners') }}" class="btn btn-secondary">Annuleren</a>
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
