<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Notification extends Component
{
    public $userId;

    public function mount()
    {
        $this->userId = auth()->user()->id;
    }

    public function getListeners()
    {
        return [
            "echo-private:requestNotif.{$this->userId},RequestNotificationEvent" => '$refresh',
        ];
    }

    public function render()
    {
        return view('livewire.notification');
    }
}
