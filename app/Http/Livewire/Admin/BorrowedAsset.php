<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Transaction;

class BorrowedAsset extends Component
{
    public $search;
    public $manage_borrow = false;
    public $transaction_code, $return, $borrowed, $purpose;
    public $borrower_id;
    public $new_remarks;
    public $damage_remarks;
    public $transaction_id;
    public $request_id;

    public $requests = [];
    public function render()
    {
        return view('livewire.admin.borrowed-asset', [
            'transactions' => Transaction::whereIn('status', [2, 4])
                ->where('transaction_code', 'like', '%' . $this->search . '%')
                ->orderBy('status', 'asc')
                ->paginate(7),
        ]);
    }

    public function manageBorrow($transaction_id)
    {
        $request = Transaction::where('id', $transaction_id)
            ->with('user')
            ->first();
        if ($request->status == 4) {
            $this->dialog()->show([
                'title' => 'Transaction returned',
                'description' => 'This transaction has been returned',
                'icon' => 'info',
            ]);
        } else {
            $this->request_id = $request->requests->first()->id;
            $this->manage_borrow = true;
            $this->transaction_id = $transaction_id;
            $this->borrower_id = $request->user_id;
            $this->purpose = $request->purpose;
            $this->transaction_code = $request->transaction_code;
            $this->return = $request->returned_date;
            $this->borrowed = $request->borrowed_date;

            $this->requests = $request->requests->pluck('id');
        }
    }
}
