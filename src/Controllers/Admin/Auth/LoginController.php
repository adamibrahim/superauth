<?php

namespace Adam\Superauth\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
class LoginController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view()->first(['admin.auth.login', 'Superauth::admin.auth.login']);
    }




}
