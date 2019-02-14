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
            "last_name" => "required|string",
            "mobile" => "required|regex:#[7-9]{1}\d{9}#|unique:farmers",
            "dob" => "required|date",
            "aadhar" => "required|digits:12|unique:farmers",
            "pan" => "required|size:10|unique:farmers",
            "light_bill" => "required|string",
            'block_no' => 'required|string',
            'village' => 'required|string',
            'city' => 'required|string',
            'district' => 'required|string',
        ]);

        $farmer = new Farmer;
        
        $farmer->first_name = $data['first_name'];
        $farmer->last_name = $data['last_name'];
        $farmer->mobile = $data['mobile'];
        $farmer->dob = $data['dob'];
        $farmer->aadhar = $data['aadhar'];
        $farmer->pan = $data['pan'];
        $farmer->light_bill = $data['light_bill'];

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
}
