<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class MapLocationSite extends Model
{
    public function findall()
    {
        echo 'gg';
    }
    
    /**
     * Get the post that owns the comment.
     */
    public function mapLocation()
    {
        return $this->belongsTo('App\Http\Models\MapLocation', 'location_id');
    }
}
