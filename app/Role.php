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
    public function student_staff_clearance_status()
    {
        return $this->hasMany('App\StudentStaffClearanceStatus', 'role_id', 'id');
    }
//    public function student_affair_clearance_log()
//    {
//        return $this->hasMany('App\StudentaffairClearanceLog', 'role_id', 'id');
//    }

}
