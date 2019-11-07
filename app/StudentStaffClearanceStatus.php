<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentStaffClearanceStatus extends Model
{
    public function student()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    public function staff()
    {
        return $this->belongsTo('App\User', 'staff_id', 'id');
    }
    public function role()
    {
        return $this->belongsTo('App\Role', 'role_id', 'id');
    }
}
