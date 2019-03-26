@extends('layouts.admin')

@section('content')
    <div class="content">
        <h1>{{ $partner->name }}</h1>
    </div>

    <div class="content">
        <div class="block block-rounded block-bordered">
            <div class="block-content">
                <div class="row mb-3">
                    <div class="col-12 col-sm-4"><label>Partner link</label></div>
                    <div class="col-12 col-sm-8"><a href="{{$partner->link}}">{!! $partner->link !!}</a></div>
                </div>
                <hr/>

                    <div class="row">
                        <div class="col-12">
                            <label>Foto's</label>
                        </div>
                    </div>

                    <div class="row mb-3 items-push img-fluid-100">
                      <div class="col-md-6 col-lg-4 col-xl-3 animated fadeIn">
                          <div class="options-container">
                              <img class="img-fluid" src="/image/{{ $partner->picture->path }}/{{ $partner->picture->name }}" />
                              <div class="options-overlay bg-black-75">
                                  <div class="options-overlay-content">
                                      <h3 class="h4 text-white mb-2">{{ $partner->picture->name }}</h3>
                                      <h4 class="h6 text-white-75 mb-3">{{ $partner->picture->date->format('d-m-Y') }}</h4>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
                    <hr/>

                <div class="row mb-3">
                    <div class="col-12 text-right">
                        <div class="btn-group">
                            <a href="{{ route('admin/partners') }}" class="btn btn-sm btn-primary"><span class="fas fa-arrow-left"></span></a>
                            <a href="{{ route('admin/partners/edit', ['partner' => $partner]) }}" class="btn btn-sm btn-primary"><span class="fas fa-pencil-alt"></span></a>
                            <a href="{{ route('admin/partners/destroy', ['partner' => $partner]) }}" class="btn btn-sm btn-primary"><span class="fas fa-trash"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
