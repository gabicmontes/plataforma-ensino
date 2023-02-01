<?php

namespace App\Traits;

use App\Models\Role;

trait HasRole {

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasRole($role)
    {
        if (is_string($role)) {
            return $this->roles->contains('slug', $role);
        }

        return !! $role->intersect($this->roles)->count();
    }

    public function assignRole($role)
    {
        return $this->roles()->save(
            Role::whereSlug($role)->firstOrFail()
        );
    }

    public function assignRoles($roles)
    {
        return $this->roles()->saveMany(
            Role::whereIn('slug', $roles)->get()
        );
    }

    public function removeRole($role)
    {
        return $this->roles()->detach(
            Role::whereSlug($role)->firstOrFail()
        );
    }

    public function removeRoles($roles)
    {
        return $this->roles()->detach(
            Role::whereIn('slug', $roles)->get()
        );
    }

    public function removeAllRoles()
    {
        return $this->roles()->detach();
    }

    public function hasAnyRole($roles)
    {
        return $this->roles()->intersect($roles)->count();
    }

    public function hasAllRoles($roles)
    {
        return $this->roles()->intersect($roles)->count() === count($roles);
    }

    public function hasPermission($permission)
    {
        return $this->hasAnyRole($permission->roles);
    }

    public function hasAnyPermission($permissions)
    {
        return $this->hasAnyRole($permissions->roles);
    }

    public function hasAllPermissions($permissions)
    {
        return $this->hasAllRoles($permissions->roles);
    }
}
