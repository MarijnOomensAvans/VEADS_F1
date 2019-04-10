@extends('layouts.admin')

@section('content')
    <div class="content">
        <h1>Evenement foto verwijderen</h1>
    </div>

    <div class="content">
        <div class="block block-rounded block-bordered">
            <div class="block-content">
                <div class="row">
                    <div class="col-12">
                        <form method="post" action="{{ route('admin/events/image', ['event' => $event, 'image' => $picture]) }}">
                            @csrf
                            <input type="hidden" name="confirm" value="1" />

                            <div class="alert alert-danger">
                                Weet u zeker dat u de evenement foto wilt verwijderen?<br/>
                                <button type="submit" class="btn btn-danger">Ja</button>
                                <a href="{{ route('admin/event', ['event' => $event]) }}" class="btn btn-secondary">Nee</a>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-12">
                        <img class="img-fluid" src="/image/{{ $picture->path }}/{{ $picture->name }}" />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection