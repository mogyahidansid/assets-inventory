<?php

namespace App\Http\Livewire\Employee;

use Livewire\Component;
use App\Models\Transaction;

class History extends Component
{
    public function render()
    {
        return view('livewire.employee.history', [
            'transactions' => Transaction::where('user_id', auth()->user()->id)
                ->where('status', 4)
                ->orderBy('created_at', 'desc')
                ->get(),
        ]);
    }
}
