@if (count($events) > 0 && ((bool) getContent('home_show_events')->content))
    <section class="no-padding margin-70px-top">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-sm-12 col-xs-12 center-col text-center margin-50px-bottom xs-margin-40px-bottom">
                    <div class="position-relative overflow-hidden width-100">
                        <span class="text-small text-outside-line-full alt-font font-weight-600 text-uppercase">{{ getContent('event_title')->content }}</span>
                    </div>
                </div>
            </div>
            <div class="row equalize xs-equalize-auto">
                @foreach ($events as $event)
                    <div class="grid-item col-md-4 col-sm-6 col-xs-12 margin-30px-bottom xs-text-center" style="visibility: visible; animation-name: fadeInUp; height: 542px;">
                        <div class="blog-post bg-light-gray inner-match-height">
                            <div class="blog-post-images overflow-hidden position-relative">
                                <a href="/event/{{$event->id}}">
                                    @if(count($event->pictures) > 0)
                                        <img src="/image/{{ $event->pictures[0]->path }}/{{ $event->pictures[0]->name }}">
                                    @endif
                                </a>
                            </div>
                            <div class="post-details padding-40px-all sm-padding-20px-all">
                                <a href="/event/{{$event->id}}" class="alt-font post-title text-medium text-extra-dark-gray width-100 display-block md-width-100 margin-15px-bottom">{{$event->name}}</a>
                                <p>
                                    {!! substr(strip_tags($event->description), 0, 100) !!}...
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
