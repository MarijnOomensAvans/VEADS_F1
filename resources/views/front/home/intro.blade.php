@if (!empty(strip_tags($intro = getContent('home_intro')->content)))
    <section class="no-padding margin-70px-top">
        <div class="container">
            <div class="row">
                {!! $intro !!}
            </div>
        </div>
    </section>
@endif
