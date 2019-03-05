@extends('layouts.admin')

@section('content')
    <div class="content">
        <h1>Uitgelichte evenementen</h1>
    </div>

    <form method="post" action="{{ route('admin/events/featured') }}">
        @csrf

        <div class="content">
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="block block-rounded block-bordered">
                        <div class="block-content">
                            @if(isset($events[0]))
                                <h2><a href="{{ route('admin/event', ['event' => $events[0]]) }}">{{ $events[0]->name }}</a></h2>
                            @else
                                <h2>Selecteer een evenement</h2>
                            @endif

                            <div class="mb-3">
                                <event-search-component position="1"{{ isset($events[0]) ? 'event="' . $events[0]->id . '"' : '' }}></event-search-component>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="block block-rounded block-bordered">
                        <div class="block-content">
                            @if(isset($events[1]))
                                <h2><a href="{{ route('admin/event', ['event' => $events[1]]) }}">{{ $events[1]->name }}</a></h2>
                            @else
                                <h2>Selecteer een evenement</h2>
                            @endif

                            <div class="mb-3">
                                <event-search-component position="2"{{ isset($events[1]) ? 'event="' . $events[1]->id . '"' : '' }}></event-search-component>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="block block-rounded block-bordered">
                        <div class="block-content">
                            @if(isset($events[2]))
                                <h2><a href="{{ route('admin/event', ['event' => $events[2]]) }}">{{ $events[2]->name }}</a></h2>
                            @else
                                <h2>Selecteer een evenement</h2>
                            @endif

                            <div class="mb-3">
                                <event-search-component position="3"{{ isset($events[2]) ? 'event="' . $events[2]->id . '"' : '' }}></event-search-component>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Opslaan</button>
                </div>
            </div>
        </div>
    </form>
@endsection
