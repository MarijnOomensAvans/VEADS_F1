@extends('front.master') 
@section('content')

<section class="wow fadeIn cover-background background-position-top top-space" style="background-image: url(&quot;/images/homepage-9-parallax-img5.jpg&quot;); margin-top: 72px; visibility: visible; animation-name: fadeIn;">
    <div class="opacity-medium bg-extra-dark-gray"></div>
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


<section class="wow fadeIn hover-option4 blog-post-style3" style="visibility: visible; animation-name: fadeIn;">
    <div class="container">
        <div class="row equalize xs-equalize-auto">
            @foreach ($events as $event)
                <div class="grid-item col-md-4 col-sm-6 col-xs-12 margin-30px-bottom xs-text-center wow fadeInUp" style="visibility: visible; animation-name: fadeInUp; height: 542px;">
                    <div class="blog-post bg-light-gray inner-match-height">
                        <div class="blog-post-images overflow-hidden position-relative">
                            <a href="/event/{{$event->id}}">
                                <img src="images/blog-img31.jpg" alt="" data-no-retina="">
                                <div class="blog-hover-icon"><span class="text-extra-large font-weight-300">+</span></div>
                            </a>
                        </div>
                        <div class="post-details padding-40px-all sm-padding-20px-all">
                            <a href="/event/{{$event->id}}" class="alt-font post-title text-medium text-extra-dark-gray width-100 display-block md-width-100 margin-15px-bottom">{{$event->name}}</a>
                            <p>
                                {{substr(strip_tags($event->description), 0, 100)}}...
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection