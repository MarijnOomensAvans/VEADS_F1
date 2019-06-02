@if(!empty($url = getContent('home_video_url')->content))
    <section class="no-padding margin-70px-top">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <iframe width="100%" height="500" src="{{ $url }}" frameborder="0" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section>
@endif