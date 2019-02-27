<div class="form-group row">
    <label class="col-sm-{{ $labelSmWidth }} col-lg-{{ $labelLgWidth }} col-form-label" for="street">Adres</label>
    <div class="col-sm-{{ $inputSmWidth / 4 * 2}} col-lg-5">
        <input type="text" name="street" id="street" class="form-control{{ ($errors->has('street') ? ' is-invalid' : '') }}" value="{{ old('street', $address->street ?? '') }}" placeholder="Straat" />
        @if($errors->has('street'))
            <div class="invalid-feedback">
                {{ $errors->first('street') }}
            </div>
        @endif
    </div>
    <div class="col-sm-{{ $inputSmWidth / 4 }} col-lg-2">
        <input type="number" step="1" min="1" name="number" id="number" class="form-control{{ ($errors->has('number') ? ' is-invalid' : '') }}" value="{{ old('number', $address->number ?? '') }}" placeholder="Nummer" />
        @if($errors->has('number'))
            <div class="invalid-feedback">
                {{ $errors->first('number') }}
            </div>
        @endif
    </div>
    <div class="col-sm-{{ $inputSmWidth / 4 }} col-lg-2">
        <input type="text" name="number_modifier" id="number_modifier" class="form-control{{ ($errors->has('number_modifier') ? ' is-invalid' : '') }}" value="{{ old('number_modifier', $address->number_modifier ?? '') }}" placeholder="Toevoeging" />
        @if($errors->has('number_modifier'))
            <div class="invalid-feedback">
                {{ $errors->first('number_modifier') }}
            </div>
        @endif
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-{{ $labelSmWidth }} col-lg-{{ $labelLgWidth }} col-form-label" for="street">Postcode/plaats</label>
    <div class="col-sm-{{ $inputSmWidth / 2 }} col-lg-4">
        <input type="text" name="zipcode" id="zipcode" class="form-control{{ ($errors->has('zipcode') ? ' is-invalid' : '') }}" value="{{ old('zipcode', $address->zipcode ?? '') }}" placeholder="Postcode" v-mask="'####AA'" />
        @if($errors->has('zipcode'))
            <div class="invalid-feedback">
                {{ $errors->first('zipcode') }}
            </div>
        @endif
    </div>
    <div class="col-sm-{{ $inputSmWidth / 2 }} col-lg-5">
        <input type="text" name="city" id="city" class="form-control{{ ($errors->has('city') ? ' is-invalid' : '') }}"  value="{{ old('city', $address->city ?? '') }}" placeholder="Plaats" />
        @if($errors->has('city'))
            <div class="invalid-feedback">
                {{ $errors->first('city') }}
            </div>
        @endif
    </div>
</div>

<div class="form-group row mb-5">
    <label class="col-sm-{{ $labelSmWidth }} col-lg-{{ $labelLgWidth }} col-form-label" for="country">Land</label>
    <div class="col-sm-{{ $inputSmWidth / 2 }} col-lg-{{ $inputLgWidth }}">
        <input type="text" name="country" id="country" class="form-control{{ ($errors->has('country') ? ' is-invalid' : '') }}" value="{{ old('country', $address->country ?? 'Nederland') }}" placeholder="Land" />
        @if($errors->has('country'))
            <div class="invalid-feedback">
                {{ $errors->first('country') }}
            </div>
        @endif
    </div>
</div>