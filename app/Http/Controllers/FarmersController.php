<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Farmer;
use App\Address;
use Yajra\DataTables\DataTables;

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
            "middle_name" => "nullable|string",
            "last_name" => "nullable|string",
            "mobile" => "nullable|regex:#[7-9]{1}\d{9}#|unique:farmers",
            "dob" => "nullable|date",
            "aadhar" => "nullable|digits:12|unique:farmers",
            "pan" => "nullable|size:10|unique:farmers",
            "light_bill" => "nullable|string",
            'block_no' => 'nullable|string',
            'village' => 'required|string',
            'city' => 'nullable|string',
            'district' => 'required|string',
        ]);

        $farmer = new Farmer;
        
        $farmer->first_name = $data['first_name'];
        $farmer->middle_name = 'NA';
        $farmer->last_name = 'NA';
        $farmer->dob = date("y-m-d");
        $farmer->mobile = $data['mobile'] ?: 'NA';
        $farmer->aadhar = $data['aadhar'] ?: 'NA';
        $farmer->pan = 'NA';
        $farmer->light_bill = 'NA';

        if (!$farmer->save()) {
            return back()
                    ->withErrors([ __('messages.errorsaving') ])
                    ->withInput();
        }
        
        // If error occured while adding address destroy farmer record too
        if (!Address::makeFromRequest($request, $farmer->id)) {
            $farmer->delete();
            
            return back()
                    ->withErrors([__('messages.errorsavingaddress')])
                    ->withInput();
        }

        return back()->with('messages', [__('messages.successsaving')]);
    }

    public function edit(int $id)
    {
        $customer = Farmer::find($id);
        return view('farmers.edit')->with('customer', $customer);
    }

    public function update(Request $request, int $id)
    {
        $data = $request->validate([
            "first_name" => "required|string",
            "mobile" => "nullable|regex:#[7-9]{1}\d{9}#",
            "aadhar" => "nullable|digits:12",
            'village' => 'required|string',
            'taluka' => 'required|string',
            'district' => 'required|string',
        ]);

        $farmer = Farmer::find($id);
        
        $farmer->first_name = $data['first_name'];
        $farmer->mobile = $data['mobile'];
        $farmer->aadhar = $data['aadhar'];

        if (!$farmer->save()) {
            return back()
                    ->withErrors([ __('messages.errorsaving') ])
                    ->withInput();
        }
        
        // If error occured while adding address destroy farmer record too
        if (!Address::makeFromRequest($request, $farmer->id)) {
            return back()
                    ->withErrors([__('messages.errorsavingaddress')])
                    ->withInput();
        }

        return back()->with('messages', [__('messages.successsaving')]);
    }

    public function search()
    {
        $clients = Farmer::all();

        return DataTables::of($clients)
            ->addColumn('address', function (Farmer $client) {
                return "{$client->address->village}, {$client->address->taluka}, {$client->address->district}";
            })
            ->addColumn('action', function (Farmer $client) {
                return "<div class='btn-group btn-group-justified'><a class='btn btn-success' href='/debit/create/$client->id'>". __('user.givedebt') ."</a>"
                ."<a class='btn btn-default' href='/farmer/$client->id/edit'>". __('user.update') ."</a></div>";
            })
            ->removeColumn('pan')
            ->removeColumn('middle_name')
            ->removeColumn('last_name')
            ->removeColumn('light_bill')
            ->rawColumns(['action'])
            ->make(true);
    }
}
