@extends('front.master')
@section('content')
    <section class="cover-background background-position-top top-space width-80 margin-ten-left border-radius-event" style="background-image: url('{{ !empty(($header = getContent('event_header'))) ? '/image/' . $header->path . '/' . $header->name : '/images/homepage-9-parallax-img5.jpg' }}'); margin-top: 72px; visibility: visible; animation-name: fadeIn;">
        <div class="opacity-medium bg-light-blue"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 display-table page-title-large">
                    <div class="display-table-cell vertical-align-middle text-center padding-30px-tb">
                        <h1 class="alt-font text-white font-weight-600 no-margin-bottom">
                            {{getContent('event_title')->content}}
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if((bool) getContent('event_show_breadcrumb')->content)
        <section class="padding-20px-tb border-bottom border-color-extra-light-gray" style="visibility: visible">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 display-table">
                        <div class="display-table-cell vertical-align-middle text-left">
                            <div class="breadcrumb alt-font text-small no-margin-bottom">
                                <ul>
                                    <li><a href="/" class="text-medium-gray">Home</a></li>
                                    <li><a href="/event" class="text-medium-gray">{{ getContent('event_title')->content }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if(!empty(strip_tags($intro = getContent('event_intro')->content)))
        <section class="padding-20px-tb border-bottom border-color-extra-light-gray" style="visibility: visible">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        {!! $intro !!}
                    </div>
                </div>
            </div>
        </section>
    @endif

    <form action="/searchevents" method="POST" role="search" style="display: flex; align-items: center;">
        @csrf
        <div class="input-group" style="width: 50%; margin-left: 25%; border: 1px solid grey;">
            <input type="text" class="form-control" name="q"
                   placeholder="Zoek evenementen" max="255"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
        </div>
        <span class="fa fa-question-circle" style="margin-left: 20px;" data-toggle="tooltip" data-placement="top" title="U kunt zoeken op de naam van het evenement of op tags van het evenement."></span>
    </form>

    <section class="timeline">
        <ul>
            @foreach($events as $event)
                @if(!empty($event->datetime) && $event->published && new DateTime($event->datetime->end) >  new DateTime())
                <li>
                    <a href="/event/{{$event->id}}">
                    <div>
                        <p>{{ $event->year() }}</p>
                        <h6>{{ $event->name }}</h6>
                        @if(count($event->pictures) > 0)
                            <img src="/image/{{ $event->pictures[0]->path }}/{{ $event->pictures[0]->name }}" data-no-retina="">
                        @endif
                    </div>
                    </a>
                </li>
                @endif
            @endforeach
        </ul>
    </section>

    <hr style="border-top: 1px dashed red;">

    <section class="timeline upper">
        <ul>
            @foreach($events as $event)
                @if(!empty($event->datetime) && $event->published && new DateTime($event->datetime->end) <  new DateTime())
                        <li>
                            <a href="/event/{{$event->id}}">
                                <div>
                                    <p>{{ $event->year() }}</p>
                                    <h6>{{ $event->name }}</h6>
                                    @if(count($event->pictures) > 0)
                                        <img src="/image/{{ $event->pictures[0]->path }}/{{ $event->pictures[0]->name }}" data-no-retina="">
                                    @endif
                                </div>
                            </a>
                        </li>
                @endif
            @endforeach
        </ul>
    </section>

@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/timeline.css') }}">
@endpush

@push('scripts')
    <script type="text/javascript" src="{{ asset('js/timeline.js') }}" defer>
@endpush
