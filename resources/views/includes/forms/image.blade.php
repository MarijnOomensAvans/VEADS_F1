<div class="form-group row">
    <label class="col-sm-4 col-lg-3 col-form-label text-sm-right" for="{{ $name }}">{{ $title }}</label>
    <div class="col-sm-8 col-lg-9">
        <input type="file" name="{{ $name }}" id="{{ $name }}" accept="image/jpeg,image/jpg,image/png,image/png,image/svg" {{ isset($multiple) && $multiple ? 'multiple' : '' }} />

        @if(isset($pictures) && count($pictures))
            <div class="row mt-3 items-push img-fluid-100">
                @foreach($pictures as $picture)
                    @if(empty($picture)) @continue @endif
                    <div class="col-md-6 col-lg-4 col-xl-3 animated fadeIn">
                        <div class="options-container">
                            <img class="img-fluid" src="/image/{{ $picture->path }}/{{ $picture->name }}" />
                            <div class="options-overlay bg-black-75">
                                <div class="options-overlay-content">
                                    <h3 class="h4 text-white mb-2">{{ $picture->name }}</h3>
                                    <h4 class="h6 text-white-75 mb-3">{{ $picture->date->format('d-m-Y') }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>