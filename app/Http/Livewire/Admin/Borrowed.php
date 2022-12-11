<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Transaction;
use App\Models\Asset;
use App\Models\RequestTransaction;
use WireUi\Traits\Actions;

class Borrowed extends Component
{
    use Actions;
    public $search;
    public $manage_borrow = false;
    public $transaction_code, $return, $borrowed;
    public $new_remarks = [];
    public $transaction_id;

    public $requests = [];
    public function render()
    {
        return view('livewire.admin.borrowed', [
            'transactions' => Transaction::whereIn('status', [2, 4])
                ->when($this->search, function ($query) {
                    $query->where('transaction_code', $this->search);
                })
                ->get(),
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
            $this->manage_borrow = true;
            $this->transaction_id = $transaction_id;
            $this->transaction_code = $request->transaction_code;
            $this->return = $request->returned_date;
            $this->borrowed = $request->borrowed_date;

            $this->requests = $request->requests->pluck('id');

            // dd($this->requests);
        }
    }

    public function returnAsset()
    {
        $requestTransactions = RequestTransaction::whereIn(
            'asset_id',
            $this->requests
        )->get();

        $assets = Asset::whereIn(
            'id',
            $requestTransactions->pluck('asset_id')
        )->get();
        foreach ($assets as $asset) {
            $asset->update([
                'remarks' => $this->new_remarks[$asset->id],
            ]);
        }
        Transaction::where('id', $this->transaction_id)
            ->first()
            ->update([
                'status' => 4,
            ]);
        $this->manage_borrow = false;
        $this->dialog()->success(
            $title = 'Asset Returned',
            $description = 'Asset has been returned successfully'
        );
    }
}
