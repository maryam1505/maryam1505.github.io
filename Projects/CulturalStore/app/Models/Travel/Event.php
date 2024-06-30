<?php

namespace App\Models\Travel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{protected $table = 'events';
    protected $primaryKey = 'event_id';
    public $timestamps = false;

    public function place()
    {
        return $this->belongsTo(TouristPlace::class, 'place_id', 'place_id');
    }
    // Define relationship with TouristPlace
     
}
