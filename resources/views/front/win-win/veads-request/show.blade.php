@extends('front.master')

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 center-col text-center margin-40px-top margin-20px-bottom xs-margin-40px-bottom">
                    <div class="position-relative overflow-hidden width-100">
                        <span class="text-extra-large text-outside-line-full alt-font font-weight-800">{{ getContent('veads_request_title')->content }} {{ strtolower($request->title) }}</span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    {!! $request->description !!}
                </div>
            </div>

            <div class="row">
                {{-- Form --}}
                <div class="col-12 col-lg-6 md-margin-30px-bottom">
                    <div class="padding-fifteen-all bg-light-gray border-radius-6 lg-padding-seven-all sm-padding-30px-all h-100">
                       <span class="text-extra-dark-gray alt-font text-large font-weight-600 margin-25px-bottom" style="display: block;">
                           Vul uw gegevens in om te reageren op deze advertentie
                           <span class="fa fa-question-circle" style="margin-left: 20px;" data-toggle="tooltip" data-placement="top" title="Uw gegevens worden alleen gebruikt om contact met u op te kunnen nemen."></span>
                        </span>
                        <form action="/veads-zoekt/{{ $request->id }}" method="post">
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
                                <input type="text" name="first_name" placeholder="Voornaam *" class="border-radius-4 bg-white medium-input" value="{{ old('first_name') ?? Auth::user()->volunteer->first_name ?? '' }}">
                                <input type="text" name="last_name" placeholder="Achternaam *" class="border-radius-4 bg-white medium-input" value="{{ old('last_name') ?? Auth::user()->volunteer->last_name ?? '' }}">
                                <input type="text" name="email" placeholder="E-mailadres *" class="border-radius-4 bg-white medium-input" value="{{ old('email') ?? Auth::user()->email ?? '' }}">
                                <input type="tel" name="phone_number" placeholder="Telefoonnummer   " class="border-radius-4 bg-white medium-input" value="{{ old('phone_number') ?? Auth::user()->volunteer->phone_number ?? '' }}">

                                <textarea name="description" placeholder="Aanvullende informatie, bijvoorbeeld de staat van het product." class="border-radius-4 bg-white medium-input" rows="6"></textarea>

                                <button type="submit" class="btn btn-small border-radius-4 btn-dark-gray">
                                    Reageren
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- Message --}}
                <div class="col-12 col-lg-6 last-paragraph-no-margin">
                    <div class="padding-ten-all bg-light-gray border-radius-6 lg-padding-seven-all sm-padding-30px-all h-100 text-center text-lg-left">
                        <img src="{{ !empty(($header = getContent('veads_request_thanks_image'))) ? '/image/' . $header->path . '/' . $header->name : '/images/about-img1.jpg' }}" alt="" class="border-radius-6 margin-35px-bottom sm-margin-30px-bottom" data-no-retina="">
                        <span class="text-large font-weight-600 alt-font text-extra-dark-gray margin-5px-bottom d-block">Veads bedankt je!</span>
                        <p>
                            {!! getContent('veads_request_thanks_message')->content !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection