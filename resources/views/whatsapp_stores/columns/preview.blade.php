<a class="fs-6 text-decoration-none mt-1 text-primary" href="{{ route('whatsapp.store.show', $row->url_alias) }}"
    target="_blank">
    {{ url(route('whatsapp.store.show', $row->url_alias)) }}
    <img src="{{ asset('images/new-tab.svg') }}" width="16px" height="16px"
        style="filter: invert(30%) sepia(94%) saturate(747%) hue-rotate(200deg);">
</a>