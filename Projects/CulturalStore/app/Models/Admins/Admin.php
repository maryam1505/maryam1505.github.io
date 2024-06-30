<?php

namespace App\Models\Admins;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
     use HasFactory;
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];

}
