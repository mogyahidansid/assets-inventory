<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Transaction;

class RequestedAsset extends Component
{
    public function render()
    {
        return view('livewire.admin.requested-asset', [
            'transactions' => Transaction::get(),
        ]);
    }
}
