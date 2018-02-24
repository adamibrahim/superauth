<?php

namespace Adam\Superauth\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class ConfirmController extends Controller
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
     * Show the application dashboard.
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $user = User::findOrFail($id);
        return
            view()->first(['auth.confirm-email', 'Superauth::auth.confirm-email'])
            ->with('user', $user);
    }

    /**
     * Resend the confirmation email
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function resendConfirm(Request $request)
    {
        $user = User::findOrFail($request->id);

        // check if user is not active
        if (!$user->isActive()) {
            return redirect()->back()->with('danger', trans('Superauth::auth.thisUserIsNoLongerActive'));
        }

        // check if user email confirmed
        if ($user->isConfirmed()) {
            return redirect()->route('login')
                ->with('success', trans('Superauth::auth.yourEmailIsConfirmedYouMayLogin'));
        }

        $user->sendConfirmationEmail(route('confirm.token', $user->confirm_token));
        return redirect()
            ->back()
            ->with('success', trans('Superauth::auth.resentSuccess'));
    }

    /**
     * user email confirm
     *
     * @param  string  $confirm_token
     * @return array
     */
    public function confirmEmail($confirm_token)
    {
        $user = User::where('confirm_token', $confirm_token)->firstOrFail();
        $user->confirm_token = null;
        $user->confirmed = true;
        $user->save();
        return redirect()->route('login')
            ->with('success', trans('Superauth::auth.yourEmailIsConfirmedYouMayLogin'));
    }
}
