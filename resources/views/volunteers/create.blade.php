@extends('layouts.admin')

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

                            @component('includes.forms.formgroup', [
                                'name' => 'first_name',
                                'title' => 'Voornaam',
                                'prefill' => $volunteer->first_name ?? ''
                            ])@endcomponent

                            @component('includes.forms.formgroup', [
                                'name' => 'last_name',
                                'title' => 'Achternaam',
                                'prefill' => $volunteer->last_name ?? ''
                            ])@endcomponent

                            <div class="form-group row mb-5">
                                <label class="col-sm-4 col-lg-3 col-form-label text-sm-right" for="email">E-mailadres</label>
                                <div class="col-sm-8 col-lg-9">
                                    <input type="email" name="email" id="email" class="form-control{{ ($errors->has('email') ? ' is-invalid' : '') }}" value="{{ old('email', $volunteer->email ?? '') }}" placeholder="E-mailadres" />
                                    @if($errors->has('email'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('email') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-5">
                                <label class="col-sm-4 col-lg-3 col-form-label text-sm-right" for="phone_number">Telefoonnummer</label>
                                <div class="col-sm-8 col-lg-9">
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
