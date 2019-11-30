<?php

namespace App;

use App\Utils\Constants;
use Illuminate\Database\Eloquent\Model;

class StudentStaffClearanceStatus extends Model
{
    protected $fillable = [Constants::DBC_IS_DECLINED, Constants::DBC_IS_CLEARED];
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
