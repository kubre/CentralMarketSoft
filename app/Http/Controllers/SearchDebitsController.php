<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Debit;
use App\Farmer;
use Illuminate\Support\Facades\Auth;

class SearchDebitsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function search(Request $request)
    {
        // Response variables to be sent
        $count = 0;
        $htmlTable = "";
        // $editCell = "Not Authorised";

        // Search Fields
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $village = $request->input('village');
        $mobile = $request->input('mobile');
        $aadhar = $request->input('aadhar');
        $pan = $request->input('pan');
        
        if ($request->ajax()) {
            if (!(empty($first_name) && empty($last_name) && empty($mobile) && empty($aadhar) && empty($pan))) {

                // Fetch Farmers as per search criteria
                $farmers = Farmer::where('first_name', 'like', "$first_name%")
                                ->where('last_name', 'like', "$last_name%")
                                // ->where('village', 'like', "$village%")
                                ->where('mobile', 'like', "$mobile%")
                                ->where('aadhar', 'like', "$aadhar%")
                                ->where('pan', 'like', "$pan%")
                                ->get();

                // Check if it even returned anything
                if ($farmers->count() > 0) {
                    foreach ($farmers as $farmer) {
                        foreach ($farmer->debits->all() as $debit) {
                            // if ($debit->user_id === Auth::user()->id) {
                            // $editCell = "<a class='btn btn-primary' href='/debit/$debit->id/edit'>Edit</a>";
                            // }

                            $htmlTable .= "
                                <tr>
                                    <td> $farmer->first_name $farmer->last_name </td> 
                                    <td> $farmer->aadhar / $farmer->pan </td> 
                                    <td> {$farmer->address->block_no}, {$farmer->address->village}, {$farmer->address->city} </td> 
                                    <td> {$debit->user->shop->shop_name} </td> 
                                    <td> $debit->amount </td>
                                    <td> <a class='btn btn-info' href='/debit/$debit->id'>View</a> </td>
                                </tr>";
                        }
                        // $editCell = "Not Authorised";
                    }
                } else {
                    $htmlTable = "<tr><td colspan='6'>No Match Found!</td></tr>";
                }
                $count = $farmers->count();
            } else {
                $htmlTable = "<tr><td colspan='6'>Type Something above to search!</td></tr>";
            }
            return response()->json([
                "tbody" => $htmlTable,
                "count" => $count,
            ]);
        }
    }
}