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

                            <div class="form-group row">
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