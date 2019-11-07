<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    /**
     * Get the staff record associated with the user if it is staff .
     */
    public function role_staff()
    {
        return $this->hasMany('App\RoleStaff', 'role_id', 'id');
    }
}
