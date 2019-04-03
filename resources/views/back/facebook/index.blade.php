@extends('layouts.admin')

@section('content')
    <div class="content">
        <h1>Facebook</h1>
    </div>

    <div class="content">
        <div class="block block-rounded block-bordered">
            <div class="block-content">
                <div class="row mb-3">
                    <div class="col-12 col-md-12">
                        <a href="{{$fb_login_url}}" class="btn btn-primary">Verbinden met Facebook</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-12">
                <h5>Verbonden Pages</h5>
            </div>
        </div>

        <div class="row">
            @foreach($fb_pages as $page)
                <div class="col-12 col-md-4 mb-4">
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">{{ $page->name }}</h3>
                        </div>
                        <div class="block-content">
                            <strong>Laatste post</strong>
                            <p>{{ !empty($page->last_post) ? $page->last_post->message : '' }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
