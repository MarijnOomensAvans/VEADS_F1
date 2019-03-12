@extends('layouts.admin')

@section('content')
    <div class="content">
        <h1>Instagram toegang</h1>
    </div>

    @if(session()->has('instagram_error'))
        <div class="content">
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="block block-rounded block-bordered">
                        <div class="block-content">
                            <p class="alert alert-danger">
                                {{ session()->get('instagram_error') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="content">
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="block block-rounded block-bordered">
                    <div class="block-content">
                        <p>
                            <a href="https://api.instagram.com/oauth/authorize/?client_id={{ config('instagram.client_id') }}&redirect_uri={{ config('instagram.redirect_uri') }}&response_type=code" class="btn btn-primary"><span class="fab fa-instagram"></span> Inloggen met Instagram</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(!empty($instagram_user))
        <div class="content">
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="block block-rounded block-bordered">
                        <div class="block-content">
                            <p>Ingelogd als {{ $instagram_user->full_name }} ({{ $instagram_user->username }})</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="content">
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="block block-rounded block-bordered">
                        <div class="block-content">
                            <p>Niet ingelogd bij Instagram</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if(!empty($media))
        <div class="content">
            <div class="row mb-3">
                <div class="col-12">
                    <h3>Recente media</h3>
                </div>
            </div>

            <div class="row">
                @foreach($media as $picture)
                    <div class="col-12 col-md-3">
                        <div class="block block-rounded block-bordered">
                            <div class="block-content">
                                <img src="{{ $picture->images->standard_resolution->url }}" class="img-fluid" />

                                <p class="text-center mt-3">{{ $picture->caption->text }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
@endsection
