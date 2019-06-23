@extends('front.master')

@section('content')
    <section class="cover-background background-position-top top-space width-80 margin-ten-left border-radius-event"
             style="background-image: url('{{ !empty(($header = getContent('contact_header'))) ? '/image/' . $header->path . '/' . $header->name : '/images/homepage-9-parallax-img5.jpg' }}'); margin-top: 74px; visibility: visible; animation-name: fadeIn;">
        <div class="opacity-medium bg-light-blue"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 display-table page-title-large">
                    <div class="display-table-cell vertical-align-middle text-center padding-30px-tb">
                        <h1 class="alt-font text-white font-weight-600 no-margin-bottom">{{ getContent('veads_product_donate_title')->content }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12 center-col margin-eight-bottom sm-margin-40px-bottom xs-margin-30px-bottom text-center last-paragraph-no-margin margin-100px-top">
        <h5 class="alt-font font-weight-700 text-extra-dark-gray text-uppercase">Informatie</h5>
        <p>{!! getContent('veads_product_donate_page_description')->content !!}</p>
    </div>

@endsection