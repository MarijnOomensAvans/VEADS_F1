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

            <div class="col-md-2">
                <p style="padding-top: 5px">Inloggen</p>
                <p>Selecteer evenement</p>
            </div>

            <div class="col-md-4">
                <a href="/login"><button id="project-contact-us-button" type="submit" class="btn btn-royal-blue btn-medium">Inloggen</button></a>
            </div>

            <hr />

            <div class="col-md-4">
                <select>
                    @if (count($events) > 0)
                        @foreach ($events as $event)
                            <option value="{{$event->name}}">{{$event->name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>


        </div>
    </section>
@endsection