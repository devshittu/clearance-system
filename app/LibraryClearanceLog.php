<?php

namespace App;

use App\Utils\Constants;
use Illuminate\Database\Eloquent\Model;

class LibraryClearanceLog extends Model
{
    //
    protected $fillable = [Constants::DBC_USER_ID, Constants::DBC_QUESTION_ID, Constants::DBC_ANSWER];

    /**
     * Get the staff record associated with the user if it is staff .
     */
    public function library_question()
    {
        return $this->belongsTo('App\LibraryQuestion', 'question_id', 'id');
    }
}
