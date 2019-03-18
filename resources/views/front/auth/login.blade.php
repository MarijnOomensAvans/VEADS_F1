@extends('front.master')

@section('content')

<section class="wow fadeIn" id="start-your-project" style="visibility: visible; animation-name: fadeIn;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12 center-col margin-eight-bottom sm-margin-40px-bottom xs-margin-30px-bottom text-center last-paragraph-no-margin">
                <h5 class="alt-font font-weight-700 text-extra-dark-gray text-uppercase">tell us about your project</h5>
            </div>
        </div>
        <form id="project-contact-form" action="javascript:void(0)" method="post">
            <div class="row">
                <div class="col-md-6">
                    <input type="text" name="name" id="name" placeholder="Name *" class="big-input">
                </div>
                
            </div>

            <div class="row">
                <div class="col-md-6">
                    <input type="text" name="phone" id="phone" placeholder="Phone" class="big-input">
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-transparent-dark-gray btn-large margin-20px-top">inloggen</button>
                </div>
            </div>
        </form>
    </div>
</section>

@endsection

