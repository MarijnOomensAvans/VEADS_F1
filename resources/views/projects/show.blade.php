@extends('layouts.admin')

@section('content')
    <div class="content">
        <h1>{{ $project->name }}</h1>
    </div>

    <div class="content">
        <div class="block block-rounded block-bordered">
            <div class="block-content">
                <div class="row mb-5">
                    <div class="col-12 col-sm-4"><label>Project omschrijving</label></div>
                    <div class="col-12 col-sm-8">{!! $project->description !!}</div>
                </div>
                <hr/>
                <div class="row mb-3">
                    <div class="col-12 text-right">
                        <div class="btn-group">
                            <a href="{{ route('admin/projects') }}" class="btn btn-sm btn-primary"><span class="fas fa-arrow-left"></span></a>
                            <a href="{{ route('admin/projects/edit', ['project' => $project]) }}" class="btn btn-sm btn-primary"><span class="fas fa-pencil-alt"></span></a>
                            <a href="{{ route('admin/projects/destroy', ['project' => $project]) }}" class="btn btn-sm btn-primary"><span class="fas fa-trash"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection