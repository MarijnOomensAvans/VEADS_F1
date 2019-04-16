@extends('front.master')
@section('content')

    <section>
        <div class="container-fluid padding-five-lr">
            <div class="row">
                <div class="col-md-12 center-col text-center margin-40px-top margin-80px-bottom xs-margin-40px-bottom">
                    <div class="position-relative overflow-hidden width-100">
                        <span class="text-extra-large text-outside-line-full alt-font font-weight-800">Ik wil producten lenen of doneren</span>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">

                    {{-- Form --}}
                    <div class="col-12 col-lg-6 md-margin-30px-bottom">
                        <div class="padding-fifteen-all bg-light-gray border-radius-6 lg-padding-seven-all sm-padding-30px-all h-100">

                        <span class="text-extra-dark-gray alt-font text-large font-weight-600 margin-25px-bottom" style="display: block;">
                            Vul uw gegevens hieronder in.
                        </span>

                            @guest
                                <div class="alert alert-warning alert-dismissable">
                                    Of als u een account heeft, <a href='/login'>log in</a>. (Niet verplicht)
                                </div>
                            @endguest

                            <form action="/giveproducts" method="post">
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
                                    <input type="text" name="first_name" placeholder="Voornaam" class="border-radius-4 bg-white medium-input" value="{{ old('first_name') ?? Auth::user()->volunteer->first_name ?? '' }}">
                                    <input type="text" name="last_name" placeholder="Achternaam" class="border-radius-4 bg-white medium-input" value="{{ old('last_name') ?? Auth::user()->volunteer->last_name ?? '' }}">
                                    <input type="text" name="email" placeholder="E-mailadres" class="border-radius-4 bg-white medium-input" value="{{ old('email') ?? Auth::user()->email ?? '' }}">

                                    <select name="donationchoice" class="border-radius-4 bg-white medium-input" style="height: 45px;text-indent: 12px;">
                                        <option selected value="">Uitlenen</option>
                                            <option>Doneren</option>
                                    </select>
                                </div>
                        </div>
                    </div>

                    {{-- Message --}}
                    <div class="col-12 col-lg-6 last-paragraph-no-margin">
                        <div class="padding-ten-all bg-light-gray border-radius-6 lg-padding-seven-all sm-padding-30px-all h-100 text-center text-lg-left">

                            <span class="text-extra-dark-gray alt-font text-large font-weight-600 margin-25px-bottom" style="display: block;">
                            Vul hier de gegevens van het product in.
                            </span>

                            <input type="text" name="product_name" placeholder="Product(en) naam" class="border-radius-4 bg-white medium-input">

                            <textarea name="product_name" placeholder="Opmerkingen/omschrijving" class="border-radius-4 bg-white medium-input"></textarea>

                            <input type="number" min="1" value="1">

                            <small>U kunt producten doneren of uitlenen aan één specifiek evenement of aan VEADS.</small>
                            <select name="event_id" class="border-radius-4 bg-white medium-input" style="height: 45px;text-indent: 12px;">
                                <option selected value="">VEADS</option>
                                @foreach($events as $event)
                                    <option value="{{$event->id}}">{{$event->name}}</option>
                                @endforeach
                            </select>

                            <button type="submit" class="btn btn-small border-radius-4 btn-dark-gray">
                                Bevestigen
                            </button>
                            </form>
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