@extends('layouts.admin')

@section('content')
    <div class="content">
        <h1>Facebook</h1>
    </div>

    <div class="content">
        <div class="block block-rounded block-bordered">
            <div class="block-content">
                <div class="row">
                    <div class="col-12 col-md-7">
                        <a href="{{$fb_login_url}}" class="btn btn-primary"><span class="fas fa-facebook"></span>Login met Facebook</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
