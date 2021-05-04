<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class staffs extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
    	'position',
        'name',
        'email',
        'url',
    ];
     protected $hidden = [
        'password',
        'remember_token',
    ];
}
