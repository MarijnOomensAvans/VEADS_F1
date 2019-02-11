@extends('front.master')

@section('content')

        <section class="wow fadeIn no-padding main-slider mobile-height top-space">
            <div class="swiper-full-screen swiper-container width-100 white-move">
                <div class="swiper-wrapper">
                    <!-- start slider item -->
                    <div class="swiper-slide cover-background" style="background-image:url('images/homepage-5-slider-img-3.jpg');">
                        <div class="opacity-extra-medium bg-extra-dark-gray"></div>
                        <div class="container position-relative one-fourth-screen xs-height-400px">
                            <div class="slider-typography text-center">
                                <div class="slider-text-middle-main">
                                    <div class="slider-text-middle">
                                        <span class="text-large text-very-light-gray font-weight-300 width-95 center-col margin-25px-bottom display-block xs-margin-15px-bottom">we combine design, thinking and technical craft</span>
                                        <h1 class="alt-font text-uppercase text-white font-weight-700 width-75 xs-width-95 center-col margin-35px-bottom xs-margin-15px-bottom">Crafting Digital Experiences</h1>
                                        <div class="btn-dual"><a href="https://themeforest.net/item/pofo-creative-agency-corporate-and-portfolio-multipurpose-template/20645944?ref=themezaa" target="_blank" class="btn btn-white btn-rounded btn-medium xs-margin-two-all">Purchase Now</a></div>
                                    </div>
                                </div>
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

        <section class="no-padding wow fadeIn">
            <div class="container-fluid no-padding">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <!-- start portfolio item -->
                        <div class="col-md-4 col-sm-4 col-xs-12 padding-5px-all grid-item feature-box-4 wow slideInDown">
                            <div class="position-relative overflow-hidden">
                                <figure>
                                    <img src="images/case-study-01.jpg" alt="" >
                                    <div class="opacity-medium bg-extra-dark-gray"></div>
                                    <figcaption>
                                        <span class="text-medium-gray margin-10px-bottom display-inline-block ">Rubber Studio</span>
                                        <div class="bg-deep-pink separator-line-horrizontal-full display-inline-block margin-10px-bottom"></div>
                                        <span class="text-extra-large display-block text-white alt-font margin-25px-bottom width-60 md-width-100 sm-width-100 sm-margin-seven-bottom xs-width-100">A Rich Heritage & Brand History</span>
                                        <a href="single-project-page-03.html" class="btn btn-very-small btn-white font-weight-300">view case study</a>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                        <!-- end portfolio item -->
                        <!-- start portfolio  item -->
                        <div class="col-md-4 col-sm-4 col-xs-12 padding-5px-all grid-item feature-box-4 wow slideInDown" data-wow-delay="0.2s">
                            <div class="position-relative overflow-hidden">
                                <figure>
                                    <img src="images/case-study-02.jpg" alt="" >
                                    <div class="opacity-medium bg-extra-dark-gray"></div>
                                    <figcaption>
                                        <span class="text-medium-gray margin-10px-bottom display-inline-block ">RedDot Media</span>
                                        <div class="bg-deep-pink separator-line-horrizontal-full display-inline-block margin-10px-bottom"></div>
                                        <span class="text-extra-large display-block text-white alt-font margin-25px-bottom width-60 md-width-100 sm-width-100 sm-margin-seven-bottom xs-width-100">Global Partners Increases Revenue</span>
                                        <a href="single-project-page-04.html" class="btn btn-very-small btn-white font-weight-300">view case study</a>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                        <!-- end portfolio item -->
                        <!-- start portfolio  item -->
                        <div class="col-md-4 col-sm-4 col-xs-12 padding-5px-all grid-item feature-box-4 wow slideInDown" data-wow-delay="0.4s">
                            <div class="position-relative overflow-hidden">
                                <figure>
                                    <img src="images/case-study-03.jpg" alt="" >
                                    <div class="opacity-medium bg-extra-dark-gray"></div>
                                    <figcaption>
                                        <span class="text-medium-gray margin-10px-bottom display-inline-block ">Third Eye Glasses</span>
                                        <div class="bg-deep-pink separator-line-horrizontal-full display-inline-block margin-10px-bottom"></div>
                                        <span class="text-extra-large display-block text-white alt-font margin-25px-bottom width-60 md-width-100 sm-width-100 sm-margin-seven-bottom xs-width-100">Improves Sales Efficiency with us</span>
                                        <a href="single-project-page-05.html" class="btn btn-very-small btn-white font-weight-300">view case study</a>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                        <!-- end portfolio item -->
                    </div>
                </div>
            </div>
        </section>
    
@endsection