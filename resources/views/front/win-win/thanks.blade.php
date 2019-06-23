@extends('front.master')
@section('content')
    <section class="wow fadeIn no-padding bg-light-gray top-space" style="animation-name: fadeIn;">
        <div class="container-fluid">
            <div class="row equalize sm-equalize-auto" style="height: 750px;">
                <div class="col-md-8 col-sm-12 col-xs-12 no-padding cover-background" style="background: rgba(0, 0, 0, 0) url(&quot;/images/single-project-03-img1.jpg&quot;) repeat scroll 0% 0%; min-height: 755px;"></div>
                <div class="col-md-4 col-sm-12 col-xs-12 no-padding">
                    <div class="padding-seventeen-lr padding-twenty-tb md-padding-40px-lr sm-padding-50px-tb xs-padding-30px-all">
                        <img src="images/logo.png" class="margin-30px-bottom" alt="" data-no-retina="">
                        <h3 class="alt-font text-extra-dark-gray font-weight-600 no-margin-bottom">Dank u!</h3>
                        <div class="bg-deep-pink separator-line-horrizontal-full display-inline-block margin-25px-tb"></div>
                        <p class="width-90 width-100 margin-35px-bottom text-medium line-height-28">{!! getContent('veads_volunteer_thanks')->content !!}</p>
                    </div>
                </div>
        </div>
        </div>
    </section>
@endsection