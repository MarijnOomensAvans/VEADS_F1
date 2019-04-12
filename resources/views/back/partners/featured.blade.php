@extends('layouts.admin')

@section('content')
    <div class="content">
        <h1>Uitgelichte partners</h1>
    </div>

    <form method="post" action="{{ route('admin/partners/featured') }}">
        @csrf

        <div class="content">
            <div class="row">
                @for($i = 0; $i < 3; $i++)
                    <div class="col-12 col-md-4">
                        <div class="block block-rounded block-bordered">
                            <div class="block-content">
                                @if(isset($partners[$i]))
                                    <h2><a href="{{ route('admin/partner', ['partner' => $partners[$i]]) }}">{{ $partners[$i]->name }}</a></h2>
                                @else
                                    <h2>Selecteer een partner</h2>
                                @endif

                                <div class="mb-3">
                                    <partner-search-component position="{{ $i + 1 }}" {!! isset($partners[$i]) ? ' partner="' . $partners[$i]->id . '"' : '' !!}></partner-search-component>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>

            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Opslaan</button>
                </div>
            </div>
        </div>
    </form>
@endsection
