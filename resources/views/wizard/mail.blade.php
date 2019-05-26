@extends('wizard.master', ['currentstep' => 4, 'nextlink' => '/wizard/facebook', 'prevlink' => '/wizard/database'])

@section('content')
    <p>Bij deze stap vult u de gegevens voor het versturen van mail in.</p>

    @if($errors->has('mail_error'))
        <div class="alert alert-danger">
            {{ $errors->first('mail_error') }}
        </div>
    @endif

    <form method="post" action="/wizard/mail" id="main-form">
        @csrf

        <div class="form-group row">
            <label for="mail_driver" class="col-sm-2 col-form-label{{ $errors->has('mail_driver') ? ' text-danger' : '' }}">Mail driver</label>
            <div class="col-sm-10">
                <select name="mail_driver" id="mail_driver" class="form-control{{ $errors->has('mail_driver') ? ' is-invalid' : '' }}" required>
                    <option value="smtp"{{ old('mail_driver', $details->getMailDriver()) == 'smtp' ? ' selected' : '' }}>SMTP</option>
                    <option value="sendmail"{{ old('mail_driver', $details->getMailDriver()) == 'sendmail' ? ' selected' : '' }}>Sendmail</option>
                </select>
                <small class="form-text text-muted">
                    Dit is de methode waarmee de mail verzonden wordt.
                </small>
                @if($errors->has('mail_driver'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mail_driver') }}
                    </div>
                @endif
            </div>
        </div>

        <div id="smtp-options">
            <div class="form-group row">
                <label for="mail_host" class="col-sm-2 col-form-label{{ $errors->has('db_port') ? ' text-danger' : '' }}">SMTP hostname</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control{{ $errors->has('mail_host') ? ' is-invalid' : '' }}" id="mail_host" name="mail_host" value="{{ old('mail_host', $details->getMailHost()) }}" placeholder="SMTP hostname" />
                    <small class="form-text text-muted">
                        Dit is de hostname van de smtp server.
                    </small>
                    @if($errors->has('mail_host'))
                        <div class="invalid-feedback">
                            {{ $errors->first('mail_host') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="mail_port" class="col-sm-2 col-form-label{{ $errors->has('mail_port') ? ' text-danger' : '' }}">SMTP poort</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control{{ $errors->has('mail_port') ? ' is-invalid' : '' }}" id="mail_port" name="mail_port" value="{{ old('mail_port', $details->getMailPort()) }}" placeholder="SMTP poort" />
                    <small class="form-text text-muted">
                        Dit is de poort om verbinding te maken met de smtp server.
                    </small>
                    @if($errors->has('mail_port'))
                        <div class="invalid-feedback">
                            {{ $errors->first('mail_port') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="mail_username" class="col-sm-2 col-form-label{{ $errors->has('mail_username') ? ' text-danger' : '' }}">SMTP gebruikersnaam</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control{{ $errors->has('mail_username') ? ' is-invalid' : '' }}" id="mail_username" name="mail_username" value="{{ old('mail_username', $details->getMailUsername()) }}" placeholder="SMTP gebruikersnaam" />
                    <small class="form-text text-muted">
                        Dit is de gebruikersnaam om verbinding te maken met de smtp server.
                    </small>
                    @if($errors->has('mail_username'))
                        <div class="invalid-feedback">
                            {{ $errors->first('mail_username') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="mail_password" class="col-sm-2 col-form-label{{ $errors->has('mail_password') ? ' text-danger' : '' }}">SMTP wachtwoord</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control{{ $errors->has('mail_password') ? ' is-invalid' : '' }}" id="mail_password" name="mail_password" value="" placeholder="SMTP wachtwoord" />
                    <small class="form-text text-muted">
                        Dit is het wachtwoord om verbinding te maken met de smtp server.
                    </small>
                    @if($errors->has('mail_password'))
                        <div class="invalid-feedback">
                            {{ $errors->first('mail_password') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="mail_encryption" class="col-sm-2 col-form-label{{ $errors->has('mail_encryption') ? ' text-danger' : '' }}">SMTP encryptie</label>
                <div class="col-sm-10">
                    <select name="mail_encryption" id="mail_encryption" class="form-control{{ $errors->has('mail_encryption') ? ' is-invalid' : '' }}">
                        <option value=""{{ old('mail_encryption', $details->getMailEncryption()) == '' ? ' selected' : '' }}>Geen</option>
                        <option value="tls"{{ old('mail_encryption', $details->getMailEncryption()) == 'tls' ? ' selected' : '' }}>TLS</option>
                    </select>
                    <small class="form-text text-muted">
                        Dit is de soort encryptie die gebruikt wordt om verbinding te maken met de smtp server.
                    </small>
                    @if($errors->has('mail_encryption'))
                        <div class="invalid-feedback">
                            {{ $errors->first('mail_encryption') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="mail_from_address" class="col-sm-2 col-form-label{{ $errors->has('mail_from_address') ? ' text-danger' : '' }}">Afzender mailadres</label>
            <div class="col-sm-10">
                <input type="email" class="form-control{{ $errors->has('mail_from_address') ? ' is-invalid' : '' }}" id="mail_from_address" name="mail_from_address" value="{{ old('mail_from_address', $details->getMailFromAddress()) }}" placeholder="Afzender mailadres" />
                <small class="form-text text-muted">
                    Dit is het mailadres dat gebruikt wordt als verzend adres.
                </small>
                @if($errors->has('mail_from_address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mail_from_address') }}
                    </div>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="mail_from_name" class="col-sm-2 col-form-label{{ $errors->has('mail_from_name') ? ' text-danger' : '' }}">Afzender naam</label>
            <div class="col-sm-10">
                <input type="text" class="form-control{{ $errors->has('mail_from_name') ? ' is-invalid' : '' }}" id="mail_from_name" name="mail_from_name" value="{{ old('mail_from_name', $details->getMailFromName()) }}" placeholder="Afzender naam" />
                <small class="form-text text-muted">
                    Dit is de naam die gebrbuikt wordt als naam van de afzender.
                </small>
                @if($errors->has('mail_from_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mail_from_name') }}
                    </div>
                @endif
            </div>
        </div>
    </form>
@endsection

@push('scripts')
    <script>
        let driverSelect = document.querySelector('#mail_driver');
        let smtpOptions = document.querySelector('#smtp-options');

        if (driverSelect.value === 'smtp') {
            smtpOptions.style.display = 'block';
        } else {
            smtpOptions.style.display = 'none';
        }

        driverSelect.addEventListener('change', e => {
            if (e.target.value === 'smtp') {
                smtpOptions.style.display = 'block';
            } else {
                smtpOptions.style.display = 'none';
            }
        });
    </script>
@endpush
