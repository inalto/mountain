<?php

namespace App\Http\Livewire\Admin\Role;

use App\Models\Permission;
use App\Models\Role;
use Livewire\Component;

class Create extends Component
{
    public Role $role;

    public array $permissions = [];

    public array $permissions_available = [];

    public array $listsForFields = [];

    public function mount(Role $role)
    {
        $this->role = $role;
        $this->permissions_availables = Permission::all();

        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.admin.role.create');
    }

    public function submit()
    {
        $this->validate();

        $this->role->save();
        $this->role->permissions()->sync($this->permissions);

        return redirect()->route('admin.roles.index');
    }

    protected function rules(): array
    {
        return [
            'role.title' => [
                'string',
                'required',
            ],
            'permissions' => [
                'required',
                'array',
            ],
            'permissions.*.id' => [
                'integer',
                'exists:permissions,id',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['permissions'] = Permission::pluck('title', 'id');
    }
}
