@php
    use Carbon\Carbon;
@endphp
<x-main title="{{config('app.name')}} | Profile">
    <div class="row m-3 justify-content-between">
        <div class="col-12 col-md-3 bg-body-tertiary border p-3">
            <h3>Details</h3>
            <p>Full name: {{$user->name}}</p>
            <p>E-mail: {{$user->email}}</p>
            <p>Created: {{$created_at}}</p>

            <h4 class="mt-5">Ads</h4>
            <p>Annunci creati: {{$user->ads()->withTrashed()->count()}}</p>
            <p>Annunci in revisione: {{$user->ads()->where('is_accepted',false)->count()}}</p>
            <p>Annunci accettati: {{$user->ads()->where('is_accepted',true)->count()}}</p>
            <p>Annunci rifiutati: {{$user->ads()->onlyTrashed()->count()}}</p>
        </div>
        <div class="col-12 col-md-6">
            <table class="table table-striped border">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Created</th>
                    <th scope="col">Status</th>
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
                    </tr>
                    @endforeach
                
                </tbody>
              </table>
        </div>
    </div>
</x-main>