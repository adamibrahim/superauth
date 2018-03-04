<?php

namespace Adam\Superauth\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Adam\Superauth\Models\Role;
class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('moderators')->except('updateRoles');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rolse = Role::all();
        return view()->first(['admin.dashboard', 'Superauth::admin.dashboard'])
            ->with('roles', $rolse);
    }

    /**
     * Update user Roles
     *
     * @param  \Illuminate\Http\Request  $request
     * @return redirect back
     */
    public function updateRoles(Request $request){
        if (!$request->role) {
            return redirect()->back()
                ->with('danger', trans('Superauth::auth.errorAtLeastOneRoleHasToBeSelected'));
        }
        Auth::user()->roles()->sync($request->role);
        return redirect()->back()
            ->with('success', trans('Superauth::auth.rolesUpdateSuccess'));
    }
}
