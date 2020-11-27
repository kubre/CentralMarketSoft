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
     * Dashboard for the Administrator
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
     * @param int $id
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
     * @param int $id
     * @return void
     */
    public function disapproveUser(Request $request, $id)
    {
        $user = User::find($id);
        $user->is_active = false;
        $user->save();
        return redirect('admin');
    }

    /**
     * Search for user
     *
     * @param Request $request
     * @return void
     */
    public function searchUser(Request $request)
    {
        $data = $request->validate([
            "mobile" => "required"
        ]);

        $users = User::where('role', 'user')
                      ->where('mobile', 'LIKE', "%{$data['mobile']}%")
                      ->orderBy('created_at', 'desc')
                      ->paginate(100);

        return view('admin.dashboard', [
            'users' => $users,
            'mobile' => $data['mobile'],
            'found' => $users->isNotEmpty()
        ]);
    }
}
