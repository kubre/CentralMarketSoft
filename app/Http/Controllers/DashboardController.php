<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Debit;
use App\Farmer;
use Yajra\DataTables\DataTables;

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

    /**
     * Show the My Shop page.
     *
     * @return \Illuminate\Http\Response
     */
    public function myShop()
    {
        $debts = Debit::where('user_id', Auth::user()->id)
                ->orderBy('created_at')
                ->simplePaginate(15);

        return view('users.myshop')->with('debts', $debts);
    }

    public function search()
    {
        $clients = Debit::all();

        return DataTables::of($clients)
            ->addColumn('first_name', function (Debit $debt) {
                return $debt->farmer->first_name;
            })
            ->addColumn('aadhar', function (Debit $debt) {
                return $debt->farmer->aadhar;
            })
            ->addColumn('address', function (Debit $debt) {
                return "{$debt->farmer->address->village}, {$debt->farmer->address->taluka}, {$debt->farmer->address->district}";
            })
            ->addColumn('shop_name', function (Debit $debt) {
                return $debt->user->shop->shop_name .', '. $debt->user->shop->address->village;
            })
            ->addColumn('issue_amount', function (Debit $debt) {
                return $debt->transactions->first()->amount;
            })
            ->addColumn('issue_date', function (Debit $debt) {
                return date('Y', strtotime($debt->created_at));
            })
            ->addColumn('action', function (Debit $debt) {
                return
                "<div class='btn-group btn-group-justified'> <a class='btn btn-info' href='/debit/$debt->id'>". __('user.details') ."</a>
                <a class='btn btn-success' href='/debit/create/{$debt->farmer->id}'>". __('user.givedebt') ."</a></div>";
            })
            ->removeColumn('user_id')
            ->removeColumn('farmer_id')
            ->rawColumns(['action'])
            ->make(true);
    }

    public function searchMyShop()
    {
        $clients = Debit::where('user_id', Auth::id())->get();

        return DataTables::of($clients)
            ->addColumn('first_name', function (Debit $debt) {
                return $debt->farmer->first_name;
            })
            ->addColumn('aadhar', function (Debit $debt) {
                return $debt->farmer->aadhar;
            })
            ->addColumn('address', function (Debit $debt) {
                return "{$debt->farmer->address->village}, {$debt->farmer->address->taluka}, {$debt->farmer->address->district}";
            })
            ->addColumn('issue_amount', function (Debit $debt) {
                return $debt->transactions->first()->amount;
            })
            ->addColumn('issue_date', function (Debit $debt) {
                return date('Y', strtotime($debt->created_at));
            })
            ->addColumn('action', function (Debit $debt) {
                return
                "<div class='btn-group  btn-group-justified'>
                <a class='btn btn-primary' href='/debit/$debt->id'>". __('user.details') ."</a>
                <a class='btn btn-default' href='/debit/{$debt->id}/edit'>". __('user.update') ."</a>
                <a class='btn btn-success' href='/debit/create/{$debt->farmer->id}'>". __('user.givedebt') ."</a></div>";
            })
            ->removeColumn('user_id')
            ->removeColumn('farmer_id')
            ->rawColumns(['action'])
            ->make(true);
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
            return back()->withErrors([__('messages.errorsaving')]);
        }

        return back()->with('messages', [__('messages.successsaving')]);
    }

    public function updateFertExp(Request $request)
    {
        $data = $request->validate([
            "fert_exp" => "nullable|date"
        ]);

        $shop = Auth::user()->shop;
        $shop->fert_exp = $request->fert_exp;
        
        if (!$shop->save()) {
            return back()->withErrors([__('messages.errorsaving')]);
        }
        
        return back()->with('messages', [__('messages.successsaving')]);
    }

    public function updatePestExp(Request $request)
    {
        $data = $request->validate([
            "pest_exp" => "nullable|date"
        ]);

        $shop = Auth::user()->shop;
        $shop->pest_exp = $request->pest_exp;
        
        if (!$shop->save()) {
            return back()->withErrors([__('messages.errorsaving')]);
        }
        
        return back()->with('messages', [__('messages.successsaving')]);
    }

    public function updateShopExp(Request $request)
    {
        $data = $request->validate([
            "shop_exp" => "nullable|date"
        ]);

        $shop = Auth::user()->shop;
        $shop->shop_exp = $request->shop_exp;
        
        if (!$shop->save()) {
            return back()->withErrors([__('messages.errorsaving')]);
        }
        
        return back()->with('messages', [__('messages.successsaving')]);
    }
}
