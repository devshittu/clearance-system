<?php

namespace App;

use App\Utils\Constants;
use Illuminate\Database\Eloquent\Model;

class LibraryItem extends Model
{
    public function item_logs()
    {
        return $this->hasMany(LibraryItemLog::class, Constants::DBC_ITEM_ID);
    }
}
