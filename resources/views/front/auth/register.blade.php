@extends('front.master')

@section('content')

<section class="wow fadeIn" style="visibility: visible; animation-name: fadeIn; overflow: auto !important;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12 center-col margin-eight-bottom sm-margin-40px-bottom xs-margin-30px-bottom text-center last-paragraph-no-margin">
                <h5 class="alt-font font-weight-700 text-extra-dark-gray text-uppercase">Registreren als vrijwilliger</h5>
            </div>
        </div>

        @if ($errors->any())
            <div class="row col-md-6 col-md-offset-3">
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        
        
        <form method="post" action="/register">
            @csrf
            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <label>Voornaam</label>
                    <input type="text" class="big-input" name="first_name" value="{{ old('first_name') ?? '' }}">
                </div>
                
            </div>

            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <label>Achternaam</label>
                    <input type="text" class="big-input" name="last_name" value="{{ old('last_name') ?? '' }}">
                </div>
            </div>

            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <label>E-Mailadres</label>
                    <input type="email" class="big-input" name="email" value="{{ old('email') ?? '' }}">
                </div>
            </div>

            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <label>Wachtwoord</label>
                    <input type="password" class="big-input" name="password" value="{{ old('password') ?? '' }}">
                </div>
            </div>

            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <label>Herhaal Wachtwoord</label>
                    <input type="password" class="big-input" name="repeat_password" value="{{ old('repeat_password') ?? '' }}">
                </div>
            </div>

            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <label>Telefoonnummer</label>
                    <input type="tel" class="big-input" name="phone_number" value="{{ old('phone_number') ?? '' }}">
                </div>
            </div>

            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <label>Straatnaam</label>
                    <input type="text" class="big-input" name="street" value="{{ old('street') ?? '' }}">
                </div>
            </div>

            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <label>Huisnummer</label>
                    <input type="text" class="big-input" name="number" value="{{ old('number') ?? '' }}">
                </div>
            </div>

            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <label>Plaats</label>
                    <input type="text" class="big-input" name="city" value="{{ old('city') ?? '' }}">
                </div>
            </div>

            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <label>Postcode</label>
                    <input type="text" class="big-input" name="zipcode" value="{{ old('zipcode') ?? '' }}">
                </div>
            </div>

            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <label>Land</label>
                    <input type="text" class="big-input" value="{{ old('zipcode') ?? 'Nederland' }}" name="country">
                </div>
            </div>

            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <label>Facebook Link (optioneel)</label>
                    <input type="text" class="big-input" name="facebook_url" value="{{ old('facebook_url') ?? '' }}">
                </div>
            </div>

            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <label>Instagram Link (optioneel)</label>
                    <input type="text" class="big-input" name="instagram_url" value="{{ old('instagram_url') ?? '' }}">
                </div>
            </div>

            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <label>Twitter Link (optioneel)</label>
                    <input type="text" class="big-input" name="twitter_url" value="{{ old('twitter_url') ?? '' }}">
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-royal-blue btn-large margin-20px-top">Registreren</button>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 text-center margin-20px-top">
                    <p>
                        Heeft u al een account, klik dan <a href="/login"><u>hier</u></a>.
                    </p>
                </div>
            </div>
        </form>
    </div>
</section>

@endsection