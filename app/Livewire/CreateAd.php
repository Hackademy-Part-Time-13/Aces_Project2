<?php

namespace App\Livewire;

use App\Models\Ad;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class CreateAd extends Component
{
    use WithFileUploads;
    
    public $temporary_images;
    public $images = [];
    public $ad;

    protected $rules = [
        'images.*'=>'image|max:1024',
        'temporary_images.*'=>'image|max:1024',
    ];

// Personalizzazione messaggi d'errore (consigliato in caso di traduzione in altra lingua)
    protected $messages = [
        'required' => 'Il campo :attribute è richiesto',
        'min' => 'Il campo :attribute è troppo corto',
        'temporary_images.required' => 'Immagine richiesta',
        'temporary_images.*.image' => 'I file devono essere immagini',
        'temporary_images.*.max' => 'Dimensioni massime consentite: 1 MB',
        'images.image' => 'L\'immagine deve essere un file immagine',
        'images.max' => 'Dimensioni massime consentite per l\'immagine: 1 MB',
    ];


    #[Validate('required|max:30')] 
    public $title;

    #[Validate('required|exists:categories,id')] 
    public $selectedCategory;
    
    #[Validate('required|numeric|min:0.01|max:9999.99')] 
    public $price;

    #[Validate('required|max:300')] 
    public $description;

    public function updatedTemporaryImages()
    {
        if ($this->validate([
            'temporary_images.*'=>'image|max:1024',
        ])) {
            foreach ($this->temporary_images as $image) {
                $this->images[] = $image; 
            }
        }
    }

        public function removeImage($key)
        {
            if (in_array($key, array_keys($this->images))) {
                unset($this->images[$key]);
            }
        }

        public function updated($propertyName)
            {
                $this->validateOnly($propertyName);
            }


    public function store()
    {
        $this->validate();   
        
        $newAd = Ad::create(
           ['title' => $this->title,
            'category_id' => $this->selectedCategory,
            'price' => $this->price,
            'description' => $this->description,
            'user_id' => auth()->user()->id,
            'is_approved' => false
            ]);

        if(count($this->images)){
            foreach($this->images as $image){
                $imagePath = $image->store('images', 'public');
                $newAd->images()->create(['path' => $imagePath]);
            }
        }
            
            // pulizia degli input
            $this->title = '';
            $this->selectedCategory = null;
            $this->price = '';
            $this->description = '';
            $this->images = [];
            $this->temporary_images = []; 
            
        

        session()->flash('success', 'Ad created successfully, it will be posted after review');
        
        $this->dispatch('formsubmit')->to('notification-button');

    }

    public function render()
    {
        return view('livewire.create-ad');
    }
}
