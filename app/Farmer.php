<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Farmer extends Model
{
    public function debits()
    {
        return $this->hasMany('App\Debit');
    }


    public function address()
    {
        return $this->hasOne('App\Address', 'belongs_to');
    }
}
