<?php

namespace Adam\Superauth\Controllers\Auth;

use Adam\Superauth\Traits\AuthRedirect;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    use AuthRedirect;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('visitor')->except('logout', 'lock', 'lockScreen');
    }


    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view()->first(['auth.login', 'Superauth::auth.login']);
    }


    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }
        // check if email not exist
        if (!$user=User::getUserByEmail($request->email)) {
            return redirect()->back()->with('danger', trans( 'Superauth::auth.thisEmailNotFound'));
        }

        // check if user is not active
        if (!$user->isActive()) {
            return redirect()->back()->with('danger', trans('Superauth::auth.thisUserIsNoLongerActive'));
        }

        // check if user email not confirmed
        if (!$user->isConfirmed()) {
            return redirect()->route('confirm.email', $user->id)
                ->with('warning', trans('Superauth::auth.needToConfirmYourEmailBeforeLogin'));
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $redirect = $this->logoutRedirect();
        $this->guard()->logout();
        return redirect($redirect);
    }

    /**
     * Log the user out of the application.and return to lock Screen
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function lock(Request $request)
    {
        $user = Auth::user()->id;
        $this->guard()->logout();
        return redirect()
            ->route('lock.screen', $user);
    }

    /**
     * Show view Lock Screen with
     *
     * @param  $user
     * @return view
     */
    public function lockScreen(User $user)
    {
        return view()->first(['auth.lock', 'Superauth::auth.lock'])
            ->with('user', $user);
    }

    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath()
    {
        return $this->loginRedirect();

    }
}
