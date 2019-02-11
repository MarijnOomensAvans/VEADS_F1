<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700">
    <link rel="stylesheet" id="css-main" href="{{ asset('css/dashmix.min-1.5.css') }}">
</head>
<body>
<div id="page-container" class="side-trans-enabled">
    <main id="main-container">
        <div class="row no-gutters bg-gd-sun-op">
            <div class="hero-static col-md-6 d-flex align-items-center bg-white">
                <div class="p-3 w-100">
                    <div class="text-center">
                        <a class="link-fx text-warning font-w700 font-size-h1" href="{{ route('home') }}">
                            VEADS
                        </a>
                        <p class="text-uppercase font-w700 font-size-sm text-muted">Wachtwoord vergeten</p>
                    </div>
                    <div class="row no-gutters justify-content-center">
                        <div class="col-sm-8 col-xl-6">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf

                                <div class="form-group py-3">
                                    <input type="text" class="form-control form-control-lg form-control-alt{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" placeholder="E-mailadres" required value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-block btn-hero-lg btn-hero-warning">
                                        <i class="fa fa-fw fa-reply mr-1"></i> Reset link sturen
                                    </button>
                                    <p class="mt-3 mb-0 d-lg-flex justify-content-lg-between">
                                        <a class="btn btn-sm btn-light d-block d-lg-inline-block mb-1" href="{{ route('login') }}">
                                            <i class="fa fa-sign-in-alt text-muted mr-1"></i> Login
                                        </a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero-static col-md-6 d-none d-md-flex align-items-md-center justify-content-md-center text-md-center">
                <div class="p-3">
                    <p class="display-4 font-w700 text-white mb-0">
                        Voor Elkaar Aan De Slag
                    </p>
                </div>
            </div>
        </div>
    </main>
</div>
<script src="{{ asset('js/dashmix.core.min-1.5.js') }}"></script>
<script src="{{ asset('js/dashmix.app.min-1.5.js') }}"></script>
</body>
</html>
