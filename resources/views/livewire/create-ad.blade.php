<div>
    <div class="row mt-3">
        <div class="col-12">
            @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{session('success')}}
            </div>
            @endif

            @if(session()->has('error'))
            <div class="alert alert-danger" role="alert">
                {{session('error')}}
            </div>
            @endif
        </div>
    </div>

    <h1 class="text-center my-3">Create new announcement</h1>
    <form wire:submit.prevent="store" class="col-12 col-md-8 col-lg-6 mx-auto">

        <div class="input-group mt-3">            
            <label for="title" class="px-3 input-group-text">Title</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Most lovely item in the world..." wire:model.blur="title">
            @error('title') 
              <div class="small text-danger">{{$message}}</div>                
            @enderror 
        </div>

        <div class="input-group mt-3">
            <label class="px-3 input-group-text" for="category">Category</label>
            <select class="form-select @error('selectedCategory') is-invalid @enderror" id="category" name="category" wire:model.blur="selectedCategory">
              <option selected>Choose category</option>              
                @foreach(\App\Models\Category::all() as $category)
                    <option value={{$category->id}}>{{$category->name}}</option>
                @endforeach
            </select>            
        </div>
        @error('selectedCategory') 
            <div class="small text-danger">{{$message}}</div>                
        @enderror 

        <div class="input-group mt-3">            
            <label for="price" class="px-3 input-group-text">Price</label>
            <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="8,99" wire:model.blur="price">
            @error('price') 
              <div class="small text-danger">{{$message}}</div>                
            @enderror 
        </div>

        <div class="input-group mt-3">
            <span class="input-group-text">Description</span>
            <textarea class="form-control @error('description') is-invalid @enderror" placeholder="Something amazing..." name="description" wire:model.blur="description"></textarea>
            @error('description') 
              <div class="small text-danger">{{$message}}</div>                
            @enderror
        </div>

        <button class="btn btn-outline-primary mt-3 col-12" type="submit">Publish</button>

    </form>
</div>
