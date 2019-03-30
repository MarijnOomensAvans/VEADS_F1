@extends('front.master')

@section('content')
    <section class="cover-background background-position-top top-space width-80 margin-ten-left border-radius-event"
             style="background-image: url(&quot;/images/homepage-9-parallax-img5.jpg&quot;); margin-top: 74px; visibility: visible; animation-name: fadeIn;">
        <div class="opacity-medium bg-light-blue"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 display-table page-title-large">
                    <div class="display-table-cell vertical-align-middle text-center padding-30px-tb">
                        <h1 class="alt-font text-white font-weight-600 no-margin-bottom">Contact</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="row">
        <div class="col-md-7 col-sm-12 col-xs-12 center-col text-center margin-100px-bottom xs-margin-40px-bottom">
            <div class="position-relative overflow-hidden width-100">
                <span class="text-small text-outside-line-full alt-font font-weight-600 text-uppercase">Over ons</span>
            </div>
            <p class="text-justify xs-text-center text-medium line-height-28 xs-line-height-26">
                Stichting Veads vindt het belangrijk dat mensen mee tellen en mee kunnen doen ongeacht de omstandigheden
                en financiële positie. Het mag niet zo zijn dat iemand door wat voor omstandigheden dan ook in een
                sociaal isolement raakt. Veads gelooft als je vroegtijdig signaleert dat mensen in een sociaal isolement
                dreigen te raken je meer mensen kan bereiken, dan als je een groep meteen een stempel op drukt in wat
                voor situatie ze verkeren. Niemand wil minderbedeeld of kans arm zijn. Kansrijk is een betere benaming
                die bij iedereen past.
            </p>
        </div>
    </div>




    <div class="row">
        <div class="col-md-7 col-sm-12 col-xs-12 center-col text-center xs-margin-40px-bottom">
            <div class="position-relative overflow-hidden width-100">
                <span class="text-small text-outside-line-full alt-font font-weight-600 text-uppercase">Ons Team</span>
            </div>

            <section class="hover-option4 blog-post-style3" style="visibility: visible; animation-name: fadeIn;">
                <div class="container-fluid">
                    <div class="row equalize xs-equalize-auto">
                        @foreach ($team as $team_member)
                            <div class="grid-item col-md-4 col-sm-6 col-xs-12 margin-30px-bottom xs-text-center"
                                 style="visibility: visible; animation-name: fadeInUp;">
                                <div class="blog-post bg-light-gray">
                                    <div class="post-details padding-40px-all sm-padding-20px-all">
                                        <div class="alt-font post-title text-medium text-extra-dark-gray width-100 display-block md-width-100 margin-15px-bottom">{{$team_member->first_name}} {{$team_member->last_name}}</div>
                                        <p>
                                            {!!$team_member->description!!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </div>

    <div class="row">
        <div class="col-md-7 col-sm-12 col-xs-12 center-col text-center margin-100px-bottom xs-margin-40px-bottom">
            <div class="position-relative overflow-hidden width-100">
                <span class="text-small text-outside-line-full alt-font font-weight-600 text-uppercase">Contactformulier</span>
            </div>

            <div class="block-content">
                <div class="row">
                    <div class="col-12">
                        @if(session()->has('contact_send'))
                            <div class="alert alert-success">
                                {{ session()->get('contact_send') }}
                            </div>
                        @endif

                        <form method="post" action="{{ action('Frontend\ContactController@store') }}"  enctype="multipart/form-data">
                        @csrf
                            @component('includes.forms.formgroup', [
                                'name' => 'name',
                                'title' => 'Naam'
                            ])@endcomponent

                            @component('includes.forms.formgroup', [
                                'name' => 'email',
                                'title' => 'E-mailadres',
                                'placeholder' => 'example@gmail.com'
                            ])@endcomponent

                            <div class="form-group row"><label for="question" class="col-sm-4 col-lg-3 col-form-label">Vraag</label>
                                <div class="col-sm-8 col-lg-9">
                                    <textarea name="question" id="question" placeholder="Vraag" rows="5" class="form-control{{ ($errors->has('question') ? ' is-invalid' : '') }}"></textarea>
                                    @if($errors->has('question'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('question') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12 text-right"><a href="/contact"
                                                                  class="btn btn-secondary">Annuleren</a>
                                    <button type="submit" class="btn btn-primary">Opsturen</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .is-invalid {
            margin-bottom: 0;
        }

        .invalid-feedback {
            color: #a7000e;
        }
    </style>
@endsection