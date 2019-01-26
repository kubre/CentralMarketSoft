<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public function shop()
    {
        return $this->belongsTo('App\Shop', 'belongs_to');
    }

    public function farmer()
    {
        return $this->belongsTo('App\Farmer', 'belongs_to');
    }
}
