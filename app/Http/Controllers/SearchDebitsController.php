<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Debit;
use App\Farmer;

class SearchDebitsController extends Controller
{
    public function search(Request $request)
    {
        $count = 0;
        $htmlTable = "";
        $name = $request->input('first_name');
        if ($request->ajax()) {
            if ($name != "") {
                $farmers = Farmer::where('first_name', 'like', "$name%")->get();
                if ($farmers->count() > 0) {
                    foreach ($farmers as $farmer) {
                        foreach ($farmer->debits->all() as $debit) {
                            $htmlTable .= "
                                <tr>
                                    <td> $farmer->first_name $farmer->last_name </td> 
                                    <td> $farmer->aadhar / $farmer->pan </td> 
                                    <td> {$farmer->address->block_no}, {$farmer->address->village}, {$farmer->address->city} </td> 
                                    <td> {$debit->user->shop->shop_name} </td> 
                                    <td> $debit->amount </td> 
                                </tr>";
                        }
                    }
                } else {
                    $htmlTable = "<tr><td colspan='5'>No Match Found!</td></tr>";
                }
                $count = $farmers->count();
            } else {
                $htmlTable = "<tr> <td colspan='5'>Type Something above to search!</td></tr>";
            }
            return response()->json([
                "tbody" => $htmlTable,
                "count" => $count,
            ]);
        }
    }
}
