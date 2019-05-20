@extends('layouts.admin')

@section('content')
    <div class="content">
        @if(isset($ambassador))
            <h1>Ambassadeur aanpassen</h1>
        @else
            <h1>Ambassadeur toevoegen</h1>
        @endif
    </div>

    <div class="content">
        <div class="block block-rounded block-bordered">
            <div class="block-content">
                <div class="row">
                    <div class="col-12">
                        <form method="post" action="{{ (isset($ambassador) ? action('Backend\AmbassadorController@update', compact('ambassador')) : action('Backend\AmbassadorController@store')) }}" enctype="multipart/form-data">
                            @csrf

                            @if(isset($ambassador))
                                @method('PUT')
                            @endif

                            @component('includes.forms.formgroup', [
                                'name' => 'name',
                                'title' => 'Naam',
                                'prefill' => $ambassador->name ?? ''
                            ])@endcomponent

                            @component('includes.forms.formgroup', [
                                'name' => 'company',
                                'title' => 'Bedrijf',
                                'prefill' => $ambassador->company ?? ''
                            ])@endcomponent

                            @component('includes.forms.formgroup', [
                                'name' => 'url',
                                'title' => 'Link naar de ambassadeur',
                                'prefill' => $ambassador->url ?? ''
                            ])@endcomponent

                            @component('includes.forms.wysiwyg', [
                                'name' => 'description',
                                'title' => 'Omschrijving',
                                'prefill' => $ambassador->description ?? ''
                            ])@endcomponent

                            <div class="form-group row mb-5">
                                <label class="col-sm-4 col-lg-3 col-form-label text-sm-right{{ $errors->has('picture') ? ' text-danger' : '' }}" for="picture">Foto</label>
                                <div class="col-sm-8 col-lg-9">
                                    <input type="file" name="picture" id="picture" accept="image/jpeg,image/jpg,image/png,image/png,image/svg" class="form-control-file is-invalid" />
                                    @if($errors->has('picture'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('picture') }}
                                        </div>
                                    @endif

                                    @if(isset($ambassador))
                                        <div class="row mt-3 items-push img-fluid-100">
                                            <div class="col-md-6 col-lg-4 col-xl-3 animated fadeIn">
                                                <div class="options-container">
                                                    <img class="img-fluid" src="/image/{{ $ambassador->picture->path }}/{{ $ambassador->picture->name }}" />
                                                    <div class="options-overlay bg-black-75">
                                                        <div class="options-overlay-content">
                                                            <h3 class="h4 text-white mb-2">{{ $ambassador->picture->name }}</h3>
                                                            <h4 class="h6 text-white-75 mb-3">{{ $ambassador->picture->date->format('d-m-Y') }}</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-5">
                                <div class="offset-sm-4 offset-lg-3 col-sm-8 col-lg-9">
                                    <div class="custom-control custom-switch custom-control-lg mb-2">
                                        <input type="checkbox" class="custom-control-input" id="published" name="published" {{ isset($ambassador) && !$ambassador->published ? '' : 'checked' }} value="1">
                                        <label class="custom-control-label" for="published">Gepubliceerd</label>
                                        <span class="fas fa-question-circle" data-toggle="tooltip" data-placement="top" title="Hiermee kun je aangeven of deze ambassadeur zichtbaar moet zijn op de website."></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12 text-right">
                                    <a href="{{ action('Backend\AmbassadorController@index') }}" class="btn btn-secondary">Annuleren</a>
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
