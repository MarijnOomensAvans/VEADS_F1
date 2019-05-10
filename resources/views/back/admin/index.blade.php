@extends('layouts.admin')

@section('content')
<div class="content">
    <h1>Dashboard</h1>
</div>

<div class="content">
    <div class="row">
        <div class="col-md-6 col-xl-3">
            <a class="block block-rounded block-link-shadow bg-primary" href="javascript:void(0)">
                <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                    <div>
                        <i class="fa fa-2x fa-chart-line text-primary-lighter"></i>
                    </div>
                    <div class="ml-3 text-right">
                        <p class="text-white font-size-h3 font-w300 mb-0">
                            {{ $analyticsData['sessions'] }}
                        </p>
                        <p class="text-white-75 mb-0">
                            Bezoekers (7 dagen)
                        </p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection