@extends('front.master')

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 center-col text-center margin-40px-top margin-80px-bottom xs-margin-40px-bottom">
                    <div class="position-relative overflow-hidden width-100">
                        <span class="text-extra-large text-outside-line-full alt-font font-weight-800">{{ getContent('veads_request_title')->content }}</span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-md-4 margin-20px-bottom">
                    <form method="get" action="">
                        <input type="text" name="q" value="{{ $q }}" placeholder="Zoeken naar advertentie" />
                    </form>
                </div>

                <div class="col-xs-12 col-md-8">
                    <a href="{{ $product_url }}" class="btn btn-primary{{ request('type') == 'product' ? ' active' : '' }}">Producten</a>
                    <a href="{{ $service_url }}" class="btn btn-primary{{ request('type') == 'service' ? ' active' : '' }}">Diensten</a>
                    <a href="{{ $vacancy_url }}" class="btn btn-primary{{ request('type') == 'vacancy' ? ' active' : '' }}">Vrijwilligers</a>
                    <a href="{{ $reset_url }}" class="btn btn-secondary">Reset filter</a>
                </div>
            </div>

            <div class="row">
                @if(count($requests) < 1)
                    <div class="alert alert-info">
                        Momenteel is VEADS niet opzoek. Bedankt voor je interesse!
                    </div>
                @endif

                @foreach($requests as $request)
                <div class="col-xs-12 col-md-3">
                    <div class="blog-post inner-match-height border-radius-10" style="background-color: #d8f3ff">
                        <div class="post-details padding-40px-all sm-padding-20px-all">
                            @if($request->type === 'vacancy')
                                <a href="/inschrijvenvrijwilliger?event_id={{$request->event->id}}" class="text-center alt-font post-title text-medium text-extra-dark-gray width-100 display-block md-width-100 margin-15px-bottom">{{$request->title}}</a>
                                <p>
                                    {!! substr(strip_tags($request->event->description), 0, 100) !!}...
                                </p>
                            @else
                                <a href="/veads-zoekt/{{$request->id}}" class="text-center alt-font post-title text-medium text-extra-dark-gray width-100 display-block md-width-100 margin-15px-bottom">{{$request->title}}</a>
                                <p>
                                    {!! substr(strip_tags($request->description), 0, 100) !!}...
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="row">
                <div class="col-xs-12">
                    {{ $requests->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection