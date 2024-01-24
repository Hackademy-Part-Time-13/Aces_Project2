@php
    use Carbon\Carbon;
@endphp
<x-main title="{{config('app.name')}} | Profile">
    <div class="row m-3 justify-content-between">
        <div class="col-12 col-md-3 bg-body-tertiary border p-3">
            {{-- accordion --}}
            <div class="accordion accordion-flush" id="accordionExample">
                <div class="accordion-item">
                  <h4 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Account
                    </button>
                  </h4>
                  <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="small accordion-body">
                        <div class="d-flex justify-content-between">
                            <p>Full name: {{$user->name}}</p>
                            
                        </div>
                        
                        <p>E-mail: {{$user->email}}</p>
                        <p>Created: {{$created_at}}</p>
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h4 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      Ads
                    </button>
                  </h4>
                  <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="small accordion-body">
                        <p>Annunci creati: {{$user->ads()->withTrashed()->count()}}</p>
                        <p>Annunci in revisione: {{$user->ads()->where('is_accepted',false)->count()}}</p>
                        <p>Annunci accettati: {{$user->ads()->where('is_accepted',true)->count()}}</p>
                        <p>Annunci rifiutati: {{$user->ads()->onlyTrashed()->count()}}</p>
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h4 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      Accordion Item #3
                    </button>
                  </h4>
                  <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="small accordion-body">
                      <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                    </div>
                  </div>
                </div>
            </div>
           
        </div>
        <div class="col-12 col-md-8">
            <h3>Your ads</h3>
            <table class="table table-striped border">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Created</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($ads as $ad)
                    <tr>
                        <th scope="row">{{$ad->id}}</th>
                        <td>{{$ad->title}}</td>
                        <td>{{$ad->category->name}}</td>
                        <td>{{Carbon::parse($ad->created_at)->diffForHumans()}}</td>
                        <td>
                            @if ($ad->is_accepted)
                                <span class="text-success">Accettato</span>
                            @elseif ($ad->trashed())
                                <span class="text-danger">Rifiutato</span>
                            @else
                                <span class="text-warning">In revisione</span>
                            @endif
                        </td>
                        <td class="d-flex gap-2">
                            <a class="btn btn-warning py-1" href={{route('ad.edit',$ad->id)}}>Edit</a>
                            <form action={{route('ad.delete',$ad->id)}} method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger py-1" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                
                </tbody>
              </table>
        </div>
    </div>
</x-main>