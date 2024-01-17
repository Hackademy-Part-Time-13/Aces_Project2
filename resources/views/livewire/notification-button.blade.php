<div>
    <a href="{{route('revisor.index')}}" class="btn btn-outline-danger position-relative" aria-current="page" wire:click="mount">
        Zona revisore
        @if ($notificationButton > 0)
            <span \class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                {{ $notificationButton }}
                <span class="visually-hidden">Nuovi Annunci</span>
            </span>
        @endif
    </a>
</div>