<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    protected $table = 'users_customers';

    protected $fillable = [
        'email', 'password', 'username'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
