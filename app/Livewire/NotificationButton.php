<?php

namespace App\Livewire;

use App\Models\Ad;
use Livewire\Component;

class NotificationButton extends Component
{
    public $notificationButton;

    public function mount()
    {
        $this->notificationButton = Ad::where('is_accepted', false)->count();
    }

    // public function markAsRead()
    // {
    //     Ad::where('is_accepted',false)->update(['is_accepted'=>false]);
    // }

    public function render()
    {
        return view('livewire.notification-button');
    }
}
