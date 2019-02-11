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
        <div class="row no-gutters bg-primary-op">
            <div class="hero-static col-md-6 d-flex align-items-center bg-white">
                <div class="p-3 w-100">
                    <div class="mb-3 text-center">
                        <a class="link-fx font-w700 font-size-h1" href="{{ route('home') }}">
                            VEADS
                        </a>
                        <p class="text-uppercase font-w700 font-size-sm text-muted">Inloggen</p>
                    </div>
                    <div class="row no-gutters justify-content-center">
                        <div class="col-sm-8 col-xl-6">
                            <form action="{{ route('login') }}" method="POST">
                                @csrf

                                <div class="py-3">
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-lg form-control-alt{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" id="email" name="email" required placeholder="E-mailadres">
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-lg form-control-alt{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" name="password" required placeholder="Wachtwoord">
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-block btn-hero-lg btn-hero-primary">
                                        <i class="fa fa-fw fa-sign-in-alt mr-1"></i> Inloggen
                                    </button>
                                    @if (Route::has('password.request'))
                                        <p class="mt-3 mb-0 d-lg-flex justify-content-lg-between">
                                            <a class="btn btn-sm btn-light d-block d-lg-inline-block mb-1" href="{{ route('password.request') }}">
                                                <i class="fa fa-exclamation-triangle text-muted mr-1"></i> Wachtwoord vergeten
                                            </a>
                                        </p>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero-static col-md-6 d-none d-md-flex align-items-md-center justify-content-md-center text-md-center">
                <div class="p-3">
                    <p class="display-4 font-w700 text-white mb-3">
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
