<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password', 'blocked');

        if (Auth::attempt(['email' => $email, 'password' => $password, 'blocked' => 0])) {
            // The user is active, not suspended, and exists.
            // Authentication passed...
            return redirect()->intended('/profile');
        }
    }
    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        $credientials = $request->only($this->username(), 'password');
        $credientials['blocked'] = 0;
        return $request->only($this->username(), 'password');
    }

      /*
    protected function guard()
    {
        return Auth::guard('Unbanned');
    }
    */
    //username
    /*
    public function username()
    {
        return 'username';
    }
    */
}
