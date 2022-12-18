<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\EmployeeInformation;

class Borrowers extends Component
{
    public $search;
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
}
