<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Installatiewizard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/wizard.css') }}" />
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Installatiewizard</h1>
                <hr/>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div id="smartwizard" class="sw-main sw-theme-arrows mb-4">
                    <ul class="nav nav-tabs step-anchor">
                        <li class="nav-item flex-fill{{ isset($currentstep) ? ($currentstep == 1 ? ' active' : ($currentstep > 1 ? ' done' : '')) : '' }}"><a href="{{ $currentstep < 1 ? '#' : '/wizard/intro' }}" class="nav-link">Introductie</a></li>
                        <li class="nav-item flex-fill{{ isset($currentstep) ? ($currentstep == 2 ? ' active' : ($currentstep > 2 ? ' done' : '')) : '' }}"><a href="{{ $currentstep < 2 ? '#' : '/wizard/app' }}" class="nav-link">App gegevens</a></li>
                        <li class="nav-item flex-fill{{ isset($currentstep) ? ($currentstep == 3 ? ' active' : ($currentstep > 3 ? ' done' : '')) : '' }}"><a href="{{ $currentstep < 3 ? '#' : '/wizard/database' }}" class="nav-link">Database</a></li>
                        <li class="nav-item flex-fill{{ isset($currentstep) ? ($currentstep == 4 ? ' active' : ($currentstep > 4 ? ' done' : '')) : '' }}"><a href="{{ $currentstep < 4 ? '#' : '/wizard/mail' }}" class="nav-link">Mail</a></li>
                        <li class="nav-item flex-fill{{ isset($currentstep) ? ($currentstep == 5 ? ' active' : ($currentstep > 5 ? ' done' : '')) : '' }}"><a href="{{ $currentstep < 5 ? '#' : '/wizard/facebook' }}" class="nav-link">Facebook</a></li>
                        <li class="nav-item flex-fill{{ isset($currentstep) ? ($currentstep == 6 ? ' active' : ($currentstep > 6 ? ' done' : '')) : '' }}"><a href="{{ $currentstep < 6 ? '#' : '/wizard/instagram' }}" class="nav-link">Instagram</a></li>
                        <li class="nav-item flex-fill{{ isset($currentstep) ? ($currentstep == 7 ? ' active' : ($currentstep > 7 ? ' done' : '')) : '' }}"><a href="{{ $currentstep < 7 ? '#' : '/wizard/mollie' }}" class="nav-link">Mollie</a></li>
                        <li class="nav-item flex-fill{{ isset($currentstep) ? ($currentstep == 8 ? ' active' : ($currentstep > 8 ? ' done' : '')) : '' }}"><a href="{{ $currentstep < 8 ? '#' : '/wizard/analytics' }}" class="nav-link">Analytics</a></li>
                        <li class="nav-item flex-fill{{ isset($currentstep) ? ($currentstep == 9 ? ' active' : ($currentstep > 9 ? ' done' : '')) : '' }}"><a href="{{ $currentstep < 9 ? '#' : '/wizard/done' }}" class="nav-link">Klaar!</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                @yield('content')
            </div>
        </div>

        <div class="row">
            <div class="col-12 text-right">
                @if(isset($prevlink))
                    <a href="{{ $prevlink }}" class="btn btn-secondary">Terug</a>
                @endif

                @if(isset($nextlink))
                    <a href="{{ $nextlink }}" class="btn btn-primary" id="next-btn">Verder</a>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                @yield('footer')
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <hr/>
                <footer class="text-small text-center">
                    <small>Copyright &copy; 2019 Groep F1 van Avans Hogeschool</small>
                </footer>
            </div>
        </div>
    </div>
<script>
    let nextBtn = document.querySelector('#next-btn');
    nextBtn.addEventListener('click', e => {
        e.preventDefault();

        let form = document.querySelector('#main-form');

        if (form) {
            form.submit();
        } else {
            window.location.href = nextBtn.getAttribute('href');
        }
    });
</script>
@stack('scripts')
</body>
</html>
