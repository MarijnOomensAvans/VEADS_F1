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
                    </div>
                </div>
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
