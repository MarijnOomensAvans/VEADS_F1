@extends('front.master')

@section('content')
    <section class="cover-background background-position-top top-space width-80 margin-ten-left border-radius-event" style="background-image: url('/images/homepageheaderimage.jpg'); margin-top: 72px; visibility: visible;">
        <div class="opacity-medium bg-light-blue"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 display-table page-title-large">
                    <div class="display-table-cell vertical-align-middle text-center padding-30px-tb">
                        <h1 class="alt-font text-white font-weight-600 no-margin-bottom">
                            @yield('title')
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Breadcrumbs -->
    <section class="padding-20px-tb border-bottom border-color-extra-light-gray" style="visibility: visible">
        <div class="container">
            <div class="row">
                <div class="col-md-12 display-table">
                    <div class="display-table-cell vertical-align-middle text-left">
                        <div class="breadcrumb alt-font text-small no-margin-bottom">
                            <ul>
                                <li><a href="/" class="text-medium-gray">Home</a></li>
                                <li class="text-medium-gray">@yield('title')</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="padding-20px-bottom padding-20px-top">
        <div class="container">
            <div class="row">
                <main class="col-xs-12">
                    @yield('message')
                </main>
            </div>
        </div>
    </section>
@endsection