<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class Register extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    public function submit()
    {
        $this->validate([
            'name'    => 'required|min:3',
            'email'    => 'required|email',
            'password' => 'required|confirmed|min:6',
        ]);
        
        
        return redirect('/');
    }

    public function render()
    {
        return view('livewire.register');
    }
}
