<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    public function address()
    {
        return $this->hasOne('App\Address', 'belongs_to');
    }

    public function debit()
    {
        return $this->hasMany('App\Debit');
    }
}
