@extends('layouts.admin')

@section('content')
    <div class="content">
        @if(isset($project))
            <h1>Project aanpassen</h1>
        @else
            <h1>Project toevoegen</h1>
        @endif
    </div>

    <div class="content">
        <div class="block block-rounded block-bordered">
            <div class="block-content">
                <div class="row">
                    <div class="col-12">
                        <form method="post" action="{{ (isset($project) ? route('admin/projects/edit', ['project' => $project]) : route('admin/projects/create')) }}" enctype="multipart/form-data">
                            @csrf

                            @component('includes.forms.formgroup', [
                                'name' => 'name',
                                'title' => 'Project naam',
                                'prefill' => $project->name ?? ''
                            ])@endcomponent

                            @component('includes.forms.wysiwyg', [
                                'name' => 'description',
                                'title' => 'Project omschrijving',
                                'prefill' => $project->description ?? ''
                            ])@endcomponent

                            @include('includes.forms.address', ['address' => (isset($project) ? $project->address: null)])

                            <div class="form-group row mb-5">
                                <label class="col-sm-4 col-lg-3 col-form-label text-sm-right" for="image">Foto's</label>
                                <div class="col-sm-8 col-lg-9">
                                    <input type="file" name="image[]" id="image" accept="image/jpeg,image/jpg,image/png,image/png,image/svg" multiple/>

                                    @if(isset($project) && count($project->pictures))
                                        <div class="row mt-3 items-push img-fluid-100">
                                            @each('back.projects.partials.picture', $project->pictures, 'picture')
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12 text-right">
                                    <a href="{{ route('admin/projects') }}" class="btn btn-secondary">Annuleren</a>
                                    <button type="submit" class="btn btn-primary">Opslaan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
