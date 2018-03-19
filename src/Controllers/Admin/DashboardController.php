<?php

namespace Adam\Superauth\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // if you don't use middleware at Routes then you may uncomment the below line
        //$this->middleware('moderators')->except('updateRoles');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view()->first(['admin.dashboard', 'Superauth::admin.dashboard']);
    }

}
