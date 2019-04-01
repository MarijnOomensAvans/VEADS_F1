@extends('front.master')
@section('content')

<!-- This section is the header -->
<section class="no-padding main-slider mobile-height top-space">
    <div class="swiper-full-screen swiper-container width-80 white-move border-radius-165px">
        <div class="cover-background height-400px" style="background-image:url('images/homepageheaderimage.jpg');">
            <div class="opacity-extra-medium bg-light-blue"></div>
            <div class="slider-typography text-center">
                <div class="slider-text-middle-main">
                    <div class="slider-text-middle">
                        <h1 class="alt-font text-uppercase text-white font-weight-700 width-75 xs-width-95 center-col margin-35px-bottom xs-margin-15px-bottom">VEADS</h1>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination swiper-pagination-white swiper-full-screen-pagination"></div>
        <div class="swiper-button-next swiper-button-black-highlight display-none"></div>
        <div class="swiper-button-prev swiper-button-black-highlight display-none"></div>
    </div>
</section>

<!-- This section is the cards -->
@if (count($partners) > 0)
<section>
    <div class="container">
        <div class="row equalize xs-equalize-auto">
            @foreach ($partners as $partner)
            <div class="grid-item col-md-4 col-sm-6 col-xs-12 margin-30px-bottom xs-text-center" style="visibility: visible; animation-name: fadeInUp; height: 542px;">
                <div class="blog-post bg-light-gray inner-match-height border-radius-10">
                    <div class="blog-post-images overflow-hidden position-relative border-radius-10 height-100">
                        <a href="{{$partner->link}}">
                          <div class="opacity-medium bg-dark-gray"></div>
                          <img class="img-fluid width-100 height-100" src="/image/{{ $partner->picture->path }}/{{ $partner->picture->name }}">
                        </a>
                    </div>
                    <div class="carousel-caption margin-fifteen-bottom">
                        <a href="{{$partner->link}}" class="alt-font post-title text-large text-white width-100 display-block md-width-100 margin-15px-bottom">{{$partner->name}}</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!--
Start video
<section>
  <div>
<iframe width="50%" height="315" src="https://www.youtube.com/embed/qpDNXX1Gm-Y" frameborder="0" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>
</section>
-->

 <section class="bg-light-gray">
    <div class="container">

        <div class="row">
            <div class="col-md-7 col-sm-12 col-xs-12 center-col text-center margin-100px-bottom xs-margin-40px-bottom">
                <div class="position-relative overflow-hidden width-100">
                    <span class="text-small text-outside-line-full alt-font font-weight-600 text-uppercase">Social media feed</span>
                </div>
            </div>
        </div>

        <div class="row position-relative">
            <div class="row position-relative">
                <div class="swiper-container swiper-pagination-bottom black-move blog-slider swiper-three-slides">
                    <div class="swiper-wrapper">

                        @foreach([1, 2, 3, 4, 5] as $i)

                            <div class="swiper-slide col-md-4 col-sm-4 col-xs-12 blog-post-style5 last-paragraph-no-margin">
                                <div class="blog-post bg-white box-shadow-light"  style="border-radius: 20px">
                                    <div class="blog-post-images overflow-hidden">
                                        <a href="#">
                                            @if($i == 3)
                                                <img src="images/placeholder/facebook-placeholder.png">
                                            @elseif($i == 5)
                                                <img src="images/placeholder/instagram-placeholder.png">
                                            @else
                                                <img src="images/blog-img6.jpg">
                                            @endif
                                        </a>
                                            
                                        <div class="blog-categories bg-white text-uppercase text-extra-small alt-font">
                                            @if($i == 3)
                                                <a href="#">Facebook</a>
                                            @else
                                                <a href="#">Instagram</a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="post-details inner-match-height padding-40px-all xs-padding-20px-lr xs-padding-30px-tb">
                                        <div class="blog-hover-color"></div>
                                        <a href="#" class="alt-font post-title text-medium text-extra-dark-gray width-90 display-block md-width-100 margin-5px-bottom">OMG, dit heb je heel mooi gemaakt 🤗😍</a>
                                        <div class="author">
                                            <span class="text-medium-gray text-uppercase text-extra-small display-inline-block">door <a href="#" class="text-medium-gray">MODAL</a>&nbsp;&nbsp;|&nbsp;&nbsp;20 April 2019</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                        

                    </div>                        
                    <div class="swiper-pagination swiper-pagination-three-slides height-auto"></div>
                </div>
            </div>
        </div>
    </div>
</section> 

@if (count($events) > 0)
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-sm-12 col-xs-12 center-col text-center margin-100px-bottom xs-margin-40px-bottom">
                <div class="position-relative overflow-hidden width-100">
                    <span class="text-small text-outside-line-full alt-font font-weight-600 text-uppercase">Evenementen</span>
                </div>
            </div>
        </div>
        <div class="row equalize xs-equalize-auto">
            @foreach ($events as $event)
            <div class="grid-item col-md-4 col-sm-6 col-xs-12 margin-30px-bottom xs-text-center" style="visibility: visible; animation-name: fadeInUp; height: 542px;">
                <div class="blog-post bg-light-gray inner-match-height">
                    <div class="blog-post-images overflow-hidden position-relative">
                        <a href="/event/{{$event->id}}">
                                @if(count($event->pictures) > 0)
                                    <img src="/image/{{ $event->pictures[0]->path }}/{{ $event->pictures[0]->name }}">
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
</section>
@endif
@endsection
