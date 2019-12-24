<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name', 'slug'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
    public function hasPermissions($permissions)
        {
            if (is_array($permissions)) {
                foreach ($permissions as $perm) {
                    if ($this->cekRolePermissions($perm)) {
                        return true;
                    }
                }
            }else {
                return $this->cekRolePermissions($permissions);
            }
            return false;
        }
        private function getPermissions()
        {
            return ($this->permissions()->getResults());
        }
        private function cekRolePermissions($perm)
        {
            $have_perm     = $this->getPermissions();
            foreach ($have_perm as $perms) {
                if ($perms->slug == $perm) {
                    return true;
                }
            }
            return false;
        }
}
