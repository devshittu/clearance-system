<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SportQuestion extends Model
{
    //
    /**
     * Get the staff record associated with the user if it is staff .
     */
    public function sport_clearance_logs()
    {
        return $this->hasMany('App\SportClearanceLog', 'question_id', 'id');
    }
}
