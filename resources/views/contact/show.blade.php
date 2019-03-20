@extends('layouts.admin')

@section('content')
    <div class="content">
        <h1>Contact aanvraag</h1>
    </div>

    <div class="content">
        <div class="block block-rounded block-bordered">
            <div class="block-content">
                <div class="row mb-3">
                    <div class="col-12 col-sm-4"><label>Naam</label></div>
                    <div class="col-12 col-sm-8">{{ $contact->name }}</div>
                </div>
                <hr/>
                <div class="row mb-3">
                    <div class="col-12 col-sm-4"><label>E-mailadres</label></div>
                    <div class="col-12 col-sm-8"><a href="mailto:{{ $contact->email }}" target="_blank">{{ $contact->email }} <span class="fa fa-external-link-alt"></span></a></div>
                </div>
                <hr/>
                <div class="row mb-3">
                    <div class="col-12 col-sm-4"><label>Telefoonnummer</label></div>
                    <div class="col-12 col-sm-8">{{ $contact->phone_number }}</div>
                </div>
                <hr/>
                <div class="row mb-3">
                    <div class="col-12 col-sm-4"><label>Aanvraag</label></div>
                    <div class="col-12 col-sm-8">
                        {{ $contact->request }}
                    </div>
                </div>
                <hr/>
                <div class="row mb-3">
                    <div class="col-12 text-right">
                        <div class="btn-group">
                            <a href="{{ route('admin/contacts') }}" class="btn btn-sm btn-primary"><span class="fas fa-arrow-left"></span></a>
                            <a href="{{ route('admin/contacts/destroy', ['contact' => $contact]) }}" class="btn btn-sm btn-primary"><span class="fas fa-trash"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection