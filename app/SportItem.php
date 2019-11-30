<?php

namespace App;

use App\Utils\Constants;
use Illuminate\Database\Eloquent\Model;

class SportItem extends Model
{

    public function item_logs()
    {
        return $this->hasMany(SportItemLog::class, Constants::DBC_ITEM_ID);
    }
}
