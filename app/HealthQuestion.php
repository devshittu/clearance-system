<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HealthQuestion extends Model
{
    /**
     * Get the staff record associated with the user if it is staff .
     */
    public function health_clearance_logs()
    {
        return $this->hasMany('App\HealthClearanceLog', 'question_id', 'id');
    }
}
