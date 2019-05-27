<div class="form-group row">
    <label class="col-sm-4 col-lg-3 col-form-label control-label text-sm-right" for="homepage_order">Volgorde</label>
    <div class="col-sm-8 col-lg-9">
        <ul class="list-group sortable">
            @foreach($components as $component)
                <li class="list-group-item" data-component="{{ $component }}">
                    <span class="fas fa-grip-lines"></span>
                    @switch($component)
                        @case('intro')
                        Intro tekst
                        @break

                        @case('partners')
                        Uitgelichte partners
                        @break

                        @case('socialmedia')
                        Social media posts
                        @break

                        @case('events')
                        Uitgelichte evenementen
                        @break

                        @case('youtube')
                        Video
                        @break

                        @case('allpartners')
                        Carrousel met alle partners
                        @break
                    @endswitch
                </li>
            @endforeach
        </ul>
    </div>
</div>

@push('scripts')
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/cowboy/jquery-throttle-debounce@1.1/jquery.ba-throttle-debounce.min.js"></script>
    <script>
        $('.sortable').sortable({
            change: $.debounce(500, function() {
                var els = $('.sortable .list-group-item');
                var components = [];

                for(var i = 0; i < els.length; i++) {
                    components.push($(els[i]).attr('data-component'));
                }

                fetch('/admin/edit_content/homepage_order', {
                    method: 'POST',
                    body: JSON.stringify({components: components}),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'Content-Type': 'application/json'
                    }
                }).then(response => {
                    console.log(response);

                    var alert = document.createElement('div');
                    alert.classList.add('alert');
                    alert.classList.add('alert-success');
                    alert.classList.add('mt-3');
                    alert.innerText = "De wijzigingen aan de homepagina volgorde zijn opgeslagen.";

                    document.querySelector('.sortable').parentElement.appendChild(alert);

                    setTimeout(() => {
                        alert.remove();
                    }, 3000);
                });
            })
        });
    </script>
@endpush