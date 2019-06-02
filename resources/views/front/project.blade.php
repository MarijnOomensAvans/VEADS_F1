@extends('front.master')
@section('content')

<section class="cover-background background-position-top top-space width-80 margin-ten-left border-radius-event" style="background-image: url('{{ !empty(($header = getContent('projects_header'))) ? '/image/' . $header->path . '/' . $header->name : '/images/homepage-9-parallax-img5.jpg' }}'); margin-top: 72px; visibility: visible;">
    <div class="opacity-medium bg-light-blue"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 display-table page-title-large">
                <div class="display-table-cell vertical-align-middle text-center padding-30px-tb">
                    <h1 class="alt-font text-white font-weight-600 no-margin-bottom">{{$project->name}}</h1>
                </div>
            </div>
        </div>
    </div>
</section>

@if((bool) getContent('projects_show_breadcrumb')->content)
<section class="padding-20px-tb border-bottom border-color-extra-light-gray" style="visibility: visible">
    <div class="container">
        <div class="row">
            <div class="col-md-12 display-table">
                <div class="display-table-cell vertical-align-middle text-left">
                    <div class="breadcrumb alt-font text-small no-margin-bottom">
                        <ul>
                            <li><a href="/" class="text-medium-gray">Home</a></li>
                            <li><a href="/project" class="text-medium-gray">Projecten</a></li>
                            <li class="text-medium-gray">{{$project->name}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<section>
    <div class="container">
        <div class="row">
            <main class="col-md-9 col-sm-12 col-xs-12 right-sidebar sm-margin-60px-bottom xs-margin-40px-bottom no-padding-left sm-no-padding-right">
                <div class="col-md-12 col-sm-12 col-xs-12 blog-details-text last-paragraph-no-margin">

                    @if(is_array($project->pictures) && count($project->pictures) > 0)
                        <img src="/image/{{ $project->pictures[0]->path }}/{{ $project->pictures[0]->name }}" class=" border-radius-100 width-100 margin-45px-bottom" data-no-retina="">
                    @endif

                    @if(!empty($project->description))
                    <p>
                        {!!$project->description!!}
                    </p>
                    @endif
                    <div class="row lightbox-gallery">
                        <div class="col-md-12 no-padding xs-padding-15px-lr">
                            <ul class="portfolio-grid work-3col hover-option4 gutter-medium" style="position: relative; height: 1250px;">
                                <li class="grid-sizer"></li>
                                @foreach($project->pictures as $picture)
                                    <li class="grid-item web branding design fadeInUp" style="visibility: visible; animation-name: fadeInUp; position: absolute; left: 0%; top: 0px;">
                                        <a href="/image/{{ $picture->path }}/{{ $picture->name }}" title="{{ $picture->name }}">
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

                    @if($project->events()->where('published', 1)->count() > 0)
                    <div class="row equalize xs-equalize-auto">
                        @foreach ($project->events()->where('published', 1)->get() as $event)
                            <div class="blog-post-style5 grid-item col-md-4 col-sm-6 col-xs-12 margin-30px-bottom xs-text-center" style="visibility: visible; animation-name: fadeInUp; height: 542px;">
                                <div class="blog-post bg-light-gray inner-match-height">
                                    <div class="blog-post-images overflow-hidden position-relative">
                                        <a href="/event/{{$event->id}}">
                                            @if(count($event->pictures) > 0)
                                                <img src="/image/{{ $event->pictures[0]->path }}/{{ $event->pictures[0]->name }}" data-no-retina="">
                                            @endif
                                        </a>
                                        @if(new DateTime($event->datetime->end) <  new DateTime())
                                            <div class="blog-categories text-uppercase text-extra-small alt-font" style="background: #EA5B5B; color: white;">
                                                Verlopen
                                            </div>
                                        @endif
                                    </div>
                                    <div class="post-details padding-40px-all sm-padding-20px-all">
                                        <a href="/event/{{$event->id}}" class="alt-font post-title text-medium text-extra-dark-gray width-100 display-block md-width-100 margin-15px-bottom">{{$event->name}}</a>
                                        <p>
                                            {!! substr(strip_tags($event->description), 0, 100) !!}...
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif

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

            @if(!empty($project->address))
            <aside class="col-md-3 col-sm-12 col-xs-12 pull-right">
                <div class="margin-45px-bottom xs-margin-25px-bottom">
                    <div class="text-extra-dark-gray margin-20px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span>Informatie</span></div>
                    <ul class="list-style-6 margin-50px-bottom text-small">
                        <li>
                            <a>Locatie: </a>
                            <span>
                                {{$project->address->street}} {{$project->address->number}} {{$project->address->number_modifier}}
                                <br/>
                                {{$project->address->zipcode}} {{$project->address->city}}
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
            @endif
        </div>
    </div>
</section>
@endsection
