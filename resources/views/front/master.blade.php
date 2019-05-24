
<!doctype html>
<html class="no-js" lang="nl">
    <head>
        
        <title>{{ getContent('home_title')->content }}</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
        <meta name="author" content="ThemeZaa">

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="//www.googletagmanager.com/gtag/js?id={{config('google.tracking_id')}}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', "{{config('google.tracking_id')}}", { 'anonymize_ip': true });
        </script>

        <link rel="stylesheet" href="/css/theme/animate.css" />
        <link rel="stylesheet" href="/css/theme/bootstrap.min.css" />
        <link rel="stylesheet" href="/css/theme/et-line-icons.css" />
        <link rel="stylesheet" href="/css/theme/font-awesome.min.css" />
        <link rel="stylesheet" href="/css/theme/themify-icons.css">
        <link rel="stylesheet" href="/css/theme/swiper.min.css">
        <link rel="stylesheet" href="/css/theme/justified-gallery.min.css">
        <link rel="stylesheet" href="/css/theme/magnific-popup.css" />
        <link rel="stylesheet" type="text/css" href="/revolution/css/settings.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="/revolution/css/layers.css">
        <link rel="stylesheet" type="text/css" href="/revolution/css/navigation.css">
        <link rel="stylesheet" href="/css/theme/bootsnav.css">
        <link rel="stylesheet" href="/css/theme/style.css" />
        <link rel="stylesheet" href="/css/theme/responsive.css" />
        <link rel="stylesheet" href="/css/theme/footer.css" />
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
        <!--[if IE]>
            <script src="js/theme/html5shiv.js"></script>
        <![endif]-->
        @stack('styles')
    </head>
    <body>
        <header class="header">
            <nav class="navbar navbar-default bootsnav navbar-fixed-top header-light bg-transparent nav-box-width">
                <div class="container nav-header-container">
                    <div class="row">
                        <div class="col-md-2 col-xs-5">
                            <a href="/" title="{{ getContent('home_title')->content }}" class="logo"><img src="{{ !empty(($header = getContent('footer_logo'))) ? '/image/' . $header->path . '/' . $header->name : '/images/logo.png' }}" class="logo-dark default" alt="Veads logo"></a>
                        </div>
                        <div class="col-md-7 col-xs-2 width-auto pull-right accordion-menu xs-no-padding-right">
                            <button type="button" class="navbar-toggle collapsed pull-right" data-toggle="collapse" data-target="#navbar-collapse-toggle-1">
                                <span class="sr-only">toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <div class="navbar-collapse collapse pull-right" id="navbar-collapse-toggle-1">
                                <ul id="accordion" class="nav navbar-nav navbar-left no-margin alt-font text-normal" data-in="fadeIn" data-out="fadeOut">
                                    <!-- start menu item -->
                                    <li>
                                        <a href="/">Home</a>
                                    </li>

                                    <li>
                                        <a href="/event">Evenementen</a>
                                    </li>

                                    <li>
                                        <a href="/project">Projecten</a>
                                    </li>

                                    <li>
                                        <a href="/ikhelpmee">Help mee</a>
                                    </li>

                                    <li>
                                        <a href="/contact">Contact</a>
                                    </li>

                                    @guest
                                        <li>
                                            <a href="/login">Inloggen</a>
                                        </li>                                      
                                    @endguest

                                    @auth
                                        <li>
                                            <a href="/profile">Mijn Account</a>
                                        </li>

                                        <li>
                                            <a href="/logout">Uitloggen</a>
                                        </li>                                      
                                    @endauth
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <div id='content-wrapper'>
            @yield('content')
        </div>

        <footer class="footer-modern-dark bg-royal-blue padding-two-tb xs-padding-30px-tb">
            <div class="footer-widget-area">
                <div class="container">
                    <div class="row equalize xs-equalize-auto">
                        <div class="col-md-4 col-sm-12 col-xs-12 xs-text-center sm-margin-three-bottom xs-margin-20px-bottom display-table">
                            <div class="display-table-cell vertical-align-middle">
                                <h6 class="text-white width-70 md-width-100 no-margin-bottom">{{ getContent('footer_quote')->content }}</h6>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12 social-style-2 xs-text-center display-table">
                            <div class="display-table-cell vertical-align-middle">
                                <a href="/"><img class="footer-logo" src="{{ !empty(($header = getContent('footer_logo'))) ? '/image/' . $header->path . '/' . $header->name : '/images/logo.png' }}" alt="Logo"></a>
                                <div class="social-icon-style-8">
                                    <ul class="text-extra-small margin-20px-top xs-no-margin-bottom text-uppercase no-padding no-margin-bottom list-style-none bigger-font">
                                            <li class="display-inline-block margin-10px-right"><a class="facebook text-white" href="{{ getContent('footer_facebook_link')->content }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                            <li class="display-inline-block margin-10px-right"><a class="instagram text-white" href="{{ getContent('footer_instagram_link')->content }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <a class="scroll-top-arrow" href="javascript:void(0);"><i class="ti-arrow-up"></i></a>

        <script type="text/javascript" src="/js/theme/jquery.js"></script>
        <script type="text/javascript" src="/js/theme/modernizr.js"></script>
        <script type="text/javascript" src="/js/theme/bootstrap.min.js"></script>
        <script type="text/javascript" src="/js/theme/jquery.easing.1.3.js"></script>
        <script type="text/javascript" src="/js/theme/skrollr.min.js"></script>
        <script type="text/javascript" src="/js/theme/smooth-scroll.js"></script>
        <script type="text/javascript" src="/js/theme/jquery.appear.js"></script>
        <script type="text/javascript" src="/js/theme/bootsnav.js"></script>
        <script type="text/javascript" src="/js/theme/jquery.nav.js"></script>
        <script type="text/javascript" src="/js/theme/wow.min.js"></script>
        <script type="text/javascript" src="/js/theme/page-scroll.js"></script>
        <script type="text/javascript" src="/js/theme/swiper.min.js"></script>
        <script type="text/javascript" src="/js/theme/jquery.count-to.js"></script>
        <script type="text/javascript" src="/js/theme/jquery.stellar.js"></script>
        <script type="text/javascript" src="/js/theme/jquery.magnific-popup.min.js"></script>
        <script type="text/javascript" src="/js/theme/isotope.pkgd.min.js"></script>
        <script type="text/javascript" src="/js/theme/imagesloaded.pkgd.min.js"></script>
        <script type="text/javascript" src="/js/theme/classie.js"></script>
        <script type="text/javascript" src="/js/theme/hamburger-menu.js"></script>
        <script type="text/javascript" src="/js/theme/counter.js"></script>
        <script type="text/javascript" src="/js/theme/jquery.fitvids.js"></script>
        <script type="text/javascript" src="/js/theme/equalize.min.js"></script>
        <script type="text/javascript" src="/js/theme/skill.bars.jquery.js"></script>
        <script type="text/javascript" src="/js/theme/justified-gallery.min.js"></script>
        <script type="text/javascript" src="/js/theme/jquery.easypiechart.min.js"></script>
        <script type="text/javascript" src="/js/theme/instafeed.min.js"></script>
        <script type="text/javascript" src="/js/theme/retina.min.js"></script>
        <script type="text/javascript" src="/revolution/js/jquery.themepunch.tools.min.js"></script>
        <script type="text/javascript" src="/revolution/js/jquery.themepunch.revolution.min.js"></script>
        <script type="text/javascript" src="/js/theme/main.js"></script>
        <script>
            $('[data-toggle="tooltip"]').tooltip();
        </script>
        @stack('scripts')
    </body>
</html>
