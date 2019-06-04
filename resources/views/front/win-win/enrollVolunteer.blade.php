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
                        <form action="/inschrijvenvrijwilliger" method="post">
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


                            <div>
                                {{-- Start Register Fields (need to split to blade file) --}}
                                @if(!empty(Auth::user()->volunteer))

                                    <span>Voornaam*:</span>
                                    <input type="hidden" name="first_name" value="{{ Auth::user()->volunteer->first_name }}">
                                    <span>Achternaam*:</span>
                                    <input type="hidden" name="last_name" value="{{ Auth::user()->volunteer->last_name }}">
                                    <span>E-mailadres*:</span>
                                    <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                                    <span>Telefoonnummer*:</span>
                                    <input type="hidden" name="phone_number" value="{{ Auth::user()->volunteer->phone_number }}">
                                    <span>Straatnaam*:</span>
                                    <input type="hidden" name="street" value="{{ Auth::user()->volunteer->address->street }}">
                                    <span>Huisnummer*:</span>
                                    <input type="hidden" name="number" value="{{ Auth::user()->volunteer->address->number }}">
                                    <span>Plaats*:</span>
                                    <input type="hidden" name="city" value="{{ Auth::user()->volunteer->address->city }}">
                                    <span>Postcode*:</span>
                                    <input type="hidden" name="zipcode" value="{{ Auth::user()->volunteer->address->zipcode }}">
                                    <span>Land*:</span>
                                    <input type="hidden" name="country" value="{{ Auth::user()->volunteer->address->country }}">
                                @else
                                    <span>Voornaam*:</span>
                                    <input type="text" name="first_name" class="border-radius-4 bg-white medium-input" value="{{ old('first_name') ?? Auth::user()->volunteer->first_name ?? '' }}">
                                    <span>Achternaam*:</span>
                                    <input type="text" name="last_name" class="border-radius-4 bg-white medium-input" value="{{ old('last_name') ?? Auth::user()->volunteer->last_name ?? '' }}">
                                    <span>E-mailadres*:</span>
                                    <input type="text" name="email"  class="border-radius-4 bg-white medium-input" value="{{ old('email') ?? Auth::user()->email ?? '' }}">

                                    @guest
                                        <span>Wachtwoord*:</span>
                                        <input type="password" name="password" class="border-radius-4 bg-white medium-input">
                                        <span>Herhaal wachtwoord*:</span>
                                        <input type="password" name="repeat_password" class="border-radius-4 bg-white medium-input">
                                    @endguest

                                    <span>Telefoonnummer*:</span>
                                    <input type="tel" name="phone_number" class="border-radius-4 bg-white medium-input" value="{{ old('phone_number') ?? Auth::user()->volunteer->phone_number ?? '' }}">
                                    <span>Straatnaam*:</span>
                                    <input type="text" name="street" class="border-radius-4 bg-white medium-input" value="{{ old('street') ?? Auth::user()->volunteer->address->street ?? '' }}">
                                    <span>Huisnummer*:</span>
                                    <input type="text" name="number" class="border-radius-4 bg-white medium-input" value="{{ old('number') ?? Auth::user()->volunteer->address->number ?? '' }}">
                                    <span>Plaats*:</span>
                                    <input type="text" name="city" class="border-radius-4 bg-white medium-input" value="{{ old('city') ?? Auth::user()->volunteer->address->city ?? '' }}">
                                    <span>Postcode*:</span>
                                    <input type="text" name="zipcode" class="border-radius-4 bg-white medium-input" value="{{ old('zipcode') ?? Auth::user()->volunteer->address->zipcode ?? '' }}">
                                    <span>Land*:</span>
                                    <input type="text" name="country" class="border-radius-4 bg-white medium-input" value="{{ old('country') ?? Auth::user()->volunteer->address->country ?? '' }}">
                                @endif
                                {{-- End Register Fields --}}

                                {{-- Start Specific Fields --}}
                                <div style="display: flex; align-items: center; margin-bottom: 20px;">
                                    <select name="event_id" class="border-radius-4 bg-white medium-input" style="height: 45px;text-indent: 12px; margin-bottom: 0;">
                                        <option selected disabled>Selecteer een evenement:</option>
                                        @foreach($events as $event)
                                            <option value="{{$event->id}}" {{ $selectedevent == $event->id ? ' selected' : '' }}>{{$event->name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="fa fa-question-circle" style="margin-left: 20px;" data-toggle="tooltip" data-placement="top" title="Selecteer hier het evenement waarvoor u als vrijwilliger wilt inschrijven."></span>
                                </div>
                                {{-- End Specific Fields --}}

                                <button type="submit" class="btn btn-small border-radius-4 btn-dark-gray">
                                    Aanmelden
                                </button>
                            </div>
                            <br>
                            <span>* velden met een sterretje achter de naam van het invoerveld zijn verplicte velden</span>
                        </form>
                    </div>
                </div>

                {{-- Message --}}
                <div class="col-12 col-lg-6 last-paragraph-no-margin">
                    <div class="padding-ten-all bg-light-gray border-radius-6 lg-padding-seven-all sm-padding-30px-all h-100 text-center text-lg-left">
                        <img src="/images/about-img1.jpg" alt="" class="border-radius-6 margin-35px-bottom sm-margin-30px-bottom" data-no-retina="">
                        <span class="text-large font-weight-600 alt-font text-extra-dark-gray margin-5px-bottom d-block">Veads bedankt je!</span>
                        <p>
                            Top dat je wilt meehelpen.
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