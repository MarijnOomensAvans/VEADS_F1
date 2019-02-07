@extends('layouts.admin')

@php
$labelSmWidth = 4;
$labelLgWidth = 3;

$inputSmWidth = 12 - $labelSmWidth;
$inputLgWidth = 12 - $labelLgWidth;
@endphp

@section('content')
    <div class="content">
        <h1>Evenement toevoegen</h1>
    </div>

    <div class="content">
        <div class="block block-rounded block-bordered">
            <div class="block-content">
                <div class="row">
                    <div class="col-12">
                        <form method="post">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-{{ $labelSmWidth }} col-lg-{{ $labelLgWidth }} col-form-label" for="name">Evenement naam</label>
                                <div class="col-sm-{{ $inputSmWidth }} col-lg-{{ $inputLgWidth }}">
                                    <input type="text" name="name" id="name" class="form-control{{ ($errors->has('name') ? ' is-invalid' : '') }}" placeholder="Evenement naam" />
                                    @if($errors->has('name'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-{{ $labelSmWidth }} col-lg-{{ $labelLgWidth }} col-form-label" for="description">Evenement omschrijving</label>
                                <div class="col-sm-{{ $inputSmWidth }} col-lg-{{ $inputLgWidth }}">
                                    <textarea class="form-control{{ ($errors->has('description') ? ' is-invalid' : '') }}" name="description" id="description" rows="15" placeholder="Evenement omschrijving"></textarea>
                                    @if($errors->has('description'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('description') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-5">
                                <label class="col-sm-{{ $labelSmWidth }} col-lg-{{ $labelLgWidth }} col-form-label" for="price">Entree prijs
                                    <span class="fas fa-question-circle" data-toggle="tooltip" data-placement="top" title="Dit wordt alleen op de website weergegeven als de prijs groter is dan 0."></span>
                                </label>
                                <div class="input-group col-sm-{{ $inputSmWidth }} col-lg-{{ $inputLgWidth }}">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-euro-sign"></i>
                                        </span>
                                    </div>
                                    <input type="number" step="0.01" min="0" name="price" id="price" class="form-control{{ ($errors->has('price') ? ' is-invalid' : '') }}" value="0.00" />
                                </div>
                                @if($errors->has('price'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('price') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-{{ $labelSmWidth }} col-lg-{{ $labelLgWidth }} col-form-label" for="start_date">Begindatum/-tijd</label>
                                <div class="col-sm-{{ $inputSmWidth / 2 }} col-lg-6">
                                    <input type="date" name="start_date" id="start_date" class="form-control{{ ($errors->has('start_date') ? ' is-invalid' : '') }}" placeholder="dd-mm-jjjj" />
                                    @if($errors->has('start_date'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('start_date') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-sm-{{ $inputSmWidth / 2 }} col-lg-3">
                                    <input type="time" name="start_time" id="start_time" class="form-control{{ ($errors->has('start_time') ? ' is-invalid' : '') }}" placeholder="uu:mm" />
                                    @if($errors->has('start_time'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('start_time') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-5">
                                <label class="col-sm-{{ $labelSmWidth }} col-lg-{{ $labelLgWidth }} col-form-label" for="end_date">Einddatum/-tijd</label>
                                <div class="col-sm-{{ $inputSmWidth / 2 }} col-lg-6">
                                    <input type="date" name="end_date" id="end_date" class="form-control{{ ($errors->has('end_date') ? ' is-invalid' : '') }}" placeholder="dd-mm-jjjj" />
                                    @if($errors->has('end_date'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('end_date') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-sm-{{ $inputSmWidth / 2 }} col-lg-3">
                                    <input type="time" name="end_time" id="end_time" class="form-control{{ ($errors->has('end_time') ? ' is-invalid' : '') }}" placeholder="uu:mm" />
                                    @if($errors->has('end_time'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('end_time') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-{{ $labelSmWidth }} col-lg-{{ $labelLgWidth }} col-form-label" for="street">Adres</label>
                                <div class="col-sm-{{ $inputSmWidth / 4 * 2}} col-lg-5">
                                    <input type="text" name="street" id="street" class="form-control{{ ($errors->has('street') ? ' is-invalid' : '') }}" placeholder="Straat" />
                                    @if($errors->has('street'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('street') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-sm-{{ $inputSmWidth / 4 }} col-lg-2">
                                    <input type="number" step="1" min="1" name="number" id="number" class="form-control{{ ($errors->has('number') ? ' is-invalid' : '') }}" placeholder="Nummer" />
                                    @if($errors->has('number'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('number') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-sm-{{ $inputSmWidth / 4 }} col-lg-2">
                                    <input type="text" name="number_modifier" id="number_modifier" class="form-control{{ ($errors->has('number_modifier') ? ' is-invalid' : '') }}" placeholder="Toevoeging" />
                                    @if($errors->has('number_modifier'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('number_modifier') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-{{ $labelSmWidth }} col-lg-{{ $labelLgWidth }} col-form-label" for="street">Postcode/plaats</label>
                                <div class="col-sm-{{ $inputSmWidth / 2 }} col-lg-4">
                                    <input type="text" name="zipcode" id="zipcode" class="form-control{{ ($errors->has('zipcode') ? ' is-invalid' : '') }}" placeholder="Postcode" />
                                    @if($errors->has('zipcode'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('zipcode') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-sm-{{ $inputSmWidth / 2 }} col-lg-5">
                                    <input type="text" name="city" id="city" class="form-control{{ ($errors->has('city') ? ' is-invalid' : '') }}" placeholder="Plaats" />
                                    @if($errors->has('city'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('city') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-5">
                                <label class="col-sm-{{ $labelSmWidth }} col-lg-{{ $labelLgWidth }} col-form-label" for="country">Land</label>
                                <div class="col-sm-{{ $inputSmWidth / 2 }} col-lg-{{ $inputLgWidth }}">
                                    <input type="text" name="country" id="country" class="form-control{{ ($errors->has('country') ? ' is-invalid' : '') }}" placeholder="Land" />
                                    @if($errors->has('country'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('country') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12 text-right">
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

@section('scripts')
    <link rel="stylesheet" type="text/css" href="{{ asset('js/plugins/summernote/summernote-bs4.css') }}" />
    <script src="{{ asset('js/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('js/plugins/summernote/summernote-nl-NL.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            $(document).tooltip({ selector: '[data-toggle="tooltip"]' });
            $('#description').summernote({
                lang: 'nl-NL',
                height: 300,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['fontsize', ['fontsize']],
                    ['para', ['ol', 'ul']],
                    ['misc', ['undo', 'redo']]
                ],
                placeholder: 'Evenement omschrijving'
            });
        });
    </script>
@endsection