<div>
    <i role="button" class="d-inline @if($isFavourite)fa-solid @else fa-regular @endif fa-heart mb-3 ms-3 text-danger" wire:click="toggleFavAd"></i>
    <p class="small text-danger d-inline">{{$count}}</p>
</div>