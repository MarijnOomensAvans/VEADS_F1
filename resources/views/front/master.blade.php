
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <title>Veads</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
        <meta name="author" content="ThemeZaa">

        <link rel="stylesheet" href="css/theme/animate.css" />
        <link rel="stylesheet" href="css/theme/bootstrap.min.css" />
        <link rel="stylesheet" href="css/theme/et-line-icons.css" />
        <link rel="stylesheet" href="css/theme/font-awesome.min.css" />
        <link rel="stylesheet" href="css/theme/themify-icons.css">
        <link rel="stylesheet" href="css/theme/swiper.min.css">
        <link rel="stylesheet" href="css/theme/justified-gallery.min.css">
        <link rel="stylesheet" href="css/theme/magnific-popup.css" />
        <link rel="stylesheet" type="text/css" href="revolution/css/settings.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="revolution/css/layers.css">
        <link rel="stylesheet" type="text/css" href="revolution/css/navigation.css">
        <link rel="stylesheet" href="css/theme/bootsnav.css">
        <link rel="stylesheet" href="css/theme/style.css" />
        <link rel="stylesheet" href="css/theme/responsive.css" />
        <!--[if IE]>
            <script src="js/theme/html5shiv.js"></script>
        <![endif]-->
    </head>
    <body>
        <header class="header-with-topbar">
            <div class="top-header-area bg-black padding-5px-tb">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12 text-uppercase alt-font xs-no-padding-lr xs-text-center">
                            <a href="tel:1234567890" class="text-link-white xs-width-100" title="Call us 123-456-7890">Call us 123-456-7890</a>
                            <div class="separator-line-verticle-extra-small bg-dark-gray display-inline-block margin-two-lr hidden-xs position-relative vertical-align-middle top-minus1"></div>
                            <a href="mailto:no-reply@domain.com" class="text-link-white xs-width-100" title="no-reply@domain.com">no-reply@domain.com</a>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 hidden-xs xs-no-padding-lr text-right">
                            <div class="icon-social-very-small xs-width-100 xs-text-center display-inline-block">
                                <a href="https://www.facebook.com/" title="Facebook" target="_blank" class="text-link-white"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                                <a href="https://twitter.com/" title="Twitter" target="_blank" class="text-link-white"><i class="fab fa-twitter"></i></a>
                                <a href="https://linkedin.com/" title="Linked In" target="_blank" class="text-link-white"><i class="fab fa-linkedin-in"></i></a>
                                <a href="https://plus.google.com" title="Google Plus" target="_blank" class="text-link-white"><i class="fab fa-google-plus-g"></i></a>                            
                            </div>  
                            <div class="separator-line-verticle-extra-small bg-dark-gray display-inline-block margin-two-lr hidden-xs position-relative vertical-align-middle"></div>
                            <div class="btn-group dropdown-style-1 xs-width-100 xs-text-center xs-margin-three-bottom display-inline-block">
                                <button type="button" class="btn dropdown-toggle xs-width-100" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    English <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu xs-width-100">
                                    <li><a href="javascript:void(0);" title="English"><span class="icon-country usa"></span>English</a></li>
                                    <li><a href="javascript:void(0);" title="England"><span class="icon-country england"></span>England</a></li>
                                    <li><a href="javascript:void(0);" title="France"><span class="icon-country france"></span>France</a></li>
                                    <li><a href="javascript:void(0);" title="China"><span class="icon-country china"></span>China</a></li>
                                    <li><a href="javascript:void(0);" title="Hong Kong"><span class="icon-country hong-kong"></span>Hong Kong</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-default bootsnav navbar-top header-light-transparent bg-transparent nav-box-width">
                <div class="container nav-header-container">
                    <div class="row">
                        <div class="col-md-2 col-xs-5">
                            <a href="index.html" title="Pofo" class="logo"><img src="images/logo.png" data-rjs="images/logo@2x.png" class="logo-dark default" alt="Pofo"><img src="images/logo-white.png" data-rjs="images/logo-white@2x.png" alt="Pofo" class="logo-light"></a>
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
                                        <a href="javascript:void(0);">Home</a>
                                    </li>

                                    <li>
                                        <a href="javascript:void(0);">Evenementen</a>
                                    </li>

                                    <li>
                                        <a href="javascript:void(0);">Projecten</a>
                                    </li>

                                    <li>
                                        <a href="javascript:void(0);">Contact</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        @yield('content')

        <footer class="footer-modern-dark bg-extra-dark-gray padding-five-tb xs-padding-30px-tb">
            <div class="footer-widget-area padding-40px-bottom xs-padding-30px-bottom">
                <div class="container">
                    <div class="row equalize xs-equalize-auto">
                        <div class="col-md-4 col-sm-12 col-xs-12 xs-text-center sm-margin-three-bottom xs-margin-20px-bottom display-table">
                            <div class="display-table-cell vertical-align-middle">
                                <h6 class="text-dark-gray width-70 md-width-100 no-margin-bottom">London Based Creative Studio</h6>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12 xs-text-center xs-margin-20px-bottom display-table">
                            <div class="display-table-cell vertical-align-middle">
                                <span class="display-block">301 The Greenhouse,<br>Custard Factory, London, E2 8DY.</span>
                                <a href="mailto:sales@domain.com" title="sales@domain.com">sales@domain.com</a>   |   +44 (0) 123 456 7890
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12 social-style-2 xs-text-center display-table">
                            <div class="display-table-cell vertical-align-middle">
                                <a href="index.html"><img class="footer-logo" src="images/logo-white.png" data-rjs="images/logo-white@2x.png" alt="Pofo"></a>
                                <div class="social-icon-style-8">
                                    <ul class="text-extra-small margin-20px-top xs-no-margin-bottom text-uppercase no-padding no-margin-bottom list-style-none">
                                        <li class="display-inline-block margin-10px-right"><a href="http://twitter.com" target="_blank" title="Twitter">Twitter</a></li>
                                        <li class="display-inline-block margin-10px-right"><a href="http://facebook.com" target="_blank" title="Facebook">Facebook</a></li>
                                        <li class="display-inline-block margin-10px-right"><a href="http://instagram.com" target="_blank" title="Instagram">Instagram</a></li>
                                        <li class="display-inline-block"><a href="http://dribbble.com" target="_blank" title="Dribbble">Dribbble</a></li>                                                              
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="footer-bottom border-top border-color-medium-dark-gray padding-40px-top xs-padding-30px-top">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12 text-left text-small xs-text-center">POFO - Portfolio Concept Theme</div>
                        <div class="col-md-6 col-sm-6 col-xs-12 text-right text-small xs-text-center">&copy; 2017 POFO is Proudly Powered by <a href="../../index.html" target="_blank" title="ThemeZaa">ThemeZaa</a></div>
                    </div>
                </div>
            </div>
        </footer>
        
        <a class="scroll-top-arrow" href="javascript:void(0);"><i class="ti-arrow-up"></i></a>

        <script type="text/javascript" src="js/theme/jquery.js"></script>
        <script type="text/javascript" src="js/theme/modernizr.js"></script>
        <script type="text/javascript" src="js/theme/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/theme/jquery.easing.1.3.js"></script>
        <script type="text/javascript" src="js/theme/skrollr.min.js"></script>
        <script type="text/javascript" src="js/theme/smooth-scroll.js"></script>
        <script type="text/javascript" src="js/theme/jquery.appear.js"></script>
        <script type="text/javascript" src="js/theme/bootsnav.js"></script>
        <script type="text/javascript" src="js/theme/jquery.nav.js"></script>
        <script type="text/javascript" src="js/theme/wow.min.js"></script>
        <script type="text/javascript" src="js/theme/page-scroll.js"></script>
        <script type="text/javascript" src="js/theme/swiper.min.js"></script>
        <script type="text/javascript" src="js/theme/jquery.count-to.js"></script>
        <script type="text/javascript" src="js/theme/jquery.stellar.js"></script>
        <script type="text/javascript" src="js/theme/jquery.magnific-popup.min.js"></script>
        <script type="text/javascript" src="js/theme/isotope.pkgd.min.js"></script>
        <script type="text/javascript" src="js/theme/imagesloaded.pkgd.min.js"></script>
        <script type="text/javascript" src="js/theme/classie.js"></script>
        <script type="text/javascript" src="js/theme/hamburger-menu.js"></script>
        <script type="text/javascript" src="js/theme/counter.js"></script>
        <script type="text/javascript" src="js/theme/jquery.fitvids.js"></script>
        <script type="text/javascript" src="js/theme/equalize.min.js"></script>
        <script type="text/javascript" src="js/theme/skill.bars.jquery.js"></script> 
        <script type="text/javascript" src="js/theme/justified-gallery.min.js"></script>
        <script type="text/javascript" src="js/theme/jquery.easypiechart.min.js"></script>
        <script type="text/javascript" src="js/theme/instafeed.min.js"></script>
        <script type="text/javascript" src="js/theme/retina.min.js"></script>
        <script type="text/javascript" src="revolution/js/jquery.themepunch.tools.min.js"></script>
        <script type="text/javascript" src="revolution/js/jquery.themepunch.revolution.min.js"></script>
        <script type="text/javascript" src="js/theme/main.js"></script>
    </body>
</html>