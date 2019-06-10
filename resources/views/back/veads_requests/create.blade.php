@extends('layouts.admin')

@section('content')
    <div class="content">
        @if(isset($request))
            <h1>Advertentie aanpassen</h1>
        @else
            <h1>Advertentie toevoegen</h1>
        @endif
    </div>

    <div class="content">
        <div class="block block-rounded block-bordered">
            <div class="block-content">
                <div class="row">
                    <div class="col-12">
                        @if($errors->has('event_id'))
                            <div class="alert alert-danger">
                                {{ $errors->first('event_id') }}
                            </div>
                        @endif

                        <form method="post" action="{{ (isset($request) ? action('Backend\VeadsRequestController@update', ['veadsRequest' => $request]) : action('Backend\VeadsRequestController@store')) }}">
                            @csrf

                            @if(isset($request))
                                @method('PUT')
                            @endif

                            @component('includes.forms.formgroup', [
                                'name' => 'title',
                                'title' => 'Advertentie titel',
                                'prefill' => $request->title ?? ''
                            ])@endcomponent

                            <div class="form-group row mb-5">
                                <label class="col-sm-4 col-lg-3 col-form-label text-sm-right" for="type">Advertentie type</label>
                                <div class="col-sm-8 col-lg-9">
                                    <select name="type" id="type" class="form-control">
                                        <option value="">Selecteer een advertentie type</option>
                                        <option value="product"{{ old('type', $request->type ?? '') == 'product' ? ' selected' : '' }}>Product</option>
                                        <option value="service"{{ old('type', $request->type ?? '') == 'service' ? ' selected' : '' }}>Dienst</option>
                                        <option value="vacancy"{{ old('type', $request->type ?? '') == 'vacancy' ? ' selected' : '' }}>Vacature voor vrijwilliger</option>
                                    </select>
                                </div>
                            </div>

                            @component('includes.forms.wysiwyg', [
                                'name' => 'description',
                                'title' => 'Advertentie omschrijving',
                                'prefill' => $request->description ?? '',
                                'style' => 'display: none;'
                            ])@endcomponent



                            <div class="form-group row mb-5 containers" style="display: none;" id="container-project">
                                <label class="col-sm-4 col-lg-3 col-form-label text-sm-right" for="">Project</label>
                                <div class="col-sm-8 col-lg-9">
                                    <project-search-component project="{{ old('project_id', $request->project_id ?? '') }}"></project-search-component>
                                </div>
                            </div>

                            <div class="form-group row mb-5 containers" style="display: none;" id="container-event">
                                <label class="col-sm-4 col-lg-3 col-form-label text-sm-right" for="">Evenement</label>
                                <div class="col-sm-8 col-lg-9">
                                    <select name="event_id" class="form-control">
                                        @if(isset($request))
                                            @foreach($events as $event)
                                                <option value="{{$event->id}}"{{ old('id', $event->id ?? '') == $request->event_id ? ' selected' : '' }}>{{$event->name}}</option>
                                            @endforeach
                                        @else
                                            @foreach($events as $event)
                                                <option value="{{$event->id}}">{{$event->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-5 containers" style="display: none;" id="container-amount">
                                <label class="col-sm-4 col-lg-3 col-form-label text-sm-right" for="amount">Gevraagd aantal
                                    <span class="fas fa-question-circle" data-toggle="tooltip" data-placement="top" title="Door dit getal om 0 te zetten zal er op de website 'Zo veel mogelijk' komen te staan."></span>
                                </label>
                                <div class="input-group col-sm-8 col-lg-9">
                                    <input type="number" step="1" min="0" max="9999.99 " name="amount" id="amount" class="form-control{{ ($errors->has('amount') ? ' is-invalid' : '') }}" value="{{ old('amount', $request->amount ?? '0') }}" />
                                </div>
                                @if($errors->has('amount'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('amount') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group row containers" style="display: none;" id="container-actions">
                                <div class="col-12 text-right">
                                    <a href="{{ action('Backend\VeadsRequestController@index') }}" class="btn btn-secondary">Annuleren</a>
                                    <button type="submit" class="btn btn-primary">Opslaan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            (function($) {
                handleChange();

                $('#type').change(handleChange);

                function handleChange() {
                    hideAllContainers();

                    const target = $('#type');
                    const value = target.val();

                    switch(value) {
                        case 'product':
                            showContainer('description');
                            // showContainer('project');
                            showContainer('event');
                            showContainer('amount');
                            showContainer('actions');
                            break;

                        case 'service':
                            showContainer('description');
                            // showContainer('project');
                            showContainer('event');
                            showContainer('actions');
                            break;

                        case 'vacancy':
                            showContainer('event');
                            showContainer('actions');
                            break;
                    }
                }

                function hideAllContainers() {
                    $('.containers').hide();
                }

                function showContainer(name) {
                    $(`#container-${name}`).show();
                }
            })(jQuery);
        });
    </script>
@endpush
