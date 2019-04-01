@extends('layouts.admin')

@section('content')
    <div class="content">
        <h1>Partner verwijderen</h1>
    </div>

    <div class="content">
        <div class="block block-rounded block-bordered">
            <div class="block-content">
                <div class="row">
                    <div class="col-12">
                        <form method="post" action="{{ route('admin/partners/destroy', ['partner' => $partner]) }}">
                            @csrf
                            <input type="hidden" name="confirm" value="1" />

                            <div class="alert alert-danger">
                                Weet u zeker dat u de partner '{{ $partner->name }}' wilt verwijderen?<br/>
                                <button type="submit" class="btn btn-danger">Ja</button>
                                <a href="{{ route('admin/partners') }}" class="btn btn-secondary">Nee</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
