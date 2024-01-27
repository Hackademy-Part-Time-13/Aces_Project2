<?php

namespace App\Livewire;

use App\Models\Ad;
use App\Models\Image;
use Livewire\Component;
use App\Models\Category;
use App\Jobs\ResizeImage;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\File;

class EditAd extends Component
{
    use WithFileUploads;
    
    public $ad;
    public $temporary_images;
    public $existingImages = [];
    public $newImages = [];

    
    #[Validate('required|max:30')] 
    public $title;

    #[Validate('required|exists:categories,id')] 
    public $selectedCategory;
    
    #[Validate('required|numeric|min:0.01|max:9999.99')] 
    public $price;

    #[Validate('required|max:300')] 
    public $description;

    protected $rules = [
        'existingImages.*'=>'image|max:3600',
        'newImages.*'=>'image|max:3600',
        'temporary_images.*'=>'image|max:3600',
    ];

    protected $messages = [
        'required' => 'Il campo :attribute è richiesto',
        'min' => 'Il campo :attribute è troppo corto',
        'temporary_images.required' => 'Immagine richiesta',
        'temporary_images.*.image' => 'I file devono essere immagini',
        'temporary_images.*.max' => 'Dimensioni massime consentite: 1 MB',
        'images.image' => 'L\'immagine deve essere un file immagine',
        'images.max' => 'Dimensioni massime consentite per l\'immagine: 1 MB',
    ];

    public function mount(Request $request){
        
        $this->ad= $request->route()->parameter('ad');
        $this->title = $this->ad->title;
        $this->selectedCategory = $this->ad->category->id;
        $this->price = $this->ad->price;
        $this->description = $this->ad->description;
        $this->existingImages = $this->ad->images;
        
    }    

    public function updatedTemporaryImages()
    {
        if ($this->validate([
            'temporary_images.*'=>'image|max:3000',
        ])) {
            foreach ($this->temporary_images as $image) {
                $this->newImages[] = $image;
            }
        }
    }

    // rimuovi nuove immagini
    public function removeImage($key)
    {
        if (in_array($key, array_keys($this->newImages))) {
            unset($this->newImages[$key]);
        }
    }

    public function removeExistingImage($imageId)
    {
        $image = Image::find($imageId);
        if ($image) {
            File::delete(storage_path('app/' . $image->path));
            $image->delete(); // Elimina il record dal database
        }

        // Aggiorna l'array delle immagini esistenti per riflettere la modifica
        $this->existingImages = $this->ad->images()->get();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function update()
    {
        // $this->validate();  

        $this->ad->title = $this->title;
        $this->ad->description = $this->description;
        $this->ad->price = $this->price;
        $this->ad->category_id = $this->selectedCategory;
        $this->ad->is_accepted = false;
        $this->ad->save();

        // Caricamento delle nuove immagini
        if(count($this->newImages)){
            foreach($this->newImages as $newImage){
                
                $newFileName = "ads/{$this->ad->id}";
                $newImage = $this->ad->images()->create(['path'=>$newImage->store($newFileName, 'public')]);

                dispatch(new ResizeImage($newImage->path, 200 , 200));
            }

            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }
                       
        return redirect()->route('profile')->with('success', 'Ad edited successfully, it will be posted after review');
    
        $this->dispatch('formsubmit')->to('notification-button');
    }

    public function render()
    {
        return view('livewire.edit-ad');
    }
}
