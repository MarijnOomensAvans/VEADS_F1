<div class="form-group row">
    <div class="offset-sm-4 offset-lg-3 col-sm-8 col-lg-9">
        <div class="custom-control custom-switch custom-control-lg mb-2">
            <input type="checkbox" class="custom-control-input" id="{{ $name }}" name="{{ $name }}" {{ isset($value) && $value ? "checked" : '' }} value="1">
            <label class="custom-control-label" for="{{ $name }}">{{ $title }}</label>
        </div>
    </div>
</div>