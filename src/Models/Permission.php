<?php

namespace YaroslavMolchan\Rbac\Models;

use Illuminate\Database\Eloquent\Model;
use YaroslavMolchan\Rbac\Models\PermissionsGroup;
use YaroslavMolchan\Rbac\Models\Role;

class Permission extends Model
{
    protected $fillable = ['slug', 'name'];

    public function roles() {
    	return $this->belongsToMany(Role::class);
    }

    public function groups() {
    	return $this->belongsToMany(PermissionsGroup::class);
    }
}