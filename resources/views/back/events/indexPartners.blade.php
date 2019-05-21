@extends('layouts.admin')

@section('content')
    <div class="content">
        <h1>Partners</h1>
    </div>

    <div class="content">
        <div class="block block-rounded block-bordered">
            <div class="block-content">
              <form action="{{ route('admin/events/partners', ["events"=>$event]) }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <table class="table table-striped table-vcenter">
                            <thead>
                            <tr>
                                <th>Partner naam</th>
                                <th class="text-center" style="width: 150px;">Acties</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($partners->count() < 1)
                                <tr class="table-info">
                                    <td class="text-center" colspan="5">Geen partners gevonden.</td>
                                </tr>
                            @endif
                            @foreach($partners as $partner)
                                <tr>
                                    <td>{{ $partner->name }}</td>
                                    <td class="text-center">
                                          <div class="custom-control custom-switch custom-control-lg mb-2">
                                              <input type="checkbox" class="custom-control-input" id="partner{{ $partner->id }}" name="partners[]" {{ isset($event) && $event->partners->contains($partner) ? "checked" : '' }} value="{{ $partner->id }}">
                                              <label class="custom-control-label" for="partner{{ $partner->id }}"></label>
                                              <span class="fas fa-question-circle" data-toggle="tooltip" data-placement="top" title="Hiermee kun je aangeven of de partner bij het event hoort"></span>
                                          </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="form-group row">
                            <div class="col-12 text-right">
                                <a href="{{ route('admin/events') }}" class="btn btn-secondary">Annuleren</a>
                                <button type="submit" class="btn btn-primary">Opslaan</button>
                            </div>
                        </div>
                    </div>
                </div>
              </form>
            </div>
        </div>
    </div>
@endsection
