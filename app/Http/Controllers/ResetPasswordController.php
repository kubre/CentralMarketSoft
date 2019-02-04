<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class ResetPasswordController extends Controller
{
    public function verify(Request $request)
    {
        $data = $request->validate([
            'mobile' => 'required|regex:#[7-9]{1}\d{9}#|exists:users',
            'aadhar' => 'required|digits:12',
            'pan' => 'required|size:10',
        ]);
        
        $user = User::where('mobile', $data['mobile'])->first();

        // Check if even user exists and that its not an admin
        if ($user != null && (!$user->isAdmin())
            && ($user->shop->aadhar === $data['aadhar'])
            && ($user->shop->pan === $data['pan'])) {
            $reset_auth = [
                'mobile' => $data['mobile'],
                'reset_token' => uniqid(),
            ];

            session($reset_auth);
            return view('auth.passwords.reset', $reset_auth);
        }
        return back()->withErrors([
            "aadhar" => "Addhar or PAN is invalid!",
        ]);
    }

    public function reset(Request $request)
    {
        $data = $request->validate([
            "password" => "required|string|min:6|confirmed"
        ]);
        
        // Only reset password when all details in session and hidden inputs matches
        if (session('mobile') === $request->input('mobile')
        && session('reset_token') === $request->input('reset_token')) {
            $user = User::where('mobile', $request->input('mobile'))->first();
            $user->password = Hash::make($request->input('password'));
            if ($user->save()) {
                return redirect('\login')->with('messages', [
                    "Successfully reseted password!"
                ]);
            }
        }
        return back()->withErrors(["password" => "Please start password reset process again!"])
                    ->withInput();
    }
}
