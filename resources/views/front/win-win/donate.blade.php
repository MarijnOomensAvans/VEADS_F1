@extends('front.master') 
@section('content')

<section>
    <div class="container-fluid padding-five-lr">
        <div class="row">
            <div class="col-md-12 center-col text-center margin-40px-top margin-80px-bottom xs-margin-40px-bottom">
                <div class="position-relative overflow-hidden width-100">
                    <span class="text-extra-large text-outside-line-full alt-font font-weight-800">Ik wil graag geld doneren</span>
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
                        <form action="/doneren" method="post">
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
                                <input type="text" name="first_name" placeholder="Voornaam" class="border-radius-4 bg-white medium-input" value="{{ old('first_name', $volunteer->first_name ?? '') }}">
                                <input type="text" name="last_name" placeholder="Achternaam" class="border-radius-4 bg-white medium-input" value="{{ old('last_name', $volunteer->last_name ?? '') }}">
                                <input type="text" name="email" placeholder="E-mailadres" class="border-radius-4 bg-white medium-input" value="{{ old('email', $volunteer->user->email ?? '') }}">

                                <small>U kunt geld doneren aan één specifiek evenement of aan VEADS.</small>
                                <select name="event_id" class="border-radius-4 bg-white medium-input" style="height: 45px;text-indent: 12px;">
                                    <option selected value="">VEADS</option>
                                    @foreach($events as $event)
                                        <option value="{{$event->id}}">{{$event->name}}</option>
                                    @endforeach
                                </select>

                                <input type="number" step="0.01" min="0" name="amount" placeholder="Bedrag" class="border-radius-4 bg-white medium-input" value="{{ old('amount') }}">

                                <div class="checkbox margin-20px-bottom">
                                    <label>
                                        <input type="checkbox" name="anonymous" value="1" /> Ik wil graag anoniem doneren
                                    </label>
                                </div>

                                <button type="submit" class="btn btn-small border-radius-4 btn-dark-gray">
                                    Doneren
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
                            Top dat je geld wil doneren.
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