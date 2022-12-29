<?php

namespace App\Http\Livewire\Employee;

use Livewire\Component;
use App\Models\Transaction;

class Request extends Component
{
    public $filter_id;
    public function render()
    {
        return view('livewire.employee.request', [
            'transactions' => Transaction::where('user_id', auth()->user()->id)
                ->where('status', 1)
                ->when($this->filter_id, function ($query) {
                    $query->where('status', $this->filter_id);
                })
                ->get(),
        ]);
    }
}
