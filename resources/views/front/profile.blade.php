@extends('front.master')
@section('content')
    
    <section>
    <div class="container-fluid padding-five-lr">

            <div class="row">

                {{-- Form --}}
                <div class="col-12 col-lg-offset-3 col-lg-6 md-margin-30px-bottom">
                    <div class="padding-fifteen-all bg-light-gray border-radius-6 lg-padding-seven-all sm-padding-30px-all h-100">
                        
                        <span class="text-extra-dark-gray alt-font text-large font-weight-600 margin-25px-bottom" style="display: block;">
                            Account Gegevens
                        </span>
                        <form action="/profile" method="post">
                            @csrf

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if(!empty($success))
                                <div class="alert alert-success">
                                    Uw gegevens zijn opgeslagen.
                                </div>
                            @endif

                            <div>
                                {{-- Start Register Fields (need to split to blade file) --}}
                                <input type="text" name="first_name" placeholder="Voornaam *" class="border-radius-4 bg-white medium-input" value="{{ old('first_name') ?? Auth::user()->volunteer->first_name ?? '' }}">
                                <input type="text" name="last_name" placeholder="Achternaam *" class="border-radius-4 bg-white medium-input" value="{{ old('last_name') ?? Auth::user()->volunteer->last_name ?? '' }}">
                                <input type="text" name="email" placeholder="E-mailadres *" class="border-radius-4 bg-white medium-input" value="{{ Auth::user()->email }}" readonly>
                                
                                @guest
                                    <input type="password" name="password" placeholder="Wachtwoord *" class="border-radius-4 bg-white medium-input">
                                    <input type="password" name="repeat_password" placeholder="Herhaal Wachtwoord *" class="border-radius-4 bg-white medium-input">
                                @endguest

                                <input type="tel" name="phone_number" placeholder="Telefoonnummer *" class="border-radius-4 bg-white medium-input" value="{{ old('phone_number') ?? Auth::user()->volunteer->phone_number ?? '' }}">
                                
                                <input type="text" name="street" placeholder="Straatnaam *" class="border-radius-4 bg-white medium-input" value="{{ old('street') ?? Auth::user()->volunteer->address->street ?? '' }}">
                                <input type="text" name="number" placeholder="Nummer *" class="border-radius-4 bg-white medium-input" value="{{ old('number') ?? Auth::user()->volunteer->address->number ?? '' }}">
                                <input type="text" name="city" placeholder="Plaats *" class="border-radius-4 bg-white medium-input" value="{{ old('city') ?? Auth::user()->volunteer->address->city ?? '' }}">
                                <input type="text" name="zipcode" placeholder="Postcode *" class="border-radius-4 bg-white medium-input" value="{{ old('zipcode') ?? Auth::user()->volunteer->address->zipcode ?? '' }}">
                                <input type="text" name="country" placeholder="Land *" class="border-radius-4 bg-white medium-input" value="{{ old('country') ?? Auth::user()->volunteer->address->country ?? '' }}">

                                <input type="text" name="facebook_url" placeholder="Facebook Link (optioneel)" class="border-radius-4 bg-white medium-input" value="{{ old('facebook_url') ?? Auth::user()->volunteer->facebook_url ?? '' }}">
                                <input type="text" name="instagram_url" placeholder="Instagram Link (optioneel)" class="border-radius-4 bg-white medium-input" value="{{ old('instagram_url') ?? Auth::user()->volunteer->instagram_url ?? '' }}">
                                <input type="text" name="twitter_url" placeholder="Twitter Link (optioneel)" class="border-radius-4 bg-white medium-input" value="{{ old('twitter_url') ?? Auth::user()->volunteer->twitter_url ?? '' }}">
                                {{-- End Register Fields --}}

                                <button type="submit" class="btn btn-small border-radius-4 btn-dark-gray">
                                    Opslaan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>


    </div>
</section>

@endsection

@push('styles')
    <style>
        
    </style>
@endpush