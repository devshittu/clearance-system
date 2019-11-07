<?php

namespace App;

use App\Utils\Constants;
use Illuminate\Database\Eloquent\Model;

class SportClearanceLog extends Model
{
    //
    protected $fillable = [Constants::DBC_USER_ID, Constants::DBC_QUESTION_ID, Constants::DBC_ANSWER];

    /**
     * Get the staff record associated with the user if it is staff .
     */
    public function sport_question()
    {
        return $this->belongsTo('App\SportQuestion', 'question_id', 'id');
    }
}
