<x-main>
  {{-- novità --}}
  <div class="mb-2 d-flex justify-content-between align-items-center">
    <h4>Last items</h4>
    <a class="see-all p-2" href="{{route('ads.news')}}">See all</a>
  </div>

  <div class="row">
    @forelse($last_ads as $last_ad)
      <x-card :ad="$last_ad"/>
    @empty
      <p class="fst-italic">Sorry, no items found here.</p>
    @endforelse
  </div>

  {{-- più popolari (liked) --}}
  <div class="mb-2 mt-4 d-flex justify-content-between align-items-center">
    <h4>Most popular</h4>
    <a class="see-all p-2" href="{{route('ads.popular')}}">See all</a>
  </div>

  <div class="row">
    @forelse($popular_ads as $popular_ad)
      <x-card :ad="$popular_ad"/>
    @empty
      <p class="fst-italic">Sorry, no items found here.</p>
    @endforelse
  </div>
    
</x-main>