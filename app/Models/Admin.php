<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $fillable = [
        'name', 'email', 'password',
    ];

    // You can add any other methods specific to the Admin model here
}
