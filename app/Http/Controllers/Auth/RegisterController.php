<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Address;
use App\Shop;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
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
            'mobile' => 'required|regex:#[7-9]{1}\d{9}#|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'shop_name' => 'required|string|max:255',
            'dob' => 'required|date',
            // 'shop_do' => 'required|date',
            
            // 'seed_lic' => 'required|string',
            // 'seed_exp' => 'required|date',
            // 'fert_lic' => 'required|string',
            // 'fert_exp' => 'required|date',
            // 'pest_lic' => 'required|string',
            // 'pest_exp' => 'required|date',
            // 'shop_act' => 'required|string',
            // 'shop_exp' => 'required|date',
            
            // 'gst' => 'required|string',
            'aadhar' => 'required|digits:12|unique:shops',
            'pan' => 'required|string|unique:shops',

            // 'block_no' => 'required|string',
            // 'village' => 'required|string',
            // 'city' => 'required|string',
            // 'district' => 'required|string',
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
        // create new shop after user is registered
        $shop =  new Shop;
        $shop->shop_name = $request->input('shop_name');
        $shop->dob = formatDate($request->input('dob'));
        $shop->shop_do = now();
        
        $shop->seed_lic = 'NA';
        $shop->seed_exp = now();
        $shop->fert_lic = 'NA';
        $shop->fert_exp = now();
        $shop->pest_lic = 'NA';
        $shop->pest_exp = now();
        $shop->shop_act = 'NA';
        $shop->shop_exp = now();
        
        $shop->gst = 'NA';
        $shop->aadhar = $request->input('aadhar');
        $shop->pan = $request->input('pan');
        
        $shop->user_id = $user->id;

        if (!$shop->save()) {
            return back()->withErrors([
                'Problem while registering Shop!'
            ]);
        }

        if (!Address::makeFromRequest($request, $shop->id)) {
            $shop->delete();
            return back()->withErrors([
                'Problem while adding Address!'
            ]);
        }
        return redirect('/login')->with('messages', [
            'Created account succesfully!'
        ])->with(Auth::logout());
    }
}
