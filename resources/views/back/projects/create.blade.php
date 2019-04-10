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
                        <form method="post" action="{{ (isset($project) ? route('admin/projects/edit', ['project' => $project]) : route('admin/projects/create')) }}">
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
