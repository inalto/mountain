<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;

class Finder extends Component
{
    public $user_id = 0;

    public $user_full_name = null;

    public $search = null;

    public $users = [];

    public function mount()
    {
        if ($this->user_id > 0) {
            $u = User::where('id', $this->user_id)->select('name', 'first_name', 'last_name')->get()->first();
            $this->user_full_name = '['.$u->name.'] '.$u->first_name.' '.$u->last_name;
        }
    }

    public function updatedSearch($value)
    {
        $this->users = User::where('name', 'like', '%'.$value.'%')->orWhere('first_name', 'like', '%'.$value.'%')->orWhere('last_name', 'like', '%'.$value.'%')->take(10)->get();
    }

    public function selectUser($id)
    {
        $u = User::where('id', $id)->select('name', 'first_name', 'last_name')->get()->first();

        $this->user_id = $id;
        $this->user_full_name = '['.$u->name.']'.$u->first_name.' '.$u->last_name;
        $this->search = null;
        $this->users = [];
        $this->emit('userSelected', $id);
    }

    public function closeWindow()
    {
        $this->search = null;
        $this->users = [];
    }

    public function render()
    {
        return view('livewire.admin.user.finder');
    }
}
