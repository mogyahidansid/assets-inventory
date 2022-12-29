<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Asset;
use Livewire\WithPagination;

class Ledger extends Component
{
    use WithPagination;
    public $search;
    public function render()
    {
        return view('livewire.admin.ledger', [
            'assets' => Asset::where(
                'name',
                'like',
                '%' . $this->search . '%'
            )->paginate(10),
        ]);
    }
}
