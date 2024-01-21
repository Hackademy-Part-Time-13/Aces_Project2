    <div class="px-3 mt-5 col-12 col-lg-9 mx-auto">
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

        <h3 class="my-3">Sell an item</h3>
        <form wire:submit.prevent="store" class="mx-auto">

            <div class="input-group mt-3">            
                <label for="title" class="px-3 input-group-text col-6">Title</label>
                <input type="text" name="title" class="form-control col-6 @error('title') is-invalid @enderror" id="title" placeholder="Most lovely item in the world..." wire:model.blur="title">
                
            </div>
            @error('title') 
                <div class="small text-danger">{{$message}}</div>                
            @enderror 

            <div class="input-group mt-3">
                <span class="input-group-text col-6">Describe your item</span>
                <textarea class="form-control col-6 @error('description') is-invalid @enderror" placeholder="Something amazing..." name="description" wire:model.blur="description"></textarea>
            </div>
            @error('description') 
                <div class="small text-danger">{{$message}}</div>                
            @enderror

            <div class="input-group mt-3">
                <label class="px-3 input-group-text col-6" for="category">Category</label>
                <select class="form-select col-6 @error('selectedCategory') is-invalid @enderror" id="category" name="category" wire:model.blur="selectedCategory">
                <option selected>Select a category</option>              
                    @foreach(\App\Models\Category::all() as $category)
                        <option value={{$category->id}}>{{$category->name}}</option>
                    @endforeach
                </select>            
            </div>
            @error('selectedCategory') 
                <div class="small text-danger">{{$message}}</div>                
            @enderror 

            <div class="input-group mt-3">            
                <label for="price" class="px-3 input-group-text col-6">Price</label>
                <input type="text" name="price" class="form-control col-6 @error('price') is-invalid @enderror" id="price" placeholder="€ 8.99" wire:model.blur="price">
            
            </div>        
            @error('price') 
            <div class="small text-danger">{{$message}}</div>                
            @enderror 
            
            {{-- US 5 Button Img --}}
            <div class="input-group mt-3">
                <input wire:model="temporary_images" type="file" name="images" multiple class="form-control shadow @error('temporary_images.*') is-invalid @enderror"
                    placeholder="Img"/>
                @error('temporary_images.*')
                    <p class="text-danger mt-2">{{$message}}</p>
                @enderror   
            </div>
                @if (!empty($images))
                    <div class="row">
                        <div class="col-12">
                            <p>Photo preview:</p>
                            <div class="row border border-4 border-info rounded shadow py-4">
                                @foreach ($images as $key => $image)
                                    <div class="col my-3">
                                        <div class="img-preview mx-auto shadow rounded" style="background-image: url({{$image->temporaryUrl()}}); background-size: cover; height: 150px;"></div>
                                            <button type="button" class=" btn btn-danger shadow d-block text-center mt-2 mx-auto" wire:click="removeImage({{$key}})">Cancella</button>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            

            {{-- Fine US 5 Button Img --}}
            <button class="btn btn-outline-primary mt-3 col-12" type="submit">Upload</button>

        </form>
    </div>
