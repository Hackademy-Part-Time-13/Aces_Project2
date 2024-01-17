<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Ad;
use Livewire\Attributes\Validate;

class CreateAd extends Component
{
    #[Validate('required|max:30')] 
    public $title;

    #[Validate('required|exists:categories,id')] 
    public $selectedCategory;
    
    #[Validate('required|numeric|min:0.01')] 
    public $price;

    #[Validate('required|max:300')] 
    public $description;

    public function store()
    {
        $this->validate();   
        
        $newAd = Ad::create(
           ['title' => $this->title,
            'category_id' => $this->selectedCategory,
            'price' => $this->price,
            'description' => $this->description,
            'user_id' => auth()->user()->id]
        );

        // pulizia degli input
        $this->title = '';
        $this->selectedCategory = null;
        $this->price = '';
        $this->description = '';


        session()->flash('success', 'Ad created successfully');

               
    }

    public function render()
    {
        return view('livewire.create-ad');
    }
}
