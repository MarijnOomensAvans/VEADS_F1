@if (count($socialPosts) > 0)
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
                            @foreach($socialPosts as $post)
                                <div class="swiper-slide col-md-4 col-sm-4 col-xs-12 blog-post-style5 last-paragraph-no-margin" style="height: 100%">
                                    <div class="blog-post bg-white box-shadow-light" style="border-radius: 20px;">
                                        <div class="blog-post-images overflow-hidden">
                                            <a href="{{$post->url}}" target="_blank">
                                                <img src="{{$post->image_url}}">
                                            </a>

                                            <div class="blog-categories bg-white text-uppercase text-extra-small alt-font">

                                                <a href="{{$post->url}}">
                                                    @if ($post instanceof App\FacebookPost)
                                                        Facebook
                                                    @endif
                                                    @if ($post instanceof App\InstagramPost)
                                                        Instagram
                                                    @endif
                                                </a>
                                            </div>
                                        </div>
                                        <div class="post-details inner-match-height padding-40px-all xs-padding-20px-lr xs-padding-30px-tb">
                                            <div class="blog-hover-color"></div>
                                            @if ($post->message)
                                                <a href="{{$post->url}}" target="_blank" class="alt-font post-title text-medium text-extra-dark-gray width-90 display-block md-width-100 margin-5px-bottom cut-text">{{$post->message}}</a>
                                            @endif
                                            <div class="author">
                                                <span class="text-medium-gray text-uppercase text-extra-small display-inline-block">{{$post->page->name}}</span>
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