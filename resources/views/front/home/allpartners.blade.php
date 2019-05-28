@if(count($allpartners) > 0)
    <div class="container">

        <div class="row margin-10px-top">
            <div class="col-md-7 col-sm-12 col-xs-12 center-col text-center margin-100px-bottom xs-margin-40px-bottom">
                <div class="position-relative overflow-hidden width-100">
                    <span class="text-small text-outside-line-full alt-font font-weight-600 text-uppercase">Onze partners</span>
                </div>
            </div>
        </div>

        <div class="row position-relative">
            <div class="row position-relative">
                <div class="swiper-container swiper-pagination-bottom black-move blog-slider swiper-three-slides">
                    <div class="swiper-wrapper">
                        @foreach($allpartners as $allpartner)
                            <div class="swiper-slide col-md-4 col-sm-4 col-xs-12 blog-post-style5 last-paragraph-no-margin" style="height: 100%">
                                <div class="blog-post  bg-light-gray box-shadow-light" style="border-radius: 20px;">
                                    <div class="blog-post-images overflow-hidden">
                                        <a href="{{$allpartner->link}}" target="_blank">
                                            <img src="/image/{{ $allpartner->picture->path }}/{{ $allpartner->picture->name }}">
                                        </a>
                                    </div>
                                    <div class="post-details inner-match-height padding-40px-all xs-padding-20px-lr xs-padding-30px-tb">
                                        <div class="blog-hover-color"></div>
                                        <a href="{{$allpartner->link}}" target="_blank" class="alt-font post-title text-medium text-extra-dark-gray width-90 display-block md-width-100 margin-5px-bottom cut-text">{{$allpartner->name}}</a>
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
@endif

@push('styles')
    <style>
        .cut-text{
            text-overflow: ellipsis;
            overflow: hidden;
            width: 100%;
            height: 1.2em;
            white-space: nowrap;
        }
    </style>
@endpush