@extends('front.master')

@section('content')

        <!-- This section is the header -->
        <section class="no-padding main-slider mobile-height top-space">
            <div class="swiper-full-screen swiper-container width-80 white-move">
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
        <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">

                        <!-- start card 1 -->
                        <div class="col-md-4 col-sm-4 col-xs-12 padding-5px-all grid-item feature-box-4">
                            <div class="position-relative overflow-hidden border-radius-100">
                                <figure>
                                    <img src="images/case-study-01.jpg" alt="" >
                                    <div class="opacity-medium bg-extra-dark-gray"></div>
                                    <figcaption>
                                        <span class="text-extra-large display-block text-white alt-font margin-25px-bottom width-60 md-width-100 sm-width-100 sm-margin-seven-bottom xs-width-100">Veads</span>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                        <!-- end card 1 -->

                        <!-- start card  2 -->
                        <div class="col-md-4 col-sm-4 col-xs-12 padding-5px-all grid-item feature-box-4" data-wow-delay="0.2s">
                            <div class="position-relative overflow-hidden border-radius-100">
                                <figure>
                                    <img src="images/case-study-02.jpg" alt="" >
                                    <div class="opacity-medium bg-extra-dark-gray"></div>
                                    <figcaption>
                                        <span class="text-extra-large display-block text-white alt-font margin-25px-bottom width-60 md-width-100 sm-width-100 sm-margin-seven-bottom xs-width-100">Modoll</span>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                        <!-- end card 2 -->

                        <!-- start card 3 -->
                        <div class="col-md-4 col-sm-4 col-xs-12 padding-5px-all grid-item feature-box-4" data-wow-delay="0.4s">
                            <div class="position-relative overflow-hidden border-radius-100">
                                <figure>
                                    <img src="images/case-study-03.jpg" alt="" >
                                    <div class="opacity-medium bg-extra-dark-gray"></div>
                                    <figcaption>
                                        <span class="text-extra-large display-block text-white alt-font margin-25px-bottom width-60 md-width-100 sm-width-100 sm-margin-seven-bottom xs-width-100">Dollcare</span>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                        <!-- end card 3 -->

                </section>

                <!-- This section is the social media feed -->
                <section>
                <div class="container">

                <!-- Title with outside lines -->
                <div class="row">
                    <div class="col-md-7 col-sm-12 col-xs-12 center-col text-center margin-100px-bottom xs-margin-40px-bottom">
                        <div class="position-relative overflow-hidden width-100">
                            <span class="text-small text-outside-line-full alt-font font-weight-600 text-uppercase">Social media feed</span>
                        </div>
                    </div>
                </div>
                
                <!-- Start social media carousel -->
                <div class="row position-relative">
                    <div class="swiper-container swiper-pagination-bottom black-move blog-slider swiper-three-slides swiper-container-horizontal">
                        <div class="swiper-wrapper" style="transform: translate3d(-390px, 0px, 0px); transition-duration: 0ms;">
                            <!-- This system could be expanded by generating these cards from an external source -->

                            <!-- start card 1 -->
                            <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12 swiper-slide sm-margin-four-bottom carouselcard">
                                <div class="margin-half-all bg-white box-shadow-light text-center padding-fourteen-all xs-padding-30px-all">
                                    <img src="images/avtar-14.jpg" class="border-radius-100 width-40 margin-25px-bottom sm-margin-15px-bottom" alt="" data-no-retina="">
                                    <p class="sm-margin-15px-bottom xs-margin-20px-bottom">Wij zijn met een showcase op het Robot Care event in Zeist op 14-6-2019. Kom allemaal kijken!</p>
                                    <span class="text-extra-dark-gray text-small text-uppercase display-block line-height-10 alt-font font-weight-600">Modoll Facebook</span>
                                </div>
                            </div>
                            <!-- end card 1 -->

                            <!-- start card 2 -->
                            <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12 swiper-slide sm-margin-four-bottom carouselcard">
                                <div class="margin-half-all bg-white box-shadow-light text-center padding-fourteen-all xs-padding-30px-all">
                                    <img src="images/avtar-13.jpg" class="border-radius-100 width-40 margin-25px-bottom sm-margin-15px-bottom" alt="" data-no-retina="">
                                    <p class="sm-margin-15px-bottom xs-margin-20px-bottom">Nieuw evenement waarvoor wij nog vrijwilligers zoeken: paasontbijt 2019</p>
                                    <span class="text-extra-dark-gray text-small text-uppercase display-block line-height-10 alt-font font-weight-600">VEADS Facebook</span>
                                </div>
                            </div>
                            <!-- end card 2 -->

                            <!-- start card 3 -->
                            <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12 swiper-slide sm-margin-four-bottom carouselcard">
                                <div class="margin-half-all bg-white box-shadow-light text-center padding-fourteen-all xs-padding-30px-all">
                                    <img src="images/avtar-15.jpg" class="border-radius-100 width-40 margin-25px-bottom sm-margin-15px-bottom" alt="" data-no-retina="">
                                    <p class="sm-margin-15px-bottom xs-margin-20px-bottom">Nieuwe influencer gezocht met minimaal 1000 volgers op instagram.</p>
                                    <span class="text-extra-dark-gray text-small text-uppercase display-block line-height-10 alt-font font-weight-600">Modoll Twitter</span>
                                </div>
                            </div>
                            <!-- end card 3 -->

                            <!-- start card 4 -->
                            <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12 swiper-slide sm-margin-four-bottom carouselcard">
                                <div class="margin-half-all bg-white box-shadow-light text-center padding-fourteen-all xs-padding-30px-all">
                                    <img src="images/avtar-16.jpg" class="border-radius-100 width-40 margin-25px-bottom sm-margin-15px-bottom" alt="" data-no-retina="">
                                    <p class="sm-margin-15px-bottom xs-margin-20px-bottom">Benefietconcert 2018 was weer een groot succes! We hopen iedereen volgend jaar weer te zien!</p>
                                    <span class="text-extra-dark-gray text-small text-uppercase display-block line-height-10 alt-font font-weight-600">VEADS Instagram</span>
                                </div>
                            </div>
                            <!-- end card 4 -->

                        </div>                        
                        <div class="swiper-pagination swiper-pagination-three-slides height-auto swiper-pagination-clickable swiper-pagination-bullets"><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet swiper-pagination-bullet-active"></span></div>
                    </div>
                </div>
            </div>
                        
                    </div>
                </div>
            </div>
        </section>

@endsection
