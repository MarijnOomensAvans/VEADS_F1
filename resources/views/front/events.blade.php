@extends('front.master') 
@section('content')

<section class="cover-background background-position-top top-space width-80 margin-ten-left border-radius-event" style="background-image: url('{{ !empty(($header = getContent('event_header'))) ? '/image/' . $header->path . '/' . $header->name : '/images/homepage-9-parallax-img5.jpg' }}'); margin-top: 72px; visibility: visible; animation-name: fadeIn;">
    <div class="opacity-medium bg-light-blue"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 display-table page-title-large">
                <div class="display-table-cell vertical-align-middle text-center padding-30px-tb">
                    <h1 class="alt-font text-white font-weight-600 no-margin-bottom">{{ getContent('event_title')->content }}</h1>
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

<form action="/searchevents" method="POST" role="search">
    @csrf
    <div class="input-group" style="width: 50%; margin-left: 25%; border: 1px solid grey;">
        <input type="text" class="form-control" name="q"
               placeholder="Zoek evenementen" max="255"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
    </div>
</form>

<section class="hover-option4 blog-post-style3" style="visibility: visible; animation-name: fadeIn;">
    <div class="container">
        <div class="row equalize xs-equalize-auto">
            @foreach ($events as $event)
            <div class="grid-item col-md-4 col-sm-6 col-xs-12 margin-30px-bottom xs-text-center" style="visibility: visible; animation-name: fadeInUp; height: 542px;">
                <div class="blog-post bg-light-gray inner-match-height">
                    <div class="blog-post-images overflow-hidden position-relative">
                        <a href="/event/{{$event->id}}">
                                @if(count($event->pictures) > 0)
                                    <img src="/image/{{ $event->pictures[0]->path }}/{{ $event->pictures[0]->name }}" data-no-retina="">
                                @endif
                            </a>
                    </div>
                    <div class="post-details padding-40px-all sm-padding-20px-all">
                        <a href="/event/{{$event->id}}" class="alt-font post-title text-medium text-extra-dark-gray width-100 display-block md-width-100 margin-15px-bottom">{{$event->name}}</a>
                        <p>
                            {!! substr(strip_tags($event->description), 0, 100) !!}...
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="col-md-12 col-sm-12 col-xs-12 text-center margin-100px-top sm-margin-50px-top position-relative wow fadeInUp"
        style="visibility: visible; animation-name: fadeInUp;">
        <div class="pagination text-small text-uppercase text-extra-dark-gray">
            @if ($events->lastPage() > 1)
            <ul>
                <li class="{{ ($events->currentPage() == 1) ? ' disabled' : '' }}">
                    <a href="{{ $events->url(1) }}">
                    <i class="fas fa-long-arrow-alt-left margin-5px-right xs-display-none"></i>
                    Prev</a>
                </li>
                @for ($i = 1; $i
                <=$events->lastPage(); $i++)
                    <li class="{{ ($events->currentPage() == $i) ? ' active' : '' }}">
                        <a href="{{ $events->url($i) }}">{{ $i }}</a>
                    </li>
                    @endfor
                    <li class="{{ ($events->currentPage() == $events->lastPage()) ? ' disabled' : '' }}">
                        <a href="{{ $events->url($events->currentPage()+1) }}">
                            Next<i class="fas fa-long-arrow-alt-right margin-5px-left xs-display-none"></i>
                        </a>
                    </li>
            </ul>
            @endif
        </div>
    </div>
</section>
@endsection