<?php

namespace App\View\Components;

use Closure;
use App\Models\Ad;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class card extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public Ad $ad)
    {
        
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card');
    }
}
