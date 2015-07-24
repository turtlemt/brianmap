<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class MapLocation extends Model
{
    public function mapLocationSite()
    {
        return $this->hasMany('App\Http\Models\MapLocationSite', 'location_id');
    }
    
}
