@extends('layouts.admin')

@php
$labelSmWidth = 4;
$labelLgWidth = 3;

$inputSmWidth = 12 - $labelSmWidth;
$inputLgWidth = 12 - $labelLgWidth;
@endphp

@section('content')
    <div class="content">
        @if(isset($event))
            <h1>Evenement aanpassen</h1>
        @else
            <h1>Evenement toevoegen</h1>
        @endif
    </div>

    <div class="content">
        <div class="block block-rounded block-bordered">
            <div class="block-content">
                <div class="row">
                    <div class="col-12">
                        <form method="post" action="{{ (isset($event) ? route('admin/events/edit', ['event' => $event]) : route('admin/events/create')) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-{{ $labelSmWidth }} col-lg-{{ $labelLgWidth }} col-form-label" for="name">Evenement naam</label>
                                <div class="col-sm-{{ $inputSmWidth }} col-lg-{{ $inputLgWidth }}">
                                    <input type="text" name="name" id="name" class="form-control{{ ($errors->has('name') ? ' is-invalid' : '') }}" value="{{ old('name', $event->name ?? '') }}" placeholder="Evenement naam" />
                                    @if($errors->has('name'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-5">
                                <label class="col-sm-{{ $labelSmWidth }} col-lg-{{ $labelLgWidth }} col-form-label" for="description">Evenement omschrijving</label>
                                <div class="col-sm-{{ $inputSmWidth }} col-lg-{{ $inputLgWidth }}">
                                    <textarea class="form-control{{ ($errors->has('description') ? ' is-invalid' : '') }}" name="description" id="description" rows="15" placeholder="Evenement omschrijving">{{ old('description', $event->description ?? '') }}</textarea>
                                    @if($errors->has('description'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('description') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-5">
                                <label class="col-sm-{{ $labelSmWidth }} col-lg-{{ $labelLgWidth }} col-form-label" for="name">Project</label>
                                <div class="col-sm-{{ $inputSmWidth }} col-lg-{{ $inputLgWidth }}">
                                    <project-search-component project="{{ old('project_id', $event->project_id ?? '') }}"></project-search-component>
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
                                    <input type="number" step="0.01" min="0" max="9999.99 " name="price" id="price" class="form-control{{ ($errors->has('price') ? ' is-invalid' : '') }}" value="{{ old('price', $event->price ?? '0.00') }}" />
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
                                    <input type="date" name="start_date" id="start_date" class="form-control{{ ($errors->has('start_datetime') ? ' is-invalid' : '') }}" value="{{ old('start_date', (isset($event) && !empty($event->datetime) && !empty($event->datetime->start) ? $event->datetime->start->format('Y-m-d') : '')) }}" placeholder="dd-mm-jjjj" />
                                    @if($errors->has('start_datetime'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('start_datetime') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-sm-{{ $inputSmWidth / 2 }} col-lg-3">
                                    <input type="time" name="start_time" id="start_time" class="form-control{{ ($errors->has('start_datetime') ? ' is-invalid' : '') }}" value="{{ old('start_time', (isset($event) && !empty($event->datetime) && !empty($event->datetime->start) ? $event->datetime->start->format('H:i') : '')) }}" placeholder="uu:mm" />
                                    @if($errors->has('start_datetime'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('start_datetime') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-5">
                                <label class="col-sm-{{ $labelSmWidth }} col-lg-{{ $labelLgWidth }} col-form-label" for="end_date">Einddatum/-tijd</label>
                                <div class="col-sm-{{ $inputSmWidth / 2 }} col-lg-6">
                                    <input type="date" name="end_date" id="end_date" class="form-control{{ ($errors->has('end_datetime') ? ' is-invalid' : '') }}" value="{{ old('end_date', (isset($event) && !empty($event->datetime) && !empty($event->datetime->end) ? $event->datetime->end->format('Y-m-d') : '')) }}" placeholder="dd-mm-jjjj" />
                                    @if($errors->has('end_datetime'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('end_datetime') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-sm-{{ $inputSmWidth / 2 }} col-lg-3">
                                    <input type="time" name="end_time" id="end_time" class="form-control{{ ($errors->has('end_datetime') ? ' is-invalid' : '') }}" value="{{ old('end_time', (isset($event) && !empty($event->datetime) && !empty($event->datetime->end) ? $event->datetime->end->format('H:i') : '')) }}" placeholder="uu:mm" />
                                    @if($errors->has('end_datetime'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('end_datetime') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            @include('includes.forms.address', ['address' => (isset($event) ? $event->address: null)])

                            <div class="form-group row mb-5">
                                <label class="col-sm-{{ $labelSmWidth }} col-lg-{{ $labelLgWidth }} col-form-label" for="image">Foto's</label>
                                <div class="col-sm-{{ $inputSmWidth / 2 }} col-lg-{{ $inputLgWidth }}">
                                    <input type="file" name="image[]" id="image" accept="image/jpeg,image/jpg,image/png,image/png,image/svg" multiple/>

                                    @if(isset($event) && count($event->pictures))
                                        <div class="row mt-3 items-push img-fluid-100">
                                            @each('events.partials.picture', $event->pictures, 'picture')
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-5">
                                <div class="offset-sm-{{ $labelSmWidth }} offset-lg-{{ $labelLgWidth }} col-sm-{{ $inputSmWidth / 2 }} col-lg-{{ $inputLgWidth }}">
                                    <div class="custom-control custom-switch custom-control-lg mb-2">
                                        <input type="checkbox" class="custom-control-input" id="published" name="published" {{ isset($event) && $event->published ? "checked" : '' }} value="1">
                                        <label class="custom-control-label" for="published">Gepubliceerd</label>
                                        <span class="fas fa-question-circle" data-toggle="tooltip" data-placement="top" title="Hiermee kun je aanpassen of dit evenement zichtbaar moet zijn op de website."></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12 text-right">
                                    <a href="{{ route('admin/events') }}" class="btn btn-secondary">Annuleren</a>
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