<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\EmployeeInformation;
use Illuminate\Support\Facades\Hash;
use App\Models\Department;

class CreateAccount extends Component
{
    public $firstname, $middlename, $lastname, $address, $contact;
    public $username, $email, $password, $confirm_password, $department_id;
    public function render()
    {
        return view('livewire.create-account', [
            'departments' => Department::all(),
        ]);
    }

    public function create()
    {
        $this->validate([
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
            'address' => 'required',
            'contact' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
            'department_id' => 'required',
        ]);

        $user = User::create([
            'name' => $this->username,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role' => 0,
        ]);

        EmployeeInformation::create([
            'firstname' => $this->firstname,
            'middlename' => $this->middlename,
            'lastname' => $this->lastname,
            'address' => $this->address,
            'contact' => $this->contact,
            'user_id' => $user->id,
            'department_id' => $this->department_id,
        ]);
        auth()->loginUsingId($user->id);
        return redirect()->route('dashboard');
    }
}
