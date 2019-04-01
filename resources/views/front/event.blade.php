@extends('front.master')

@php
$background_image = '/images/homepageheaderimage.jpg';

if (isset($event->pictures[0])) {
    $background_image = '/image/' . $event->pictures[0]->path . '/' . $event->pictures[0]->name;
}
@endphp

@section('content')

<section class="cover-background background-position-top top-space width-80 margin-ten-left border-radius-event" style="background-image: url('{{ $background_image }}'); margin-top: 72px; visibility: visible;">
    <div class="opacity-medium bg-light-blue"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 display-table page-title-large">
                <div class="display-table-cell vertical-align-middle text-center padding-30px-tb">
                    <h1 class="alt-font text-white font-weight-600 no-margin-bottom">{{$event->name}}</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Breadcrumbs -->
<section class="padding-20px-tb border-bottom border-color-extra-light-gray" style="visibility: visible">
    <div class="container">
        <div class="row">
            <div class="col-md-12 display-table">
                <div class="display-table-cell vertical-align-middle text-left">
                    <div class="breadcrumb alt-font text-small no-margin-bottom">
                        <ul>
                            <li><a href="/" class="text-medium-gray">Home</a></li>
                            <li><a href="/event" class="text-medium-gray">{{ getContent('event_title')->content }}</a></li>
                            <li class="text-medium-gray">{{$event->name}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <main class="col-md-9 col-sm-12 col-xs-12 right-sidebar sm-margin-60px-bottom xs-margin-40px-bottom no-padding-left sm-no-padding-right">
                <div class="col-md-12 col-sm-12 col-xs-12 blog-details-text last-paragraph-no-margin">
                    {{--
                    @if(count($event->pictures) > 0)
                        <img src="/image/{{ $event->pictures[0]->path }}/{{ $event->pictures[0]->name }}" class=" border-radius-100 width-100 margin-45px-bottom" data-no-retina="">
                    @endif
                    --}}

                    <p>
                        {!!$event->description!!}
                    </p>
                    <div class="row lightbox-gallery">
                    <div class="col-md-12 no-padding xs-padding-15px-lr">
                        <ul class="portfolio-grid work-3col hover-option4 gutter-medium" style="position: relative; height: 1250px;">
                            <li class="grid-sizer"></li>
                            @foreach($event->pictures as $picture)
                                <li class="grid-item web branding design fadeInUp" style="visibility: visible; animation-name: fadeInUp; position: absolute; left: 0%; top: 0px;">
                                    <a href="/image/{{ $picture->path }}/{{ $picture->name }}" title="Lightbox gallery image title...">
                                        <figure>
                                            <div class="portfolio-img bg-extra-dark-gray"><img src="/image/{{ $picture->path }}/{{ $picture->name }}" class="project-img-gallery" data-no-retina=""></div>
                                            <figcaption>
                                                <div class="portfolio-hover-main text-center">
                                                    <div class="portfolio-hover-box vertical-align-middle">
                                                        <div class="portfolio-hover-content position-relative">
                                                            <i class="ti-zoom-in text-white fa-2x"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                </div>
                {{-- <div class="col-md-12 col-sm-12 col-xs-12 margin-seven-bottom margin-eight-top">
                    <div class="divider-full bg-medium-light-gray"></div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 sm-text-center">
                    <div class="tag-cloud margin-20px-bottom">
                        <a>Tag1</a>
                        <a>Tag2</a>
                        <a>Tag3</a>
                        <a>Tag4</a>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 text-right sm-text-center">
                    <div class="social-icon-style-6">
                        <ul class="extra-small-icon">
                            <li><a class="likes-count" href="blog-standard-post.html#" target="_blank"><i class="fas fa-heart text-deep-pink"></i><span class="text-small">300</span></a></li>
                            <li><a class="facebook" href="http://facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a class="twitter" href="http://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            <li><a class="google" href="http://google.com" target="_blank"><i class="fab fa-google-plus-g"></i></a></li>
                            <li><a class="pinterest" href="http://dribbble.com" target="_blank"><i class="fab fa-pinterest-p"></i></a></li>
                        </ul>
                    </div>
                </div> --}}
            </main>
            <aside class="col-md-3 col-sm-12 col-xs-12 pull-right">
                <div class="margin-45px-bottom xs-margin-25px-bottom">
                    <div class="text-extra-dark-gray margin-20px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span>Informatie</span></div>
                    <ul class="list-style-6 margin-50px-bottom text-small">
                       <li><a>Datum Begin: </a><span>{{$event->datetime->start}}</span></li>
                        <li><a>Datum Eind: </a><span>{{$event->datetime->end}}</span></li>
                        <li><a>Prijs: </a><span>€{{$event->price}}</span></li>
                        <li>
                            <a>Locatie: </a>
                            <span>
                                {{$event->address->street}} {{$event->address->number}} {{$event->address->number_modifier}}
                                <br/>
                                {{$event->address->zipcode}} {{$event->address->city}} 
                            </span>
                        </li>
                    </ul>
                </div>
                {{-- <div class="margin-45px-bottom xs-margin-25px-bottom">
                    <div class="text-extra-dark-gray margin-25px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span>Inschrijven</span></div>
                    <div class="display-inline-block width-100">
                        <form>
                            <div class="position-relative">
                                <input type="text" class="bg-transparent text-small border-color-extra-light-gray medium-input pull-left" placeholder="naam">
                                <input type="text" class="bg-transparent text-small border-color-extra-light-gray medium-input pull-left" placeholder="e-mail">
                                <button class="btn btn-light-blue btn-small" type="submit">Inschrijven</button>
                            </div>
                        </form>
                    </div>
                </div> --}}
            </aside>
        </div>
    </div>
</section>
@endsection