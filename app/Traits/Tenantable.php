<?php

namespace App\Traits;

trait Tenantable
{
    public static function bootTenantable()
    {
        if (!app()->runningInConsole() && $user = auth()->user()) {
            static::creating(function ($model) use ($user) {
                $model->owner_id = $user->id;
            });

            if (!$user->is_admin) {
                static::addGlobalScope('owner', function ($query) use ($user) {
                    $query->where('owner_id', $user->id);
                });
            }
        }
    }
}
