<?php

namespace App\Models\Travel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TouristPlace extends Model
{
    use HasFactory;
    protected $table = 'tourist_places';
    protected $primaryKey = 'place_id';
    public $timestamps = false;

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'city_id');
    }

    public function events()
    {
        return $this->hasMany(Event::class, 'place_id', 'place_id');
    }
}