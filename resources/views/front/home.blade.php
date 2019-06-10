@extends('front.master')
@section('content')
<!-- This section is the header -->
<section class="no-padding main-slider mobile-height top-space">
    <div class="swiper-full-screen swiper-container width-80 white-move border-radius-165px">
        <div class="cover-background height-400px" style="background-image:url('{{ !empty(($header = getContent('home_header'))) ? '/image/' . $header->path . '/' . $header->name : '/images/homepageheaderimage.jpg' }}');">
            <div class="opacity-extra-medium bg-light-blue"></div>
            <div class="slider-typography text-center">
                <div class="slider-text-middle-main" style="position: relative">
                    <div class="slider-text-middle">
                        <h1 class="alt-font text-uppercase text-white font-weight-700 width-75 xs-width-95 center-col margin-35px-bottom xs-margin-15px-bottom">{{ getContent('home_title')->content }}</h1>
                        <div class="donated" style="color: white;
    text-shadow: 0px 0px 2px rgba(0,0,0,0.5);
    position: absolute;
    right: 0%;
    bottom: 0%;
    border-radius: 100%;
    background: orange;
    width: 200px;
    height: 200px;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;">
                            <div class="donated-amount" style="font-size: 2.5em;">&euro;{{ number_format($donated, 0, ',', '.') }}</div>
                            gedoneerd!
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<section class="no-padding margin-70px-top">
    <div class="container">
        <div class="row">
            <div class="donated" style="text-align: center;
    font-size: 1.5em;
    line-height: 2.5em;">
                Er is in totaal
                <div class="donated-amount" style="font-size: 2.5em;">&euro;{{ number_format($donated, 2, ',', '.') }}</div>
                gedoneerd!
            </div>
        </div>
    </div>
</section>

@foreach($components as $component)
    @switch($component)
        @case('intro')
            @include('front.home.intro')
            @break

        @case('partners')
            @include('front.home.partners')
            @break

        @case('socialmedia')
            @include('front.home.socialmedia')
            @break

        @case('events')
            @include('front.home.events')
            @break

        @case('youtube')
            @include('front.home.youtube')
            @break

        @case('allpartners')
            @include('front.home.allpartners')
            @break
    @endswitch
@endforeach
@endsection
