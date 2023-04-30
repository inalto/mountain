<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\Role;
use App\Models\User;
use Illuminate\Validation\Rule;
//use Livewire\WithFileUploads;
use Livewire\Component;
use Spatie\MediaLibraryPro\Http\Livewire\Concerns\WithMedia;

class Edit extends Component
{
    use WithMedia;

    public User $user;

    public array $roles = [];

    public string $password = '';

    public array $listsForFields = [];

    public $mediaComponentNames = ['avatar'];

    public $avatar;

    public function mount(User $user)
    {
        $this->user = $user;
        $this->roles = $this->user->roles()->pluck('id')->toArray();
        $this->initListsForFields();
    }

    public function render()
    {
        ray($this->user);

        return view('livewire.admin.user.edit');
    }

    public function submit()
    {
        $this->user->roles()->sync($this->roles);
        $this->user->syncFromMediaLibraryRequest($this->avatar)->toMediaCollection('avatar');

        $this->user->save();
        ray($this->user);

        return redirect()->route('admin.users.index');
    }

    protected function rules(): array
    {
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
            'user.password' => [
                'string',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['roles'] = Role::pluck('title', 'id');
    }
}
