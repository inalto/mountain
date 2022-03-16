<?php

namespace App\Http\Livewire\Role;

use App\Models\Permission;
use App\Models\Role;
use Livewire\Component;

class Edit extends Component
{
    public Role $role;

    public array $permissions = [];
    public array $permissions_available = [];

    public array $listsForFields = [];

    public function mount(Role $role)
    {
        $this->role        = $role;
        $this->permissions = $this->role->permissions()->pluck('id')->toArray();
        $this->permissions_availables = Permission::all();
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.role.edit');
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

    
    public function toggle($permission) {
        if($this->role->permissions->where('title','=',$permission)->count()) {
            $p = $this->role->permissions->where('title','=',$permission)->first();
            ray($p);
         //   $this->role->permissions()->delete($p);
            $this->dispatchBrowserEvent('toastr:info',[
                'message'=> $permission.' disabled'
            ]);
          } else {
            $p = Permission::where('title','=',$permission)->first();
         //   $this->role->permissions()->save($p);
            ray($p);
            $this->dispatchBrowserEvent('toastr:info',[
                'message'=> $permission.' enabled'
            ]);
          }
    }
}
