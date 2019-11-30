<?php

namespace App;

use App\Utils\Constants;
use Illuminate\Database\Eloquent\Model;

class HealthItem extends Model
{

    public function item_logs()
    {
        return $this->hasMany(HealthItemLog::class, Constants::DBC_ITEM_ID);
    }
}
