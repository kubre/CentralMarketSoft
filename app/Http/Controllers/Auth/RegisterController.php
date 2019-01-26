<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Address;
use App\Shop;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'mobile' => 'required|digits:10|unique:users',
            'password' => 'required|string|min:6|confirmed',
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
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // Create a user
        return User::create([
            'name' => $data['name'],
            'mobile' => $data['mobile'],
            'password' => bcrypt($data['password']),
        ]);
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {

        // Save Address
        $address = new Address;
        $address->block_no = $request->input('block_no');
        $address->village = $request->input('village');
        $address->city = $request->input('city');
        $address->district = $request->input('district');
    
        $address->save();
        
        // Create new shop after user is registered
        $shop =  new Shop;
        $shop->shop_name = $request->input('shop_name');
        $shop->dob = $request->input('dob');
        $shop->shop_do = $request->input('shop_do');
        
        $shop->seed_lic = $request->input('seed_lic');
        $shop->seed_exp = $request->input('seed_exp');
        $shop->fert_lic = $request->input('fert_lic');
        $shop->fert_exp = $request->input('fert_exp');
        $shop->pest_lic = $request->input('pest_lic');
        $shop->pest_exp = $request->input('pest_exp');
        $shop->shop_act = $request->input('shop_act');
        $shop->shop_exp = $request->input('shop_exp');
        
        $shop->gst = $request->input('gst');
        $shop->aadhar = $request->input('aadhar');
        $shop->pan = $request->input('pan');

        $shop->user_id = $user->id;
        $shop->address_id = $address->id; 
        $shop->save();
    }
}
