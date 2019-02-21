@extends('front.master')
@section('content')

<section class="cover-background background-position-top top-space width-80 margin-ten-left border-radius-event" style="background-image: url(&quot;/images/homepage-9-parallax-img5.jpg&quot;); margin-top: 72px; visibility: visible; animation-name: fadeIn;">
    <div class="opacity-medium bg-light-blue"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 display-table page-title-large">
                <div class="display-table-cell vertical-align-middle text-center padding-30px-tb">
                    <h1 class="alt-font text-white font-weight-600 no-margin-bottom">Projecten</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="padding-20px-tb border-bottom border-color-extra-light-gray" style="visibility: visible">
    <div class="container">
        <div class="row">
            <div class="col-md-12 display-table">
                <div class="display-table-cell vertical-align-middle text-left">
                    <div class="breadcrumb alt-font text-small no-margin-bottom">
                        <ul>
                            <li><a href="/" class="text-medium-gray">Home</a></li>
                            <li><a href="/project" class="text-medium-gray">Projecten</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="hover-option4 blog-post-style3" style="visibility: visible; animation-name: fadeIn;">
    <div class="container">
        <div class="row equalize xs-equalize-auto">
            @foreach ($projects as $project)
                <div class="grid-item col-md-4 col-sm-6 col-xs-12 margin-30px-bottom xs-text-center" style="visibility: visible; animation-name: fadeInUp; height: 542px;">
                    <div class="blog-post bg-light-gray inner-match-height">
                        <div class="blog-post-images overflow-hidden position-relative">
                            <a href="/project/{{$project->id}}">
                                @if(count($project->pictures) > 0)
                                    <img src="/image/{{ $project->pictures[0]->path }}/{{ $project->pictures[0]->name }}" data-no-retina="">
                                @endif
                            </a>
                        </div>
                        <div class="post-details padding-40px-all sm-padding-20px-all">
                            <a href="/project/{{$project->id}}" class="alt-font post-title text-medium text-extra-dark-gray width-100 display-block md-width-100 margin-15px-bottom">{{$project->name}}</a>
                            <p>
                                {!! substr(strip_tags($project->description), 0, 100) !!}...
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="col-md-12 col-sm-12 col-xs-12 text-center margin-100px-top sm-margin-50px-top position-relative wow fadeInUp"
        style="visibility: visible; animation-name: fadeInUp;">
        <div class="pagination text-small text-uppercase text-extra-dark-gray">
            @if ($projects->lastPage() > 1)
            <ul>
                <li class="{{ ($projects->currentPage() == 1) ? ' disabled' : '' }}">
                    <a href="{{ $projects->url(1) }}">
                    <i class="fas fa-long-arrow-alt-left margin-5px-right xs-display-none"></i>
                    Prev</a>
                </li>
                @for ($i = 1; $i
                <=$projects->lastPage(); $i++)
                    <li class="{{ ($projects->currentPage() == $i) ? ' active' : '' }}">
                        <a href="{{ $projects->url($i) }}">{{ $i }}</a>
                    </li>
                    @endfor
                    <li class="{{ ($projects->currentPage() == $projects->lastPage()) ? ' disabled' : '' }}">
                        <a href="{{ $projects->url($projects->currentPage()+1) }}">
                            Next<i class="fas fa-long-arrow-alt-right margin-5px-left xs-display-none"></i>
                        </a>
                    </li>
            </ul>
            @endif
        </div>
    </div>
</section>
@endsection