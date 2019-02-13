@extends('front.master')

@section('content')

        <section class="no-padding main-slider mobile-height top-space">
            <div class="swiper-full-screen swiper-container width-80 white-move">
                    <!-- start slider item -->
                    <div class="cover-background height-400px" style="background-image:url('images/homepageheaderimage.jpg');">
                      <div class="opacity-medium bg-light-blue"></div>
                        <div class="opacity-extra-medium bg-extra-dark-gray"></div>
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

        <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <!-- start portfolio item -->
                        <div class="col-md-4 col-sm-4 col-xs-12 padding-5px-all grid-item feature-box-4">
                            <div class="position-relative overflow-hidden border-radius-100">
                                <figure>
                                    <img src="images/case-study-01.jpg" alt="" >
                                    <div class="opacity-medium bg-extra-dark-gray"></div>
                                    <figcaption>
                                        <span class="text-extra-large display-block text-white alt-font margin-hon-left margin-hon-bottom width-60 md-width-100 sm-width-100 sm-margin-seven-bottom xs-width-100">Veads</span>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                        <!-- end portfolio item -->
                        <!-- start portfolio  item -->
                        <div class="col-md-4 col-sm-4 col-xs-12 padding-5px-all grid-item feature-box-4" data-wow-delay="0.2s">
                            <div class="position-relative overflow-hidden border-radius-100">
                                <figure>
                                    <img src="images/case-study-02.jpg" alt="" >
                                    <div class="opacity-medium bg-extra-dark-gray"></div>
                                    <figcaption>
                                        <span class="text-extra-large display-block text-white alt-font margin-200px-left margin-200px-bottom width-60 md-width-100 sm-width-100 sm-margin-seven-bottom xs-width-100">Modoll</span>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                        <!-- end portfolio item -->
                        <!-- start portfolio  item -->
                        <div class="col-md-4 col-sm-4 col-xs-12 padding-5px-all grid-item feature-box-4" data-wow-delay="0.4s">
                            <div class="position-relative overflow-hidden border-radius-100">
                                <figure>
                                    <img src="images/case-study-03.jpg" alt="" >
                                    <div class="opacity-medium bg-extra-dark-gray"></div>
                                    <figcaption>
                                        <span class="text-extra-large display-block text-white alt-font margin-200px-left margin-200px-bottom width-60 md-width-100 sm-width-100 sm-margin-seven-bottom xs-width-100">Dollcare</span>
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
