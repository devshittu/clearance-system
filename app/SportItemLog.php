<?php

namespace App;

use App\Utils\Constants;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SportItemLog extends Model
{
    use SoftDeletes;
    protected $fillable = [Constants::DBC_DESCRIPTION, Constants::DBC_IS_FIXED, Constants::DBC_ITEM_ID, Constants::DBC_USER_ID];

    public function sport_item()
    {
        return $this->belongsTo('App\SportItem',  Constants::DBC_ITEM_ID, Constants::DBC_REF_ID);
    }

    public function item()
    {
        return $this->belongsTo('App\SportItem',  Constants::DBC_ITEM_ID, Constants::DBC_REF_ID);
    }

    public function student()
    {
        return $this->belongsTo('App\User', Constants::DBC_USER_ID, Constants::DBC_REF_ID);
    }
}
