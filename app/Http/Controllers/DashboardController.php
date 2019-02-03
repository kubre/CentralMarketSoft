<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.dashboard');
    }

    public function license()
    {
        $shop = Auth::user()->shop;
        return view('users.license')->with('shop', $shop);
    }

    public function updateSeedExp(Request $request)
    {
        $data = $request->validate([
            "seed_exp" => "nullable|date"
        ]);

        $shop = Auth::user()->shop;
        $shop->seed_exp = $request->seed_exp;
        
        if (!$shop->save()) {
            return back()->withErrors(["Problem while update seed expiry."]);
        }

        return back()->with('messages', ['Updated seed license date successfully!']);
    }

    public function updateFertExp(Request $request)
    {
        $data = $request->validate([
            "fert_exp" => "nullable|date"
        ]);

        $shop = Auth::user()->shop;
        $shop->fert_exp = $request->fert_exp;
        
        if (!$shop->save()) {
            return back()->withErrors(["Problem while update Fertilizer expiry."]);
        }
        
        return back()->with('messages', ['Updated Fertilizer license date successfully!']);
    }

    public function updatePestExp(Request $request)
    {
        $data = $request->validate([
            "pest_exp" => "nullable|date"
        ]);

        $shop = Auth::user()->shop;
        $shop->pest_exp = $request->pest_exp;
        
        if (!$shop->save()) {
            return back()->withErrors(["Problem while update Pesticide expiry."]);
        }
        
        return back()->with('messages', ['Updated Pesticde license date successfully!']);
    }

    public function updateShopExp(Request $request)
    {
        $data = $request->validate([
            "shop_exp" => "nullable|date"
        ]);

        $shop = Auth::user()->shop;
        $shop->shop_exp = $request->shop_exp;
        
        if (!$shop->save()) {
            return back()->withErrors(["Problem while update Shop Act expiry."]);
        }
        
        return back()->with('messages', ['Updated Shop Act date successfully!']);
    }
}
