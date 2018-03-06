<?php

namespace Adam\Superauth\Traits;
use Illuminate\Support\Facades\Auth;

trait AuthRedirect
{
    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function loginRedirect()
    {
        return Auth::user()->isModerator() ? route('admin.test.dashboard') : route('test.profile');

    }

    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function logoutRedirect()
    {

        return Auth::user()->isModerator() ? route('admin.login') : route('login');

    }
}