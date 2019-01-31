<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Farmer extends Model
{
    public function debit()
    {
        return $this->hasMany('App\Debit');
    }
}
