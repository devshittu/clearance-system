<?php

namespace App;

use App\Utils\Constants;
use Illuminate\Database\Eloquent\Model;

class FacultyClearanceLog extends Model
{
    //
    protected $fillable = [Constants::DBC_USER_ID, Constants::DBC_QUESTION_ID, Constants::DBC_ANSWER];

    /**
     * Get the staff record associated with the user if it is staff .
     */
    public function faculty_question()
    {
        return $this->belongsTo('App\FacultyQuestion', 'question_id', 'id');
    }
}
