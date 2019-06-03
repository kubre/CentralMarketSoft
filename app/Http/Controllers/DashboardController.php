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
            ->addColumn('action', function (Debit $debt) {
                return "<a class='btn btn-info' href='/debit/$debt->id'>". __('user.details') ."</a>";
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
            ->addColumn('action', function (Debit $debt) {
                return "<a class='btn btn-primary' href='/debit/$debt->id'>". __('user.details') ."</a>";
            })
            ->removeColumn('user_id')
            ->removeColumn('farmer_id')
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Search for debt my Aadhar no.
     *
     * @param Request $request
     * @return void
     */
    public function searchDebt(Request $request)
    {
        // Response variables to be sent
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
            if (!(empty($first_name) && empty($last_name) && empty($mobile) && empty($aadhar) && empty($pan))) {

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
                        $descByAmount = $farmer->debits->sortByDesc('amount');
                        foreach ($descByAmount->all() as $debit) {
                            if ($debit->user_id == Auth::user()->id) {
                                $htmlTable .= "
                                <tr>
                                    <td> $farmer->first_name $farmer->middle_name $farmer->last_name </td> 
                                    <td> $farmer->aadhar / $farmer->pan </td> 
                                    <td> {$farmer->address->block_no}, {$farmer->address->village}, {$farmer->address->city} </td> 
                                    <td> {$debit->transactions->first()->amount} </td> 
                                    <td> $debit->amount </td>
                                    <td> <a class='btn btn-info' href='/debit/$debit->id'>". __('user.details') ."</a> </td>
                                </tr>";
                            }
                        }
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
