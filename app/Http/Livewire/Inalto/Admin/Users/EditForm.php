<?php

namespace App\Http\Livewire\Inalto\Admin\Users;

use App\Models\User;
use Livewire\Component;


class EditForm extends Component
{
    public $model = User::class;

    public $name;
    public $email;
    public $first_name;
    public $last_name;
    public $tagline;
    public $birth_date;
    public $address;
    public $abstract;
    public $city;
    public $country;



    protected $rules = [
        
        'name' => 'required|min:6',
        'email' => 'required|email',
    'first_name' => '',
    'last_name' => '',
    'tagline' => '',
    'birth_date' => '',
    'address' => '',
    'abstract' => '',
    'city' => '',
    'country' => ''

    ];

    public function mount($user)
    {
        //ray($user);
        $this->user=$user;
        $this->name= $user->name;
        $this->email= $user->email;
        $this->first_name= $user->first_name;
        $this->last_name= $user->last_name;
        $this->tagline= $user->tagline;
        $this->birth_date= $user->birth_date;
        $this->address= $user->address;
        $this->abstract= $user->abstract;
        $this->city= $user->city;
        $this->country= $user->country;
    
    }

    public function render()
    {
        return view('livewire.inalto.admin.users.edit',['user'=> $this->user]);
    }

}
