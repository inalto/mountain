<?php

namespace App\Http\Livewire\User;

use App\Models\Role;
use App\Models\User;
use Illuminate\Validation\Rule;
//use Livewire\WithFileUploads;
use Livewire\Component;
use Spatie\MediaLibraryPro\Http\Livewire\Concerns\WithMedia;

class Edit extends Component
{
    //  use WithFileUploads;
    use WithMedia;

    public User $user;

    public array $roles = [];

    public string $password = '';

    public array $listsForFields = [];

    public $mediaComponentNames = ['avatar'];

    public $avatar;

    public function mount(User $user)
    {

     //   dd($user->avatar);
        $this->user = $user;
        // $this->avatar = $user->avatar;
        //     $this->avatar = $this->user->getFirstMediaUrl('avatar', 'thumb');

        //       dd($user->avatar);
        $this->roles = $this->user->roles()->pluck('id')->toArray();
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.user.edit');
    }

    public function submit()
    {
        ray($this->validate());
        ray($this->user);
        // $this->user->password = $this->password;

        /*
        foreach ($this->user->getMedia('avatar') as $avatar){
            $avatar->delete();
          }
        */

        $this->user->roles()->sync($this->roles);
        $this->user->syncFromMediaLibraryRequest($this->avatar)->toMediaCollection('avatar');

        $this->user->save();

        return redirect()->route('admin.users.index');
    }

    protected function rules(): array
    {
        ray($this->user->id);

        return [
            'user.name' => [
                'string',
                'required',
            ],
            'user.first_name' => [
                'string',
            ],
            'user.last_name' => [
                'string',
            ],
            'user.email' => [
                'email:rfc',
                'required',
                Rule::unique('users', 'email')->ignore($this->user->id.'id'),
                //'unique:users,email,'. $this->user->id,
            ],
        ];
        /*
        return [
            'user.name' => [
                'string',
                'required',
            ],
            'user.first_name' => [
                'string',
            ],
            'user.last_name' => [
                'string',
            ],
            'user.email' => [
                'email:rfc',
                'required',
                'unique:users,email,' . $this->user->id,
            ],
            'password' => [
                'string',
            ],
            'roles' => [
                'required',
                'array',
            ],
            'roles.*.id' => [
                'integer',
                'exists:roles,id',
            ],
        ];
        */
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['roles'] = Role::pluck('title', 'id');
    }
}
