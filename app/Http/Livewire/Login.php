<?php

namespace App\Http\Livewire;

use Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;
    public $remember;
        
    

    public function submit()
    {
        $this->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

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
    }

    public function render()
    {
        return view('livewire.login');
    }
}
