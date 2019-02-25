<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Farmer;
use App\Address;

class FarmersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('farmers.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            "first_name" => "required|string",
            "middle_name" => "required|string",
            "last_name" => "required|string",
            "mobile" => "nullable|regex:#[7-9]{1}\d{9}#|unique:farmers",
            "dob" => "required|date",
            "aadhar" => "nullable|digits:12|unique:farmers",
            "pan" => "nullable|size:10|unique:farmers",
            "light_bill" => "nullable|string",
            'block_no' => 'required|string',
            'village' => 'required|string',
            'city' => 'required|string',
            'district' => 'required|string',
        ]);

        $farmer = new Farmer;
        
        $farmer->first_name = $data['first_name'];
        $farmer->middle_name = $data['middle_name'];
        $farmer->last_name = $data['last_name'];
        $farmer->dob = $data['dob'];
        $farmer->mobile = $data['mobile'] ?: 'NA';
        $farmer->aadhar = $data['aadhar'] ?: 'NA';
        $farmer->pan = $data['pan'] ?: 'NA';
        $farmer->light_bill = $data['light_bill'] ?: 'NA';

        if (!$farmer->save()) {
            return back()
                    ->withErrors([ __('messages.errorsaving') ])
                    ->withInput();
        }
        
        // If error occured while adding address destroy farmer record too
        if (!Address::makeFromRequest($request, $farmer->id)) {
            $farmer->destroy();
            
            return back()
                    ->withErrors([__('messages.errorsavingaddress')])
                    ->withInput();
        }

        return back()->with('messages', [__('messages.successsaving')]);
    }

    public function search(Request $request)
    {
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
            if (!(empty($first_name) && empty($last_name) && empty($mobile)
            && empty($aadhar) && empty($pan))) {

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
                        $htmlTable .= "
                                <tr>
                                    <td> $farmer->first_name $farmer->middle_name $farmer->last_name </td> 
                                    <td> $farmer->mobile </td> 
                                    <td> $farmer->aadhar </td> 
                                    <td> $farmer->pan </td> 
                                    <td> {$farmer->address->block_no}, {$farmer->address->village}, {$farmer->address->taluka}, {$farmer->address->city} </td> 
                                    <td> <a class='btn btn-info' href='/debit/create/$farmer->id'>". __('user.issuedebt') ."</a> </td>
                                </tr>";
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
