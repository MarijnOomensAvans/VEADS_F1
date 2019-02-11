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

                                <form method="POST" action="{{ route('password.update') }}">
                                    @csrf

                                    <input type="hidden" name="token" value="{{ $token }}">

                                    <div class="form-group py-3">

                                        <input id="email" type="email" class="form-control form-control-lg form-control-alt{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus placeholder="E-mailadres">

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                            <input id="password" type="password" class="form-control form-control-lg form-control-alt{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Wachtwoord">

                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                    </div>

                                    <div class="form-group">
                                            <input id="password-confirm" type="password" class="form-control form-control-lg form-control-alt" name="password_confirmation" required placeholder="Wachtwoord bevestiging">
                                    </div>

                                    <div class="form-group mb-0">
                                        <button type="submit" class="btn btn-block btn-hero-lg btn-hero-warning">
                                            <i class="fa fa-fw fa-reply mr-1"></i> Wachtwoord resetten
                                        </button>
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
