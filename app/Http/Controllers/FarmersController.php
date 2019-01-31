<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Farmer;

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
            "mobile" => "required|digits:10|unique:farmers",
            "dob" => "required|date",
            "aadhar" => "required|digits:12|unique:farmers",
            "pan" => "required|size:10|unique:farmers",
            "light_bill" => "required|string",
        ]);

        $farmer = new Farmer();
        
        $farmer->first_name = $data['first_name'];
        $farmer->last_name = $data['last_name'];
        $farmer->mobile = $data['mobile'];
        $farmer->dob = $data['dob'];
        $farmer->aadhar = $data['aadhar'];
        $farmer->pan = $data['pan'];
        $farmer->light_bill = $data['light_bill'];

        if ($farmer->save()) {
            return back()->with('status', 'Farmer registered succesfully!');
        }

        return back()->withErrors('Problem while registering!');
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $query = $request->input('query');

            if ($query != '') {
                $data = Farmer::where('first_name', 'LIKE', '');
            }
        }
    }
}
