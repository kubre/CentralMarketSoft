<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Shop;
use App\Address;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function profile()
    {
        return view('users.profile')->with('user', Auth::user());
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|regex:#[7-9]{1}\d{9}#',
            'shop_name' => 'required|string|max:255',
            'dob' => 'required|date',
            'shop_do' => 'required|date',
            
            'seed_lic' => 'required|string',
            'seed_exp' => 'required|date',
            'fert_lic' => 'required|string',
            'fert_exp' => 'required|date',
            'pest_lic' => 'required|string',
            'pest_exp' => 'required|date',
            'shop_act' => 'required|string',
            'shop_exp' => 'required|date',
            
            'gst' => 'required|string',
            'aadhar' => 'required|digits:12',
            'pan' => 'required|string',

            'block_no' => 'required|string',
            'village' => 'required|string',
            'city' => 'required|string',
            'district' => 'required|string',
        ]);

        if ($request->input('mobile') != Auth::user()->mobile && !is_null(User::where('mobile', $request->input('mobile'))
                ->where('id', "!=", Auth::id())->first())) {
            return back()->withErrors([__('forms.mobileistaken')]);
        }

        $user = Auth::user();

        $user->name = $request->name;
        $user->mobile = $request->mobile;
        $shop = $user->shop;
        $shop->shop_name = $request->input('shop_name');
        $shop->dob = formatDate($request->input('dob'));
        $shop->shop_do = formatDate($request->input('shop_do'));
        
        $shop->seed_lic = $request->input('seed_lic');
        $shop->seed_exp = formatDate($request->input('seed_exp'));
        $shop->fert_lic = $request->input('fert_lic');
        $shop->fert_exp = formatDate($request->input('fert_exp'));
        $shop->pest_lic = $request->input('pest_lic');
        $shop->pest_exp = formatDate($request->input('pest_exp'));
        $shop->shop_act = $request->input('shop_act');
        $shop->shop_exp = formatDate($request->input('shop_exp'));
        
        $shop->gst = $request->input('gst');
        $shop->aadhar = $request->input('aadhar');
        $shop->pan = $request->input('pan');
       
        if ($user->save() && $shop->save() && Address::makeFromRequest($request, $shop->id)) {
            return back()->with('messages', [__('messages.successsaving')]);
        }
        return back()->withErrors([__('messages.errorsaving')]);
    }
}
