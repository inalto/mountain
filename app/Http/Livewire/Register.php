<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\User;

class Register extends Component
{

    public $name;
    public $email;
    public $password;
    public $password_confirmation;
        
    

    public function submit()
    {
        $this->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', ],
            'password_confirmation' => ['required','string', 'min:8','same:password'],

        ]);

        User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
/*
        if (!Auth::attempt(
            [
            'email'=>$this->email,
            'password'=>$this->password
            ],
            $this->remember
        )) {
            
            return  redirect()->back()->withErrors(trans('auth.failed'));
        }
        return redirect('/');
        */
    }

    public function render()
    {
        return view('livewire.register');
    }
}
