@extends('front.master')
@section('content')

<section class="cover-background background-position-top top-space width-80 margin-ten-left border-radius-event" style="background-image: url(&quot;/images/homepage-9-parallax-img5.jpg&quot;); margin-top: 72px; visibility: visible; animation-name: fadeIn;">
    <div class="opacity-medium bg-light-blue"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 display-table page-title-large">
                <div class="display-table-cell vertical-align-middle text-center padding-30px-tb">
                    <h1 class="alt-font text-white font-weight-600 no-margin-bottom">Evenementen</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="padding-20px-tb border-bottom border-color-extra-light-gray" style="visibility: visible">
    <div class="container">
        <div class="row">
            <div class="col-md-12 display-table">
                <div class="display-table-cell vertical-align-middle text-left">
                    <div class="breadcrumb alt-font text-small no-margin-bottom">
                        <ul>
                            <li><a href="/" class="text-medium-gray">Home</a></li>
                            <li><a href="/event" class="text-medium-gray">Evenementen</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


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
                                <div class="blog-hover-icon"><span class="text-extra-large font-weight-300">+</span></div>
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
</section>
@endsection