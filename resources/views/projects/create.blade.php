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
            <h1>Project aanpassen</h1>
        @else
            <h1>Project toevoegen</h1>
        @endif
    </div>

    <div class="content">
        <div class="block block-rounded block-bordered">
            <div class="block-content">
                <div class="row">
                    <div class="col-12">
                        <form method="post" action="{{ (isset($project) ? route('admin/projects/edit', ['project' => $project]) : route('admin/projects/create')) }}">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-{{ $labelSmWidth }} col-lg-{{ $labelLgWidth }} col-form-label" for="name">Project naam</label>
                                <div class="col-sm-{{ $inputSmWidth }} col-lg-{{ $inputLgWidth }}">
                                    <input type="text" name="name" id="name" class="form-control{{ ($errors->has('name') ? ' is-invalid' : '') }}" value="{{ old('name', $project->name ?? '') }}" placeholder="Project naam" />
                                    @if($errors->has('name'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-5">
                                <label class="col-sm-{{ $labelSmWidth }} col-lg-{{ $labelLgWidth }} col-form-label" for="description">Project omschrijving</label>
                                <div class="col-sm-{{ $inputSmWidth }} col-lg-{{ $inputLgWidth }}">
                                    <textarea class="form-control{{ ($errors->has('description') ? ' is-invalid' : '') }}" name="description" id="description" rows="15" placeholder="Project omschrijving">{{ old('description', $project->description ?? '') }}</textarea>
                                    @if($errors->has('description'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('description') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-{{ $labelSmWidth }} col-lg-{{ $labelLgWidth }} col-form-label" for="street">Adres</label>
                                <div class="col-sm-{{ $inputSmWidth / 4 * 2}} col-lg-5">
                                    <input type="text" name="street" id="street" class="form-control{{ ($errors->has('street') ? ' is-invalid' : '') }}" value="{{ old('street', $project->address->street ?? '') }}" placeholder="Straat" />
                                    @if($errors->has('street'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('street') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-sm-{{ $inputSmWidth / 4 }} col-lg-2">
                                    <input type="number" step="1" min="1" name="number" id="number" class="form-control{{ ($errors->has('number') ? ' is-invalid' : '') }}" value="{{ old('number', $project->address->number ?? '') }}" placeholder="Nummer" />
                                    @if($errors->has('number'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('number') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-sm-{{ $inputSmWidth / 4 }} col-lg-2">
                                    <input type="text" name="number_modifier" id="number_modifier" class="form-control{{ ($errors->has('number_modifier') ? ' is-invalid' : '') }}" value="{{ old('number_modifier', $project->address->number_modifier ?? '') }}" placeholder="Toevoeging" />
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
                                    <input type="text" name="zipcode" id="zipcode" class="form-control{{ ($errors->has('zipcode') ? ' is-invalid' : '') }}" value="{{ old('zipcode', $project->address->zipcode ?? '') }}" placeholder="Postcode" />
                                    @if($errors->has('zipcode'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('zipcode') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-sm-{{ $inputSmWidth / 2 }} col-lg-5">
                                    <input type="text" name="city" id="city" class="form-control{{ ($errors->has('city') ? ' is-invalid' : '') }}"  value="{{ old('city', $project->address->city ?? '') }}" placeholder="Plaats" />
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
                                    <input type="text" name="country" id="country" class="form-control{{ ($errors->has('country') ? ' is-invalid' : '') }}" value="{{ old('country', $project->address->country ?? 'Nederland') }}" placeholder="Land" />
                                    @if($errors->has('country'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('country') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12 text-right">
                                    <a href="{{ route('admin/projects') }}" class="btn btn-secondary">Annuleren</a>
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
                placeholder: 'Project omschrijving'
            });
        });
    </script>
@endsection