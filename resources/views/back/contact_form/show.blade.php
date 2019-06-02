@extends('layouts.admin')

@section('content')
    <div class="content">
        <h1>Contact aanvraag van {{ $contact_form->name }}</h1>
    </div>

    <div class="content">
        <div class="block block-rounded block-bordered">
            <div class="block-content">
                <div class="row mb-3">
                    <div class="col-12 col-sm-4 text-sm-right"><label>Naam</label></div>
                    <div class="col-12 col-sm-8">{{ $contact_form->name }}</div>
                </div>
                <hr/>

                <div class="row mb-3">
                    <div class="col-12 col-sm-4 text-sm-right"><label>E-mailadres</label></div>
                    <div class="col-12 col-sm-8">
                        <a href="mailto:{{ $contact_form->email }}" target="_blank">{{ $contact_form->email }}</a>
                    </div>
                </div>
                <hr/>

                <div class="row mb-3">
                    <div class="col-12 col-sm-4 text-sm-right"><label>Vraag</label></div>
                    <div class="col-12 col-sm-8">{!! $contact_form->question !!}</div>
                </div>
                <hr/>

                <div class="row mb-3">
                    <div class="col-12 text-right">
                        <form method="post" action="{{ action('Backend\ContactFormController@destroy', compact('contact_form')) }}" onsubmit="return confirm('Weet u zeker dat u de contact aanvraag van \'{{ $contact_form->name }}\' wilt verwijderen?');">
                            @csrf
                            @method("DELETE")
                            <div class="btn-group">
                                <a href="{{ action('Backend\ContactFormController@index') }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Terug naar alle contact aanvragen"><span class="fas fa-arrow-left"></span></a>
                                <button type="submit" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Contact aanvraag verwijderen"><span class="fas fa-trash"></span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection