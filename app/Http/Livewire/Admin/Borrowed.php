<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Transaction;

class Borrowed extends Component
{
    public $search;
    public $manage_borrow = false;
    public $transaction_code, $return, $borrowed;
    public $new_remarks = [];

    public $requests = [];
    public function render()
    {
        return view('livewire.admin.borrowed', [
            'transactions' => Transaction::where('status', 2)
                ->when($this->search, function ($query) {
                    $query->where('transaction_code', $this->search);
                })
                ->get(),
        ]);
    }

    public function manageBorrow($transaction_id)
    {
        $this->manage_borrow = true;
        $request = Transaction::where('id', $transaction_id)
            ->with('user')
            ->first();

        $this->transaction_code = $request->transaction_code;
        $this->return = $request->returned_date;
        $this->borrowed = $request->borrowed_date;

        $this->requests = $request->requests->pluck('id');
    }

    public function returnAsset()
    {
        dd($this->new_remarks);
    }
}
