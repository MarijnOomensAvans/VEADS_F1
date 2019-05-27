@extends('layouts.admin')

@section('content')
    <div class="content">
        <h1>Pagina's beheren <span class="fas fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="Op deze pagina kun je de inhoud van de pagina’s op de website aanpassen. De titels van de tabjes komen overeen met de pagina’s op de website." style="font-size: 0.5em;"></span></h1>
    </div>

    <form method="post" action="{{ action('Backend\EditContentController@update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input type="hidden" name="redirect_url" value="{{ action('Backend\EditContentController@index') }}" />

        <div class="content">
            <div class="block block-rounded block-bordered">
                <ul class="nav nav-tabs nav-tabs-block">
                    @foreach($categories as $i => $category)
                        <li class="nav-item">
                            <a class="nav-link{{ $i == 0 ? ' active' : '' }}" href="#{{ $category->category }}" data-toggle="tab">{{ ucfirst($category->category) }}</a>
                        </li>
                    @endforeach
                </ul>
                <div class="block-content tab-content">
                    @foreach($categories as $i => $category)
                        <div class="tab-pane{{ $i == 0 ? ' active show' : '' }}" id="{{ $category->category }}" role="tabpanel">
                            <h4 class="font-w400">{{ ucfirst($category->category) }}</h4>

                            @foreach($category->content()->orderBy('category')->get() as $content)
                                @switch($content->type)
                                    @case('text')
                                        @component('includes.forms.formgroup', [
                                            'name' => $content->key,
                                            'title' => $content->title,
                                            'prefill' => $content->content ?? ''
                                        ])@endcomponent
                                        @break

                                    @case('textarea')
                                        @component('includes.forms.wysiwyg', [
                                            'name' => $content->key,
                                            'title' => $content->title,
                                            'prefill' => $content->content ?? ''
                                        ])@endcomponent
                                        @break

                                    @case('image')
                                        @component('includes.forms.image', [
                                            'name' => $content->key,
                                            'title' => $content->title,
                                            'pictures' => [getContent($content->key)]
                                        ])@endcomponent
                                        @break

                                    @case('checkbox')
                                        @component('includes.forms.checkbox',[
                                            'name' => $content->key,
                                            'title' => $content->title,
                                            'value' => (bool) $content->content
                                        ])@endcomponent
                                        @break
                                @endswitch
                            @endforeach

                            <div class="text-right">
                                <a href="{{ action('Backend\EditContentController@index') }}" class="btn btn-secondary mb-4 cancel-btn">Annuleren</a>
                                <button type="submit" class="btn btn-primary mb-4">Opslaan</button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </form>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            (function($) {
                $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                    const hash = $(e.target).attr('href');
                    if (history.pushState) {
                        history.pushState(null, null, hash);
                    } else {
                        location.hash = hash;
                    }

                    $('input[name="redirect_url"]').val(window.location.toString());
                    $('.cancel-btn').attr('href', window.location.toString());
                });

                const hash = window.location.hash;
                if (hash) {
                    $('.nav-link[href="' + hash + '"]').tab('show');
                }

                $('.cancel-btn').click(e => {
                    e.preventDefault();

                    window.location.reload();
                });
            })(jQuery)
        });
    </script>
@endpush
