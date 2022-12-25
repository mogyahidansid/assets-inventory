<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Asset;

class Ledger extends Component
{
    public function render()
    {
        return view('livewire.admin.ledger', [
            'assets' => Asset::all(),
        ]);
    }
}
