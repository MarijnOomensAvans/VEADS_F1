@if (count($partners) > 0 && ((bool) getContent('home_show_partners')->content))
    <section class="no-padding margin-70px-top">
        <div class="container">
            <div class="row equalize xs-equalize-auto">
                @foreach ($partners as $partner)
                    <div class="grid-item col-md-4 col-sm-6 col-xs-12 margin-30px-bottom xs-text-center" style="visibility: visible; animation-name: fadeInUp; height: 542px;">
                        <div class="blog-post bg-light-gray border-radius-10">
                            <div class="blog-post-images overflow-hidden position-relative border-radius-10">
                                <a href="{{$partner->link}}" target="_blank">
                                    <div class="opacity-medium bg-dark-gray"></div>
                                    <img class="img-fluid width-360px height-350px" src="/image/{{ $partner->picture->path }}/{{ $partner->picture->name }}">
                                </a>
                            </div>
                            <div class="carousel-caption margin-fifteen-bottom">
                                <a href="{{$partner->link}}"  target="_blank" class="alt-font post-title text-large text-white width-100 display-block md-width-100 margin-15px-bottom">{{$partner->name}}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
