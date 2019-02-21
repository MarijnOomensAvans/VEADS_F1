@extends('layouts.admin')

@section('content')
    <div class="content">
        <h1>Vrijwilliger verwijderen</h1>
    </div>

    <div class="content">
        <div class="block block-rounded block-bordered">
            <div class="block-content">
                <div class="row">
                    <div class="col-12">
                        <form method="post" action="{{ route('admin/volunteers/destroy', ['volunteer' => $volunteer]) }}">
                            @csrf
                            <input type="hidden" name="confirm" value="1" />

                            <div class="alert alert-danger">
                                Weet u zeker dat u de vrijwilliger '{{ $volunteer->name }}' wilt verwijderen?<br/>
                                <button type="submit" class="btn btn-danger">Ja</button>
                                <a href="{{ route('admin/volunteers') }}" class="btn btn-secondary">Nee</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection