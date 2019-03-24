@extends('front.master')

@section('content')

<section class="wow fadeIn" id="start-your-project" style="visibility: visible; animation-name: fadeIn; height: 90vh;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12 center-col margin-eight-bottom sm-margin-40px-bottom xs-margin-30px-bottom text-center last-paragraph-no-margin">
                <h5 class="alt-font font-weight-700 text-extra-dark-gray text-uppercase">Inloggen als vrijwilliger</h5>
            </div>
        </div>


        @if (\Session::has('error'))
            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <div class="alert alert-danger">
                        <ul>
                            <li>{{\Session::get('error')}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        @endif
        
        
        <form method="post" action="/login">
            @csrf
            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <input type="text" name="email" placeholder="E-mailadres" class="big-input">
                </div>
                
            </div>

            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <input type="password" name="password" placeholder="Wachtwoord" class="big-input">
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-transparent-dark-gray btn-large margin-20px-top">inloggen</button>
                </div>
            </div>
        </form>
    </div>
</section>

@endsection

