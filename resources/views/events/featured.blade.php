@extends('layouts.admin')

@section('content')
    <div class="content">
        <h1>Uitgelichte evenementen</h1>
    </div>

    <form method="post" action="{{ route('admin/events/featured') }}">
        @csrf

        <div class="content">
            <div class="row">
                @for($i = 0; $i < 3; $i++)
                    <div class="col-12 col-md-4">
                        <div class="block block-rounded block-bordered">
                            <div class="block-content">
                                @if(isset($events[$i]))
                                    <h2><a href="{{ route('admin/event', ['event' => $events[$i]]) }}">{{ $events[$i]->name }}</a></h2>
                                @else
                                    <h2>Selecteer een evenement</h2>
                                @endif

                                <div class="mb-3">
                                    <event-search-component position="{{ $i + 1 }}" published="1"{{ isset($events[$i]) ? ' event="' . $events[$i]->id . '"' : '' }}></event-search-component>
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
