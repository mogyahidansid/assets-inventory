<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Transaction;

class RequestedAsset extends Component
{
    public $open_request = false;
    public $manage_request = [];

    public $fullname, $address, $contact, $assets;
    public function render()
    {
        return view('livewire.admin.requested-asset', [
            'transactions' => Transaction::get(),
        ]);
    }

    public function openRequest($transaction_id)
    {
        $this->open_request = true;
        $this->manage_request = Transaction::where('id', $transaction_id)
            ->with('user')
            ->first();

        $this->fullname =
            $this->manage_request->user->employeeInformation->firstname .
            ' ' .
            $this->manage_request->user->employeeInformation->lastname;
        $this->address =
            $this->manage_request->user->employeeInformation->address;
        $this->contact =
            $this->manage_request->user->employeeInformation->contact;

        $this->assets = $transaction_id;
    }
}
