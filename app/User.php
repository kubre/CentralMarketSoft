<?php

namespace App;

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
        'name', 'mobile', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Users relation with shop
     */
    public function shop()
    {
        return $this->hasOne('App\Shop');
    }

    /**
     * Checkes whether or not user is admin
     *
     * @return boolean
     */
    public function isAdmin()
    {
        return $this->role === 'admin';
    }
}
