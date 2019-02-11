@extends('front.master') 
@section('content')

<section class="wow fadeIn cover-background background-position-top" style="background-image: url(&quot;images/parallax-bg53.jpg&quot;); visibility: visible; animation-name: fadeIn;">
    <div class="opacity-medium bg-extra-dark-gray"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 display-table page-title-large">
                <div class="display-table-cell vertical-align-middle text-center padding-30px-tb">
                    <h1 class="text-white alt-font font-weight-600 margin-10px-bottom">Perfection is not attainable</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <main class="col-md-9 col-sm-12 col-xs-12 right-sidebar sm-margin-60px-bottom xs-margin-40px-bottom no-padding-left sm-no-padding-right">
                <div class="col-md-12 col-sm-12 col-xs-12 blog-details-text last-paragraph-no-margin">
                    <img src="images/blog-details-img19.jpg" alt="" class="width-100 margin-45px-bottom" data-no-retina="">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. <strong class="text-extra-dark-gray">Lorem Ipsum has been the industry's</strong>                        standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled
                        it to make a type specimen book. It has survived not only five centuries, but also the leap into
                        electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the
                        release of Letraset sheets containing Lorem Ipsum passages, and more <u>recently with desktop publishing</u>                        software like aldus pagemaker including versions.</p>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration
                        in some form, by injected humour, or randomised words which don't look even slightly believable.
                        If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing
                        hidden in the middle of text. All the lorem ipsum generators on the internet tend to repeat predefined
                        chunks as necessary, making this the <strong class="text-extra-dark-gray">first true generator on the internet.</strong>                        It uses a dictionary of over 200 Latin words, combined with a <u>handful of model sentence structures,</u>                        to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free
                        from repetition, injected humour.</p>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 margin-seven-bottom margin-eight-top">
                    <div class="divider-full bg-medium-light-gray"></div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 sm-text-center">
                    <div class="tag-cloud margin-20px-bottom">
                        <a href="blog-grid.html">Advertisement</a>
                        <a href="blog-grid.html">Artistry</a>
                        <a href="blog-grid.html">Blog</a>
                        <a href="blog-grid.html">Conceptual</a>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 text-right sm-text-center">
                    <div class="social-icon-style-6">
                        <ul class="extra-small-icon">
                            <li><a class="likes-count" href="blog-standard-post.html#" target="_blank"><i class="fas fa-heart text-deep-pink"></i><span class="text-small">300</span></a></li>
                            <li><a class="facebook" href="http://facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a class="twitter" href="http://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            <li><a class="google" href="http://google.com" target="_blank"><i class="fab fa-google-plus-g"></i></a></li>
                            <li><a class="pinterest" href="http://dribbble.com" target="_blank"><i class="fab fa-pinterest-p"></i></a></li>
                        </ul>
                    </div>
                </div>
            </main>
            <aside class="col-md-3 col-sm-12 col-xs-12 pull-right">
                <div class="margin-45px-bottom xs-margin-25px-bottom">
                    <div class="text-extra-dark-gray margin-20px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span>Informatie</span></div>
                    <ul class="list-style-6 margin-50px-bottom text-small">
                        <li><a>Datum: </a><span>12</span></li>
                        <li><a>Prijs: </a><span>05</span></li>
                    </ul>
                </div>
                <div class="margin-45px-bottom xs-margin-25px-bottom">
                    <div class="text-extra-dark-gray margin-25px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span>Inschrijven</span></div>
                    <div class="display-inline-block width-100">
                        <form>
                            <div class="position-relative">
                                <input type="text" class="bg-transparent text-small border-color-extra-light-gray medium-input pull-left" placeholder="naam">
                                <input type="text" class="bg-transparent text-small border-color-extra-light-gray medium-input pull-left" placeholder="e-mail">
                                <button class="btn btn-dark-gray btn-small" type="submit">Inschrijven</button>
                            </div>
                        </form>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</section>
@endsection