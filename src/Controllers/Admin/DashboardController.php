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
        //$this->middleware('moderators');
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
