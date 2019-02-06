<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Debit;
use App\Farmer;

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
        $village = $request->input('village');
        $mobile = $request->input('mobile');
        $aadhar = $request->input('aadhar');
        $pan = $request->input('pan');
        
        if ($request->ajax()) {
            if (!(empty($first_name) && empty($last_name) && empty($mobile) && empty($aadhar) && empty($pan))) {

                // Fetch Farmers as per search criteria
                $farmers = Farmer::where('first_name', 'like', "$first_name%")
                                ->where('last_name', 'like', "$last_name%")
                                ->where('mobile', 'like', "$mobile%")
                                ->where('aadhar', 'like', "$aadhar%")
                                ->where('pan', 'like', "$pan%")
                                ->get();

                // Check if it even returned anything
                if ($farmers->count() > 0) {
                    foreach ($farmers as $farmer) {
                        $descByAmount = $farmer->debits->sortByDesc('amount');
                        foreach ($descByAmount->all() as $debit) {
                            if ($debit->user_id === Auth::user()->id) {
                                $htmlTable .= "
                                <tr>
                                    <td> $farmer->first_name $farmer->last_name </td> 
                                    <td> $farmer->aadhar / $farmer->pan </td> 
                                    <td> {$farmer->address->block_no}, {$farmer->address->village}, {$farmer->address->city} </td> 
                                    <td> {$debit->user->shop->shop_name}, {$debit->user->shop->address->village} </td> 
                                    <td> $debit->amount </td>
                                    <td> <a class='btn btn-info' href='/debit/$debit->id'>View</a> </td>
                                </tr>";
                            }
                        }
                    }
                } else {
                    $htmlTable = "<tr><td colspan='6'>No Match Found!</td></tr>";
                }
                $count = $farmers->count();
            } else {
                $htmlTable = "<tr><td colspan='6'>Type Something above to search!</td></tr>";
            }
            return response()->json([
                "tbody" => $htmlTable,
                "count" => $count,
            ]);
        }
        // $data = $request->validate([
        //     "name" => "required|string"
        // ]);

        // $farmers = Farmer::where('first_name', 'like', "%{$data['name']}%")
        //                 ->orWhere('last_name', 'like', "%{$data['name']}%")
        //                 ->get();
        // $f = $farmers->filter(function ($farmer, $index) {
        //     return $farmer->debits->user_id == Auth::user()->id;
        // });

        // dd($f);

        // $found = false;

        // if ($debts->count() > 0) {
        //     $found = true;
        // }

        // dd($debts->first()->user);

        // return view('users.myshop', [
        //     'debts' => $debts,
        //     'name' => $data['name'],
        //     'found' => $found
        // ]);
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
