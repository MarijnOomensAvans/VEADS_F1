<div class="form-group row{{ ($bs3 ?? false) && $errors->has($name) ? ' has-error' : '' }}">
    <label class="col-sm-4 col-lg-3 col-form-label control-label text-sm-right{{ $errors->has($name) ? ' text-danger' : '' }}" for="{{ $name }}">{{ $title }}
        @if(isset($help))
            <span class="fas fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ $help }}"></span>
        @endif
    </label>
    <div class="col-sm-8 col-lg-9">
        <input type="text" name="{{ $name }}" id="{{ $name }}" class="form-control{{ ($errors->has($name) ? ' is-invalid' : '') }}" value="{{ old($name, $prefill ?? '') }}" placeholder="{{ $placeholder ?? $title }}" />
        @if($errors->has($name))
            @if(isset($bs3) && $bs3)
                <span class="help-block">
                    {{ $errors->first($name) }}
                </span>
            @else
                <div class="invalid-feedback">
                    {{ $errors->first($name) }}
                </div>
            @endif
        @endif
    </div>
</div>
