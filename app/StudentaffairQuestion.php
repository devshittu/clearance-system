<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentaffairQuestion extends Model
{
    //
    protected $table = 'studentaffair_questions';
    /**
     * Get the staff record associated with the user if it is staff .
     */
    public function studentaffair_clearance_logs()
    {
        return $this->hasMany('App\StudentaffairClearanceLog', 'question_id', 'id');
    }
}
