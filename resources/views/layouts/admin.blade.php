@push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', () => $(document).tooltip({ selector: '[data-toggle="tooltip"]' }));
        </script>
@endpush

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700">
    <link rel="stylesheet" id="css-main" href="{{ asset('css/dashmix.min-1.5.css') }}">
    <link rel="stylesheet" id="css-main" href="{{ asset('css/backend.css') }}">
</head>
<body>
<div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header-fixed page-header-dark main-content-narrow">
    <nav id="sidebar" aria-label="Main Navigation">
        <div class="bg-header-dark">
            <div class="content-header bg-white-10">
                <a class="link-fx font-w600 font-size-lg text-white" href="{{ route('admin') }}">{{ config('app.name', 'Laravel') }}</a>
                <div>
                    <a class="d-lg-none text-white ml-2" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                        <i class="fa fa-times-circle"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="content-side content-side-full">
            <ul class="nav-main">
                <li class="nav-main-item">
                    <a class="nav-main-link{{ Request::path() == 'admin' ? ' active' : '' }}" href="{{ route('admin') }}">
                        <i class="nav-main-link-icon si si-cursor"></i>
                        <span class="nav-main-link-name">Dashboard</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link" href="{{ route('home') }}" target="_blank">
                        <i class="nav-main-link-icon fa fa-home"></i>
                        <span class="nav-main-link-name">Homepagina website</span>
                    </a>
                </li>
                <li class="nav-main-item nav-main-heading flex-row align-items-center">Content <span class="fa fa-question-circle ml-2" data-toggle="tooltip" data-placement="top" title="Hieronder staan opties die te maken hebben met de inhoud van de website."></span></li>
                <li class="nav-main-item">
                    <a class="nav-main-link{{ strpos(Request::path(), 'admin/event') !== false ? ' active' : '' }}" href="{{ route('admin/events') }}">
                        <i class="nav-main-link-icon fas fa-calendar"></i>
                        <span class="nav-main-link-name">Evenementen</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link{{ strpos(Request::path(), 'admin/partners') !== false ? ' active' : '' }}" href="{{ route('admin/partners') }}">
                        <i class="nav-main-link-icon fa fa-hands-helping"></i>
                        <span class="nav-main-link-name">Partners</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link{{ strpos(Request::path(), 'admin/ambassador') !== false ? ' active' : '' }}" href="{{ action('Backend\AmbassadorController@index') }}">
                        <i class="nav-main-link-icon fa fa-hand-holding-heart"></i>
                        <span class="nav-main-link-name">Ambassadeurs</span>
                    </a>
                </li>
                <li class="nav-main-item">
                  <a class="nav-main-link{{ strpos(Request::path(), 'admin/team_member') !== false ? ' active' : '' }}" href="{{ action('Backend\TeamMemberController@index') }}">
                         <i class="nav-main-link-icon fa fa-users"></i>
                         <span class="nav-main-link-name">Teamleden</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link{{ strpos(Request::path(), 'admin/edit_content') !== false ? ' active' : '' }}" href="{{ action('Backend\EditContentController@index') }}">
                        <i class="nav-main-link-icon fa fa-file"></i>
                        <span class="nav-main-link-name">Pagina's</span>
                    </a>
                </li>
                <li class="nav-main-item nav-main-heading flex-row align-items-center">Connecties <span class="fa fa-question-circle ml-2" data-toggle="tooltip" data-placement="top" title="Hieronder staan opties die te maken hebben met invoer van externe bronnen."></span></li>
                <li class="nav-main-item">
                    <a class="nav-main-link{{ strpos(Request::path(), 'admin/volunteer') !== false ? ' active' : '' }}" href="{{ route('admin/volunteers') }}">
                        <i class="nav-main-link-icon fas fa-users"></i>
                        <span class="nav-main-link-name">Vrijwilligers</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link{{ strpos(Request::path(), 'admin/contact_form') !== false ? ' active' : '' }}" href="{{ action('Backend\ContactFormController@index') }}">
                        <i class="nav-main-link-icon fas fa-envelope-open-text"></i>
                        <span class="nav-main-link-name">Contact aanvragen</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link{{ strpos(Request::path(), 'admin/facebook') !== false ? ' active' : '' }}" href="{{ route('admin/facebook') }}">
                        <i class="nav-main-link-icon fab fa-facebook"></i>
                        <span class="nav-main-link-name">Facebook</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link{{ strpos(Request::path(), 'admin/instagram') !== false ? ' active' : '' }}" href="{{ route('admin/instagram') }}">
                        <i class="nav-main-link-icon fab fa-instagram"></i>
                        <span class="nav-main-link-name">Instagram</span>
                    </a>
                </li>
                <li class="nav-main-item nav-main-heading flex-row align-items-center">Win-win <span class="fa fa-question-circle ml-2" data-toggle="tooltip" data-placement="top" title="Hieronder staan opties die te maken hebben met de win-win pagina van de website."></span></li>
{{--                <li class="nav-main-item">--}}
{{--                    <a class="nav-main-link{{ strpos(Request::path(), 'admin/donations') !== false ? ' active' : '' }}" href="{{ action('Backend\DonationController@index') }}">--}}
{{--                        <i class="nav-main-link-icon fas fa-money-bill"></i>--}}
{{--                        <span class="nav-main-link-name">Donaties</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
                <li class="nav-main-item">
                    <a class="nav-main-link{{ strpos(Request::path(), 'admin/veads_request') !== false ? ' active' : '' }}" href="{{ action('Backend\VeadsRequestController@index') }}">
                        <i class="nav-main-link-icon fas fa-search"></i>
                        <span class="nav-main-link-name">{{ config('app.name') }} zoekt...</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <header id="page-header">
        <div class="content-header">
            <div>
                <button type="button" class="btn btn-dual mr-1 d-lg-none" data-toggle="layout" data-action="sidebar_toggle">
                    <i class="fa fa-fw fa-bars"></i>
                </button>
            </div>
            <div>
                <div class="dropdown d-inline-block">
                    <button type="button" class="btn btn-dual" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-fw fa-user d-sm-none"></i>
                        <span class="d-none d-sm-inline-block">{{ \Illuminate\Support\Facades\Auth::user()->name }}</span>
                        <i class="fa fa-fw fa-angle-down ml-1 d-none d-sm-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right p-0" aria-labelledby="page-header-user-dropdown">
                        <div class="bg-primary-darker rounded-top font-w600 text-white text-center p-3">
                            Gebruiker opties
                        </div>
                        <div class="p-2">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="far fa-fw fa-arrow-alt-circle-left mr-1"></i> Uitloggen
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main id="main-container">
        <div id="app">
            @yield('content')
        </div>
    </main>
    <footer id="page-footer" class="bg-body-light">
        <div class="content py-0">
            <div class="row font-size-sm">
                <div class="col-sm-6 order-sm-2 mb-1 mb-sm-0 text-center text-sm-right">
                    Gemaakt door Groep F1 van Avans Hogeschool
                </div>
                <div class="col-sm-6 order-sm-1 text-center text-sm-left">
                    &copy; <span data-toggle="year-copy">2019</span>
                </div>
            </div>
        </div>
    </footer>
</div>
<script src="{{ asset('js/dashmix.core.min-1.5.js') }}"></script>
<script src="{{ asset('js/dashmix.app.min-1.5.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
@yield('scripts')
@stack('scripts')
</body>
</html>
