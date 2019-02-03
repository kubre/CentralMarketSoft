<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Debit;
use App\Farmer;

class DebitsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('debits.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('debits.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "identity" => "required|min:10|max:12",
            "amount" => "required|numeric"
        ]);

        $farmer = Farmer::where('aadhar', $data['identity'])
                            ->orWhere('pan', $data['identity'])
                            ->first();

        if (is_null($farmer)) {
            return back()->withErrors([
                "identity" => "Aadhar/PAN doesn't exist."
            ])->withInput();
        }

        $debt = new Debit();
        $debt->amount = round($data['amount'], 2);
        $debt->farmer_id = $farmer->id;
        $debt->user_id = Auth::user()->id;

        if ($debt->save()) {
            return back()->with('messages', [
                "success" => "Debit issued successfully! Please search and make sure it exists in Search Debt. Screen"
            ]);
        }

        return back()->withErrors([
            "problem" => "Problem while entering data! Contact Administrator."
        ])->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $debt = Debit::find($id);

        if ($debt->user_id !== Auth::user()->id) {
            return back()->with(Auth::logout());
        }

        return view('debits.edit')->with('debt', $debt);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            "amount" => "required|numeric"
        ]);

        $debt = Debit::find($id);
        $debt->amount = round($data['amount'], 2);

        if (!$debt->save()) {
            return back()->withErrors([
                "problem" => "Problem while entering Debt! Contact Administrator."
            ])->withInput();
        }
        return back()->with('messages', [
                    "success" => "Debt. updated successfully! Please search and make sure it exists in Search Debt. Screen."
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
