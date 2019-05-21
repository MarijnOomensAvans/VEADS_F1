<div class="form-group row containers" style="{{ $style ?? '' }}" id="container-{{ $name }}">
    <label class="col-sm-4 col-lg-3 col-form-label text-sm-right{{ $errors->has($name) ? ' text-danger' : '' }}" for="{{ $name }}">{{ $title }}</label>
    <div class="col-sm-8 col-lg-9">
        <textarea class="form-control{{ ($errors->has($name) ? ' is-invalid' : '') }}" name="{{ $name }}" id="{{ $name }}" rows="15" placeholder="{{ $title }}">{{ old($name, $prefill ?? '') }}</textarea>
        @if($errors->has($name))
            <div class="invalid-feedback">
                {{ $errors->first($name) }}
            </div>
        @endif
    </div>
</div>

@push('scripts')
    <link rel="stylesheet" type="text/css" href="{{ asset('js/plugins/summernote/summernote-bs4.css') }}" />
    <script src="{{ asset('js/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('js/plugins/summernote/summernote-nl-NL.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            $('#{{ $name }}').summernote({
                lang: 'nl-NL',
                height: 300,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['fontsize', ['fontsize']],
                    ['para', ['ol', 'ul']],
                    ['misc', ['undo', 'redo']]
                ],
                placeholder: '{{ $title }}'
            });
        });
    </script>
@endpush