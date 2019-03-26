@extends('layouts.admin')

@section('content')
    <div class="content">
        <h1>{{ $partner->name }}</h1>
    </div>

    <div class="content">
        <div class="block block-rounded block-bordered">
            <div class="block-content">
                <div class="row mb-3">
                    <div class="col-12 col-sm-4"><label>Partner link</label></div>
                    <div class="col-12 col-sm-8">{!! $partner->link !!}</div>
                </div>
                <hr/>

                @if(count($partner->pictures))
                    <div class="row">
                        <div class="col-12">
                            <label>Foto's</label>
                        </div>
                    </div>

                    <div class="row mb-3 items-push img-fluid-100">
                        @each('partners.partials.picture', $partner->pictures, 'picture')
                    </div>
                    <hr/>
                @endif

                <div class="row mb-3">
                    <div class="col-12 text-right">
                        <div class="btn-group">
                            <a href="{{ route('admin/partners') }}" class="btn btn-sm btn-primary"><span class="fas fa-arrow-left"></span></a>
                            <a href="{{ route('admin/partners/edit', ['partner' => $partner]) }}" class="btn btn-sm btn-primary"><span class="fas fa-pencil-alt"></span></a>
                            <a href="{{ route('admin/partners/destroy', ['partner' => $partner]) }}" class="btn btn-sm btn-primary"><span class="fas fa-trash"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
