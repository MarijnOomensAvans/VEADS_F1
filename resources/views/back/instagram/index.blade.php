@extends('layouts.admin')

@section('content')
    <div class="content">
        <h1>Instagram</h1>
    </div>

    <div class="content">

        <div class="row">
            <div class="col-12 col-md-6">
                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Login Instagram</h3>
                    </div>
                    <div class="block-content pb-4">
                        <a href="{{$instagram_auth_url}}" class="btn btn-primary">Verbinden met Instagram</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6">
                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Verbonden Pages</h3>
                    </div>
                    <div class="block-content pb-1">

                        {{-- Show If Empty --}}
                        @if(count($instagram_pages) == 0)
                            <div class="alert alert-warning" role="alert">
                                <p class="mb-0">Leeg</p>
                            </div>
                        @else
                            <ul>
                                @foreach($instagram_pages as $page)
                                    <li>{{ $page->name }}</li>
                                @endforeach 
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
