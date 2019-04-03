@extends('layouts.admin')

@section('content')
    <div class="content">
        <h1>Facebook</h1>
    </div>

    <div class="content">
        <div class="block block-rounded block-bordered">
            <div class="block-content mb-4">
                <div class="row mb-3">
                    <div class="col-12 col-md-12">
                        <a href="{{$fb_login_url}}" class="btn btn-primary">Verbinden met Facebook</a>
                    </div>
                </div>

                <hr/>

                <div class="row">
                    <div class="col-12 col-md-12">
                        <h5>Verbonden Pages</h5>

                        <ul>
                            <li>Page #1</li>
                            <li>Page #2</li>
                            <li>Page #3</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
