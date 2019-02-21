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

        // Search Fields
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $middle_name = $request->input('middle_name');
        $taluka = $request->input('taluka');
        $village = $request->input('village');
        $mobile = $request->input('mobile');
        $aadhar = $request->input('aadhar');
        $pan = $request->input('pan');
        
        if ($request->ajax()) {
            if (!(empty($first_name) && empty($last_name) && empty($mobile) && empty($aadhar) && empty($pan)
            && empty($village) && empty($middle_name) && empty($taluka))) {

                // Fetch Farmers as per search criteria
                $farmers = Farmer::where('first_name', 'like', "%$first_name%")
                            ->where('middle_name', 'like', "$middle_name%")
                            ->where('last_name', 'like', "$last_name%")
                            ->where('mobile', 'like', "$mobile%")
                            ->where('aadhar', 'like', "$aadhar%")
                            ->where('pan', 'like', "$pan%")
                            ->whereHas('address', function ($query) use ($village, $taluka) {
                                $query->where('village', 'like', "$village%")
                                        ->where('taluka', 'like', "$taluka%");
                            })->get();

                // Check if it even returned anything
                if ($farmers->count() > 0) {
                    foreach ($farmers as $farmer) {
                        $descByAmount = $farmer->debits->sortByDesc('amount');
                        foreach ($descByAmount->all() as $debit) {
                            $htmlTable .= "
                                <tr>
                                    <td> $farmer->first_name $farmer->last_name </td> 
                                    <td> $farmer->aadhar / $farmer->pan </td> 
                                    <td> {$farmer->address->block_no}, {$farmer->address->village}, {$farmer->address->city} </td> 
                                    <td> {$debit->user->shop->shop_name}, {$debit->user->shop->address->village} </td> 
                                    <td> Rs. $debit->amount </td>
                                    <td> <a class='btn btn-info' href='/debit/$debit->id'>". __('user.details') ."</a> </td>
                                </tr>";
                        }
                    }
                } else {
                    $htmlTable = '<tr><td colspan="6">'.__('messages.notfound').'</td></tr>';
                }
                $count = $farmers->count();
            } else {
                $htmlTable = '<tr><td colspan="6">'.__('user.type').'</td></tr>';
            }
            return response()->json([
                "tbody" => $htmlTable,
                "count" => $count,
            ]);
        }
    }
}
