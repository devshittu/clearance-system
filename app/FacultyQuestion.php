<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacultyQuestion extends Model
{
    /**
     * Get the staff record associated with the user if it is staff .
     */
    public function faculty_clearance_logs()
    {
        return $this->hasMany('App\FacultyClearanceLog', 'question_id', 'id');
    }
}
