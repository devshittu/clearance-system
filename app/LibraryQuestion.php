<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LibraryQuestion extends Model
{
    /**
     * Get the staff record associated with the user if it is staff .
     */
    public function library_clearance_logs()
    {
        return $this->hasMany('App\LibraryClearanceLog', 'question_id', 'id');
    }
}
