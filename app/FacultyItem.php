<?php

namespace App;

use App\Utils\Constants;
use Illuminate\Database\Eloquent\Model;

class FacultyItem extends Model
{

    public function item_logs()
    {
        return $this->hasMany(FacultyItemLog::class, Constants::DBC_ITEM_ID);
    }

}
