<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Transaction;
use App\Models\Asset;
use App\Models\RequestTransaction;
use WireUi\Traits\Actions;
use App\Models\returnAsset;
use Livewire\WithPagination;

class Borrowed extends Component
{
    use Actions;
    use WithPagination;
    public $search;
    public $manage_borrow = false;
    public $transaction_code, $return, $borrowed, $purpose;
    public $borrower_id;
    public $new_remarks = [];
    public $damage_remarks = [];
    public $transaction_id;
    public $request_id;

    public $requests = [];
    public function render()
    {
        return view('livewire.admin.borrowed', [
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

            // dd($request->requests);
        }
    }

    public function returnAsset()
    {
        $requestTransactions = RequestTransaction::where(
            'asset_id',
            $this->request_id
        )->get();

        $assets = Asset::whereIn(
            'id',
            $requestTransactions->pluck('asset_id')
        )->get();
        // galoop ka sa assets diri, pero di man abi tanan nga assets ara didto sa array
        // dd($this->new_remarks, $assets);
        foreach ($assets as $asset) {
            if (
                $this->new_remarks[$asset->id] == 4 ||
                $this->new_remarks[$asset->id] == 5 ||
                $this->new_remarks[$asset->id] == 6
            ) {
                $asset->update([
                    'remarks' => $this->new_remarks[$asset->id],
                    'reason' => $this->damage_remarks[$asset->id],
                ]);
            } else {
                $asset->update([
                    'remarks' => $this->new_remarks[$asset->id],
                ]);
            }

            returnAsset::create([
                'asset_id' => $asset->id,
                'status' => $this->new_remarks[$asset->id],
                'user_id' => $this->borrower_id,
            ]);
        }

        foreach ($assets as $asset) {
            $asset->update([
                'status' => 1,
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
