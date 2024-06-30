<?php

namespace App\Models\Travel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $table = 'cities';
    protected $primaryKey = 'city_id';
    public $timestamps = false;

    public function touristPlaces()
    {
        return $this->hasMany(TouristPlace::class, 'city_id', 'city_id');
    }
}