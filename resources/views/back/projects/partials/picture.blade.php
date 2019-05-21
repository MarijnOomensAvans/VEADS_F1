<div class="col-md-6 col-lg-4 col-xl-3 animated fadeIn">
    <div class="options-container">
        <img class="img-fluid" src="/image/{{ $picture->path }}/{{ $picture->name }}" />
        <div class="options-overlay bg-black-75">
            <div class="options-overlay-content">
                <h3 class="h4 text-white mb-2">{{ $picture->name }}</h3>
                <h4 class="h6 text-white-75 mb-3">{{ $picture->date->format('d-m-Y') }}</h4>
                <a class="btn btn-sm btn-danger" href="{{ route('admin/projects/image', ['project' => $picture->projects[0], 'image' => $picture]) }}">
                    <i class="fa fa-times mr-1"></i> Verwijderen
                </a>
            </div>
        </div>
    </div>
</div>