<?php

namespace App\Http\Livewire\Employee;

use Livewire\Component;
use App\Models\Category;
use WireUi\Traits\Actions;
use App\Models\Asset;
use App\Models\Transaction;
use App\Models\Request as RequestModel;
use App\Models\RequestTransaction;
use App\Models\User;
use App\Notifications\RequestNotification;

class Home extends Component
{
    use Actions;
    public $category_get = [];
    public $request_form = false;
    public $return_date;

    public $reqQty;

    public function render()
    {
        return view('livewire.employee.home', [
            'categories' => Category::all(),
        ]);
    }

    public function selectCategory($category_id)
    {
        $query = Category::where('id', $category_id)->first();
        if (count($query->assets) == 0) {
            $this->dialog()->error(
                $title = 'Sorry',
                $description = 'This Item has no available assets'
            );
        } else {
            foreach ($this->category_get as $key => $item) {
                if ($item['id'] == $query->id) {
                    $this->category_get[$key]['qty'] += 1;
                    return;
                }
            }
            $this->category_get[] = [
                'id' => $category_id,
                'name' => $query->name,
                'qty' => 1,
            ];
        }
    }

    public function removeItem($key)
    {
        unset($this->category_get[$key]);
    }

    public function confirmRequest()
    {
        // dd($this->return_date);
        $code = 'RN' . strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, 6));

        $adminId = User::where('role', 1)->first();

        $transaction = Transaction::create([
            'transaction_code' => $code,
            'user_id' => auth()->user()->id,
            'returned_date' => $this->return_date,
            'borrowed_date' => now(),
            'accountable_person' => auth()->user()->employeeInformation
                ->department->name,
        ]);

        foreach ($this->category_get as $key => $item) {
            RequestModel::create([
                'category_id' => $item['id'],
                'quantity' => $item['qty'],
                'transaction_id' => $transaction->id,
            ]);
        }
        $this->request_form = false;
        $this->notification()->success(
            $title = 'Success',
            $description = 'Your request has been sent.'
        );
        $this->category_get = [];

        // Notifications
        $notifToEmployee = [
            'employeeId' => auth()->user()->id,
            'message' => auth()->user()->name . " is requesting ",
        ];

        event(new \App\Events\RequestNotificationEvent($adminId->id));
        $adminId->notify(new RequestNotification($notifToEmployee));

        return redirect()->route('employee.request');
    }

    public function confirmDialog()
    {
        $this->validate([
            'return_date' => 'required',
        ]);
        $this->dialog()->confirm([
            'title' => 'Are you Sure?',
            'description' => 'Send this request form?',
            'icon' => 'question',
            'accept' => [
                'label' => 'Yes, send it',
                'method' => 'confirmRequest',
            ],
            'reject' => [
                'label' => 'No, cancel',
            ],
        ]);
    }

    public function addQty($key)
    {
        $this->category_get[$key]['qty'] += 1;
    }

    public function minusQty($key)
    {
        if ($this->category_get[$key]['qty'] > 1) {
            $this->category_get[$key]['qty'] -= 1;
        } else {
            unset($this->category_get[$key]);
        }
    }
}
