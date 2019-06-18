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
