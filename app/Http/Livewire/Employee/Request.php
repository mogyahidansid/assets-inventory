<?php

namespace App\Http\Livewire\Employee;

use Livewire\Component;
use App\Models\Transaction;

class Request extends Component
{
    public function render()
    {
        return view('livewire.employee.request', [
            'transactions' => Transaction::where(
                'user_id',
                auth()->user()->id
            )->get(),
        ]);
    }
}
