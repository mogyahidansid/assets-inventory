<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Notification extends Component
{
    public $userId;
    public $notifModal = false;

    public function mount()
    {
        $this->userId = auth()->user()->id;
    }

    public function markAsRead($id, $notifId)
    {
        $notification = auth()->user()->notifications->where('id', $id)->first();
        $notification->markAsRead();

        if (auth()->user()->role == 1) {
            $this->notifModal = false;
            return redirect()->route('admin.manage-request', ['id' => $notifId]);
        }

        return redirect()->route('employee.request');
    }

    // public function getListeners()
    // {
    //     return [
    //         "echo-private:notification.{$this->userId},RequestNotificationEvent" => '$refresh',
    //     ];
    // }

    public function render()
    {
        return view('livewire.notification');
    }
}
