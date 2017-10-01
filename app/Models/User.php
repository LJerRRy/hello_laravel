<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function gravatar($size = '100'){
        $hash = md5(strtolower(trim($this->atrributes['email'])));
        return "http://www.gravatar.com/avatar/2c0b1fde48aca2b2ca9aec1c369db6b8?s=$size";
    }
}
