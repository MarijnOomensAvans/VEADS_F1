@extends('layouts.admin')

@section('content')
    <div class="content">
        <h1>Pagina's beheren</h1>
    </div>

    <form method="post" action="{{ action('Backend\EditContentController@update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

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

                            @foreach($category->content()->orderBy('title')->get() as $content)
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
                                <button type="submit" class="btn btn-primary mb-4">Opslaan</button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </form>
@endsection
