<x-main>
  
  <div class="mb-2 d-flex justify-content-between align-items-center">
    <h4>Our last items</h4>
    <a class="see-all p-2" href="{{route('ads.index')}}">See all</a>
  </div>

  <div class="row">
    @forelse($ads as $ad)
      <x-card :ad="$ad"/>
    @empty
      <p class="fst-italic">Sorry, no items found here.</p>
    @endforelse
  </div>
    
</x-main>