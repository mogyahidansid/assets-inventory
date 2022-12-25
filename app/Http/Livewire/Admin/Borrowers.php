<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\EmployeeInformation;

class Borrowers extends Component
{
    public $search;
    public $manage_modal = false;
    public $employee_id;
    public $status;
    public function render()
    {
        return view('livewire.admin.borrowers', [
            'employees' => EmployeeInformation::with('user.transactions')
                ->when($this->search, function ($query) {
                    $query
                        ->where('firstname', 'like', '%' . $this->search . '%')
                        ->orWhere(
                            'lastname',
                            'like',
                            '%' . $this->search . '%'
                        );
                })
                ->get(),
        ]);
    }

    public function editBorrower($employee_id)
    {
        $this->employee_id = $employee_id;
        $this->manage_modal = true;
        $employee = EmployeeInformation::where('id', $employee_id)->first();
        $this->status = $employee->status;
    }

    public function updateStatus()
    {
        $employee = EmployeeInformation::where(
            'id',
            $this->employee_id
        )->first();
        $employee->update([
            'status' => $this->status,
        ]);
        $this->manage_modal = false;
    }
}
