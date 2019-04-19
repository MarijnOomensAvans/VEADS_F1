@extends('front.master')

@section('content')

<section class="wow fadeIn" id="start-your-project" style="visibility: visible; animation-name: fadeIn; height: 90vh;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12 center-col margin-eight-bottom sm-margin-40px-bottom xs-margin-30px-bottom text-center last-paragraph-no-margin">
                <h5 class="alt-font font-weight-700 text-extra-dark-gray text-uppercase">Wachtwoord vergeten</h5>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 text-center">
                <p>Vul hieronder je e-mailadres is en ontvang een link in je mail om je wachtwoord te resetten.</p>
            </div>
        </div>

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        @if(count($errors->all()) > 0)
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            @endforeach
        @endif

        <form method="post" action="{{ route('password.email') }}">
            @csrf
            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <input type="text" name="email" placeholder="E-mailadres" class="big-input">
                </div>

            </div>

            <div class="row">
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-royal-blue btn-large margin-20px-top">Wachtwoord resetten</button>
                </div>
            </div>
        </form>
    </div>
</section>

@endsection

