<?php

namespace App;

use App\Utils\Constants;
use Illuminate\Database\Eloquent\Model;

class StudentaffairItem extends Model
{
    public function item_logs()
    {
        return $this->hasMany(StudentaffairItemLog::class, Constants::DBC_ITEM_ID);
    }
}
