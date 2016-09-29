<?php

namespace YaroslavMolchan\Rbac\Models;

use Illuminate\Database\Eloquent\Model;
use YaroslavMolchan\Rbac\Models\Permission;
use YaroslavMolchan\Rbac\Models\Role;

class PermissionsGroup extends Model
{
    protected $fillable = ['name', 'module'];

    public function roles() {
    	return $this->belongsToMany(Role::class);
    }

    public function permissions() {
    	return $this->belongsToMany(Permission::class);
    }
}