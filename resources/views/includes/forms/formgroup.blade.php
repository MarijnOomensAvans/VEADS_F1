<div class="form-group row">
    <label class="col-sm-4 col-lg-3 col-form-label text-sm-right" for="{{ $name }}">{{ $title }}</label>
    <div class="col-sm-8 col-lg-9">
        <input type="text" name="{{ $name }}" id="{{ $name }}" class="form-control{{ ($errors->has($name) ? ' is-invalid' : '') }}" value="{{ old($name, $prefill ?? '') }}" placeholder="{{ $title }}" />
        @if($errors->has($name))
            <div class="invalid-feedback">
                {{ $errors->first($name) }}
            </div>
        @endif
    </div>
</div>
