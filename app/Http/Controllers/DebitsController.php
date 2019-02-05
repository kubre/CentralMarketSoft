<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Debit;
use App\Farmer;
use App\Transaction;

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
            "amount" => "required|numeric",
            "comment" => "nullable|max:255",
        ]);

        $farmer = Farmer::where('aadhar', $data['identity'])
                            ->orWhere('pan', $data['identity'])
                            ->first();

        if (is_null($farmer)) {
            return back()->withErrors([
                "identity" => "Aadhar/PAN doesn't exist."
            ])->withInput();
        }

        $amountRounded = round($data['amount'], 2);

        $debt = new Debit();
        $debt->amount = $amountRounded;
        $debt->comment = $data['comment'];
        $debt->farmer_id = $farmer->id;
        $debt->user_id = Auth::user()->id;

        if ($debt->save()) {

            // Make transaction <- First transaction
            $transaction = new Transaction();
            $transaction->debit_id = $debt->id;
            $transaction->amount = $amountRounded;
            if ($transaction->save()) {
                return back()->with('messages', [
                "success" => "Debt. issued successfully! Please search and make sure it exists in Search Debt. Screen"
                ]);
            }
            // As transaction failed delete debt. also
            $debt->destroy();
        }

        // As good old days :) make user panic with error message; lol those exclamations
        return back()->withErrors([
            "problem" => "Problem! Problem! Creating debt. failed! Contact Administrator!"
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
        $debt = Debit::find($id);
        if (is_null($debt)) {
            return redirect('\dashboard');
        }
        return view('debits.show')->with('debt', $debt);
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
            "amount" => "required|numeric",
            "comment" => "nullable|max:255"
        ]);

        $amountRounded = round($data['amount'], 2);

        $debt = Debit::find($id);
        // If anything goes wrong we got amount
        $amountBefore = $debt->amount;
        $debt->amount = $amountRounded;
        $debt->comment = $data['comment'];

        if ($debt->save()) {

            // Make transaction <- Newer Transaction serves as record
            $transaction = new Transaction();
            $transaction->debit_id = $debt->id;
            $transaction->amount = $amountRounded;
            if ($transaction->save()) {
                return back()->with('messages', [
                "success" => "Debt. issued successfully! Please search and make sure it exists in Search Debt. Screen"
                ]);
            }
            // As transaction failed, Make no changes to debt. and return with errors
            $debt->amount = $amountBefore;
            $debt->save();
        }
        return back()->withErrors([
                    "problem" => "Problem while updating Debt.! Contact Administrator!"
                ])->withInput();
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
