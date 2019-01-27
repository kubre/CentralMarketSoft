<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Dashboard for the Adminstrator
     *
     * @return void
     */
    public function index()
    {
        $users = User::where('role', 'user')
                    ->orderBy('created_at', 'desc')
                    ->simplePaginate(15);

        return view('admin.dashboard')->with('users', $users);
    }

    /**
     * Approve user for logging in
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     */
    public function approveUser(Request $request, $id)
    {
        $user = User::find($id);
        $user->is_active = true;
        $user->save();
        return redirect('admin');
    }

    /**
     * Approve user for logging in
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     */
    public function disapproveUser(Request $request, $id)
    {
        $user = User::find($id);
        $user->is_active = false;
        $user->save();
        return redirect('admin');
    }
}
