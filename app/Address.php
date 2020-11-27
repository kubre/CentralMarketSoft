<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Address extends Model
{
    public static function makeFromRequest(Request $request, int $owner)
    {
        $address = Address::where('belongs_to', $owner)->first();
        if (is_null($address)) {
            $address = new Address;
        }
        $address->belongs_to = $owner;
        $address->block_no = $owner >= 500000 ? 'NA' : ($request->input('block_no') ?? 'NA');
        $address->village = $request->input('village') ?? 'NA';
        $address->taluka = $request->input('taluka') ?? 'NA';
        $address->city = $owner >= 500000 ? 'NA' : ($request->input('city') ?? 'NA');
        $address->district = $request->input('district') ?? 'NA';

        return $address->save();
    }
}
