@extends('front.master') 
@section('content')

<section>
    <div class="container-fluid padding-five-lr">
        <div class="row">
            <div class="col-md-12 center-col text-center margin-40px-top margin-80px-bottom xs-margin-40px-bottom">
                <div class="position-relative overflow-hidden width-100">
                    <span class="text-extra-large text-outside-line-full alt-font font-weight-800">Ik help mee als vrijwilliger</span>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">

                {{-- Form --}}
                <div class="col-12 col-lg-6 md-margin-30px-bottom">
                    <div class="padding-fifteen-all bg-light-gray border-radius-6 lg-padding-seven-all sm-padding-30px-all h-100">

                        @guest
                            <div class="alert alert-warning alert-dismissable">
                                Heeft u al een account? Klik dan <a href='/login'>hier</a> om in te loggen.
                            </div>
                        @endguest
                        
                        <span class="text-extra-dark-gray alt-font text-large font-weight-600 margin-25px-bottom" style="display: block;">
                            Vul uw gegevens hieronder in.
                        </span>
                        <form id="contact-form" action="javascript:void(0)" method="post">
                            <div>
                                
                                {{-- Start Register Fields (need to split to blade file) --}}
                                <input type="text" name="first_name" placeholder="Voornaam *" class="border-radius-4 bg-white medium-input" value="{{ old('first_name') ?? Auth::user()->volunteer->first_name ?? '' }}">
                                <input type="text" name="last_name" placeholder="Achternaam *" class="border-radius-4 bg-white medium-input" value="{{ old('last_name') ?? Auth::user()->volunteer->last_name ?? '' }}">
                                <input type="text" name="email" placeholder="E-mailadres *" class="border-radius-4 bg-white medium-input" value="{{ old('email') ?? Auth::user()->email ?? '' }}">
                                
                                @guest
                                    <input type="password" name="password" placeholder="Wachtwoord *" class="border-radius-4 bg-white medium-input">
                                    <input type="password" name="repeat_password" placeholder="Herhaal Wachtwoord *" class="border-radius-4 bg-white medium-input">
                                @endguest

                                <input type="number" name="phone_number" placeholder="Telefoonnummer *" class="border-radius-4 bg-white medium-input" value="{{ old('phone_number') ?? Auth::user()->volunteer->phone_number ?? '' }}">
                                
                                <input type="text" name="street" placeholder="Straatnaam *" class="border-radius-4 bg-white medium-input" value="{{ old('street') ?? Auth::user()->volunteer->address->street ?? '' }}">
                                <input type="text" name="number" placeholder="Nummer *" class="border-radius-4 bg-white medium-input" value="{{ old('number') ?? Auth::user()->volunteer->address->number ?? '' }}">
                                <input type="text" name="city" placeholder="Plaats *" class="border-radius-4 bg-white medium-input" value="{{ old('city') ?? Auth::user()->volunteer->address->city ?? '' }}">
                                <input type="text" name="zipcode" placeholder="Postcode *" class="border-radius-4 bg-white medium-input" value="{{ old('zipcode') ?? Auth::user()->volunteer->address->zipcode ?? '' }}">
                                <input type="text" name="country" placeholder="Land *" class="border-radius-4 bg-white medium-input" value="{{ old('country') ?? Auth::user()->volunteer->address->country ?? '' }}">
                                {{-- End Register Fields --}}

                                {{-- Start Specific Fields --}}
                                <select name="event_id" class="border-radius-4 bg-white medium-input" style="height: 45px;text-indent: 12px;">
                                    <option selected disabled>Selecteer een evenement </option>
                                    @foreach($events as $event)
                                        <option value="{{$event->id}}">{{$event->name}}</option>
                                    @endforeach
                                </select>
                                {{-- End Specific Fields --}}

                                <button type="submit" class="btn btn-small border-radius-4 btn-dark-gray">
                                    Aanmelden
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- Message --}}
                <div class="col-12 col-lg-6 last-paragraph-no-margin">
                    <div class="padding-ten-all bg-light-gray border-radius-6 lg-padding-seven-all sm-padding-30px-all h-100 text-center text-lg-left">
                        <img src="images/about-img1.jpg" alt="" class="border-radius-6 margin-35px-bottom sm-margin-30px-bottom" data-no-retina="">
                        <span class="text-large font-weight-600 alt-font text-extra-dark-gray margin-5px-bottom d-block">Veads bedankt je!</span>
                        <p>
                            Top dat je wilt meehelpen bla bla bla bla...
                        </p>
                    </div>
                </div>

            </div>
        </div>


    </div>
</section>
@endsection

@push('styles')
    <style>
        .alert a{
            text-decoration: underline;
            color: hsla(50, 71%, 24%, 1);
            font-weight: 700;
        }
    </style>
@endpush