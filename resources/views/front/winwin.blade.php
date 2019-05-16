@extends('front.master')
@section('content')

    <section>
        <div class="container-fluid padding-five-lr">

            {{-- Header --}}
            <div class="row">
                <div class="col-md-7 col-sm-12 col-xs-12 center-col text-center margin-100px-bottom xs-margin-40px-bottom">
                    <div class="position-relative overflow-hidden width-100">
                        <span class="text-extra-large text-outside-line-full alt-font font-weight-800">
                            Ik help mee
                        </span>
                    </div>
                </div>
            </div>

            {{-- Block Wrapper --}}
            <div class="row equalize xs-equalize-auto">

                {{-- Optie 1 --}}
                <a href="/veads-zoekt" class="fadeUpAnimation delay-200">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 banner-style1 md-margin-30px-bottom" style="height: 500px;">
                        <figure class="bg-extra-dark-gray">
                            <div class="banner-image height-500px cover-background" style="background-image:url('{{ !empty(($header = getContent('veads_request_image'))) ? '/image/' . $header->path . '/' . $header->name : 'images/winwin1.jpg' }}');">
                            </div>
                            <figcaption>
                                <div class="display-table width-100 height-100">
                                    <div class="display-table-cell vertical-align-middle text-center">
                                        <div><h3 class="text-royal-blue font-weight-800 text-border-white">{{ getContent('veads_request_title')->content }}</h3></div>
                                        <p class="width-80 center-col margin-20px-top text-white xs-width-100 font-weight-700">
                                            {{ getContent('veads_request_description')->content }}
                                        </p>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </a>

                {{-- Optie 2 --}}
                <a href="/inschrijvenvrijwilliger" class="fadeUpAnimation delay-200">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 banner-style1 md-margin-30px-bottom" style="height: 500px;">
                        <figure class="bg-extra-dark-gray">
                            <div class="banner-image height-500px cover-background" style="background-image:url('{{ !empty(($header = getContent('veads_volunteer_image'))) ? '/image/' . $header->path . '/' . $header->name : 'images/winwin2.jpg' }}');">
                            </div>
                            <figcaption>
                                <div class="display-table width-100 height-100">
                                    <div class="display-table-cell vertical-align-middle text-center">
                                        <div><h3 class="text-royal-blue font-weight-800 text-border-white">{{ getContent('veads_volunteer_title')->content }}</h3></div>
                                        <p class="width-80 center-col margin-20px-top text-white xs-width-100 font-weight-700">
                                            {{ getContent('veads_volunteer_description')->content }}
                                        </p>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </a>

                {{-- Optie 3 --}}
                <a href="/giveproducts" class="fadeUpAnimation delay-400">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 banner-style1 sm-margin-30px-bottom" style="height: 500px;">
                        <figure class="bg-extra-dark-gray">
                            <div class="banner-image height-500px cover-background" style="background-image:url('images/winwin3.jpg');">
                            </div>
                            <figcaption>
                                <div class="display-table width-100 height-100">
                                    <div class="display-table-cell vertical-align-middle text-center">
                                        <div><h3 class="text-royal-blue font-weight-800 text-border-white">Producten uitlenen/doneren</h3></div>
                                        <p class="width-80 center-col margin-20px-top text-white xs-width-100 font-weight-700">
                                            Als u producten over heeft die u graag voor één van de evenementen of projecten van VEADS te leen zou willen stellen kan u ze hier opgeven.
                                        </p>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </a>

                {{-- Optie 4 --}}
                <a href="/doneren" class="fadeUpAnimation delay-200">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 banner-style1 md-margin-30px-bottom" style="height: 500px;">
                        <figure class="bg-extra-dark-gray">
                            <div class="banner-image height-500px cover-background" style="background-image:url('{{ !empty(($header = getContent('veads_donate_image'))) ? '/image/' . $header->path . '/' . $header->name : 'images/winwin4.jpg' }}');">
                            </div>
                            <figcaption>
                                <div class="display-table width-100 height-100">
                                    <div class="display-table-cell vertical-align-middle text-center">
                                        <div><h3 class="text-royal-blue font-weight-800 text-border-white">{{ getContent('veads_donate_title')->content }}</h3></div>
                                        <p class="width-80 center-col margin-20px-top text-white xs-width-100 font-weight-700">
                                            {{ getContent('veads_donate_description')->content }}
                                        </p>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </a>

            </div>
        </div>
    </section>
@endsection

@push('styles')
    <style>
        .fadeUpAnimation{
            display: block;
            animation-fill-mode: both;
            animation-name: fadeUpAnimation;
            animation-duration: 1s;
        }

        .delay-200{ animation-delay: 200ms; }
        .delay-400{ animation-delay: 400ms; }
        .delay-600{ animation-delay: 600ms; }

        @keyframes fadeUpAnimation {
            from {
                opacity: 0;
                transform: translateY(40px);
            }

            to {
                opacity: 1;
                transform: translateY(0px);
            }
        }

        .text-border-white{
            text-shadow: -1px -1px 0 #fff, 1px -1px 0 #fff, -1px 1px 0 #fff, 1px 1px 0 #fff;
        }
    </style>
@endpush