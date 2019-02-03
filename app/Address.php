<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Address extends Model
{
    public static function makeFromRequest(Request $request, int $owner)
    {
        $address = new Address;
        $address->belongs_to = $owner;
        $address->block_no = $request->input('block_no');
        $address->village = $request->input('village');
        $address->city = $request->input('city');
        $address->district = $request->input('district');

        return $address->save();
    }
}
