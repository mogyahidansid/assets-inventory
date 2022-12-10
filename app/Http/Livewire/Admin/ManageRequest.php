<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Request as RequestModel;
use App\Models\Transaction;
use App\Models\Asset;
use App\Models\Category;
use WireUi\Traits\Actions;
use App\Models\TemporaryRequest;
use App\Models\RequestTransaction;
class ManageRequest extends Component
{
    use Actions;
    public $request_id;
    public $manage_modal = false;
    public $category_id;
    public $selected_asset = [];
    public $collections;
    public $requestor;
    public $requests_id;
    public $remarks;

    public $decline_modal = false;

    public function mount()
    {
        $this->request_id = request()->id;
    }

    public function render()
    {
        return view('livewire.admin.manage-request', [
            'requests' => Transaction::where('id', $this->request_id)->first(),
            'assets' => $this->getAssets(),
        ]);
    }

    public function getAssets()
    {
        if ($this->category_id != null) {
            return Asset::where('status', '1')
                ->when($this->category_id, function ($query) {
                    return $query->where('category_id', $this->category_id);
                })
                ->get();
        } else {
            return Asset::all();
        }
    }

    public function manageItem($category_id, $user_id, $request_id)
    {
        $this->manage_modal = true;
        $this->category_id = $category_id;
        $this->requestor_id = $user_id;
        $this->requests_id = $request_id;
    }

    public function selectAsset($asset_id)
    {
        $category = RequestModel::where('transaction_id', $this->request_id)
            ->where('category_id', $this->category_id)
            ->first()->quantity;

        $requests = TemporaryRequest::where(
            'category_id',
            $this->category_id
        )->get();

        $asset = TemporaryRequest::where('asset_id', $asset_id)
            ->where('category_id', $this->category_id)
            ->first();

        if ($asset) {
            $this->notification()->error(
                $title = 'Error !!!',
                $description = 'Asset already selected'
            );
        } else {
            if ($requests->count() < $category) {
                TemporaryRequest::create([
                    'category_id' => $this->category_id,
                    'request_id' => $this->request_id,
                    'asset_id' => $asset_id,
                    'user_id' => $this->requestor_id,
                ]);
            } else {
                $this->dialog()->error(
                    $title = 'Error !!!',
                    $description =
                        'You have reached the maximum number of requests'
                );
            }
        }
    }

    public function acceptRequest()
    {
        $user = Transaction::where('id', $this->request_id)->first();

        $requests = TemporaryRequest::where('user_id', $user->user_id)->get();
        foreach ($requests as $request) {
            RequestTransaction::create([
                'request_id' => $request->request_id,
                'asset_id' => $request->asset_id,
            ]);

            TemporaryRequest::where(
                'category_id',
                $request->category_id
            )->delete();
        }

        Transaction::where('id', $this->request_id)->update([
            'status' => 2,
        ]);

        $this->dialog()->success(
            $title = 'Request',
            $description = 'Request has been accepted'
        );

        return redirect()->route('admin.request');
    }

    public function removeItem($request_id)
    {
        $item = TemporaryRequest::where('id', $request_id)->first();
        $item->delete();
        $this->notification()->success(
            $title = 'Success',
            $description = 'Item has been removed'
        );
    }

    public function declineRequest()
    {
        $transaction = Transaction::where('id', $this->request_id)->first();
        $transaction->update([
            'status' => 4,
            'remarks' => $this->remarks,
        ]);

        $this->dialog()->success(
            $title = 'Request',
            $description = 'Request has been declined'
        );

        return redirect()->route('admin.request');
    }
}
