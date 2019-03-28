@extends('front.master')
@section('content')

    <section class="wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
        <div class="container-fluid padding-five-lr">
            <div class="row">
                <div class="col-md-7 col-sm-12 col-xs-12 center-col text-center margin-100px-bottom xs-margin-40px-bottom">
                    <div class="position-relative overflow-hidden width-100">
                        <span class="text-extra-large text-outside-line-full alt-font font-weight-800">Ik help mee als vrijwilliger</span>
                    </div>
                </div>
            </div>

            <section>
                <div class="container">
                    <div class="row">
                        <main class="col-md-9 col-sm-12 col-xs-12 right-sidebar sm-margin-60px-bottom xs-margin-40px-bottom no-padding-left sm-no-padding-right">
                            <div class="col-md-12 col-sm-12 col-xs-12 blog-details-text last-paragraph-no-margin">


                                    @if (is_null($user))
                                        <p style="padding-top: 5px">Inloggen
                                        <a href="/login"><button id="project-contact-us-button" type="submit" class="btn btn-royal-blue btn-medium" style="margin-left: 200px">Inloggen</button></a></p>
                                    @endif

                                <p>Selecteer evenement
                                    <select style="width: 400px; margin-left: 123px">
                                        @if (count($events) > 0)
                                            @foreach ($events as $event)
                                                <option value="{{$event->name}}">{{$event->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </p>

                                <div class="row lightbox-gallery">
                                    <div class="col-md-12 no-padding xs-padding-15px-lr">
                                        <ul class="portfolio-grid work-3col hover-option4 gutter-medium" style="position: relative; height: 0px;">
                                            <li class="grid-sizer"></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </main>
                        <aside class="col-md-3 col-sm-12 col-xs-12 pull-right">
                            <div class="margin-45px-bottom xs-margin-25px-bottom">
                                <div class="text-extra-dark-gray margin-20px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span>Account informatie</span></div>

                                @if (!is_null($user))
                                  <ul class="list-style-6 margin-50px-bottom text-small">
                                      <li><a>Naam: </a><span>{{$user->name}}</span></li>
                                </ul>

                                    @else
                                    <ul class="list-style-6 margin-50px-bottom text-small">
                                        <li><a>U bent nog niet ingelogd</a></li>
                                    </ul>
                                @endif
                            </div>
                        </aside>

                    </div>
                </div>
            </section>


        </div>
    </section>
@endsection