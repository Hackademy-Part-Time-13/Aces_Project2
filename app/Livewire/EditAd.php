<?php

namespace App\Livewire;

use App\Models\Ad;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class EditAd extends Component
{
    use WithFileUploads;
    
    public $temporary_images;
    public $images = [];
    public $ad;
    public $adId;
    
    #[Validate('required|max:30')] 
    public $title;

    #[Validate('required|exists:categories,id')] 
    public $selectedCategory;
    
    #[Validate('required|numeric|min:0.01|max:9999.99')] 
    public $price;

    #[Validate('required|max:300')] 
    public $description;

    public function mount($adId){

        $this->adId = $adId;

        $this->ad = Ad::findOrFail($adId);
        $this->title = $this->ad->title;
        $this->selectedCategory = $this->ad->category->id;
        $this->price = $this->ad->price;
        $this->description = $this->ad->description;
        $this->images = $this->ad->images;
    }

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


    public function updatedTemporaryImages()
    {
        $this->ad = Ad::findOrFail($this->adId);

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

        if ($propertyName === 'temporary_images') {
            $this->update($ad);
        }
    }


    public function update($adId)
    {
        $this->ad = Ad::findOrFail($adId);  
        $this->ad->validate();
    
        $this->ad->update();
    
        if (count($this->images)) {
            foreach ($this->images as $image) {
                $imagePath = $image->store('images', 'public');
                $newAd.images().create(['path' => $imagePath]);
            }
        }
    
        return redirect()->back()->with('success', 'Ad edited successfully, it will be posted after review');
    
        $this->dispatch('formsubmit')->to('notification-button');
    }

    public function render()
    {
        return view('livewire.edit-ad');
    }
}
