<?php

namespace Adam\Superauth\Controllers;

use App\Http\Controllers\Controller;
use Adam\Superauth\Models\Role;
class ProfileController extends Controller
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
        $rolse = Role::all();
        return view()->first(['profile', 'Superauth::profile'])
            ->with('roles', $rolse);
    }
}
