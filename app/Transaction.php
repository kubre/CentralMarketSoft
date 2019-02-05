<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function debit()
    {
        return $this->belongsTo('App\Debit');
    }
}
