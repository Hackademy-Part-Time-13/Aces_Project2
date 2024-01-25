<x-main>
  {{-- novità --}}
  <div class="mb-2 d-flex justify-content-between align-items-center">
    <h4>{{__('ui.last_items')}}</h4>
    <a class="see-all p-2" href="{{route('ads.news')}}">{{__('ui.see_all')}}</a>
  </div>

  <div class="row">
    @forelse($last_ads as $last_ad)
      <x-card :ad="$last_ad"/>
    @empty
      <p class="fst-italic">{{__('ui.no_items')}}</p>
    @endforelse
  </div>

  {{-- più popolari (liked) --}}
  <div class="mb-2 mt-4 d-flex justify-content-between align-items-center">
    <h4>{{__('ui.popular')}}</h4>
    <a class="see-all p-2" href="{{route('ads.popular')}}">{{__('ui.see_all')}}</a>
  </div>

  <div class="row">
    @forelse($popular_ads as $popular_ad)
      <x-card :ad="$popular_ad"/>
    @empty
      <p class="fst-italic">{{__('ui.no_items')}}</p>
    @endforelse
  </div>
    
</x-main>