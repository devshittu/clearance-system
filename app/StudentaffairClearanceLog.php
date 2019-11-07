<?php

namespace App;

use App\Utils\Constants;
use Illuminate\Database\Eloquent\Model;

class StudentaffairClearanceLog extends Model
{
    protected $table = 'studentaffair_clearance_logs';
    protected $fillable = [Constants::DBC_USER_ID, Constants::DBC_QUESTION_ID, Constants::DBC_ANSWER];

    /**
     * Get the staff record associated with the user if it is staff .
     */
    public function studentaffair_question()
    {
        return $this->belongsTo('App\StudentaffairQuestion', 'question_id', 'id');
    }

}
