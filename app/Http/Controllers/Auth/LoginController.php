<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        createRoles();
        $this->middleware('guest')->except('logout');
    }

    public function redirectTo() {
        if (Auth::user()->hasRole('client')) {
            return 'client';
        } else if (Auth::user()->hasRole('publisher')) {
            return 'publisher';
        } else if (Auth::user()->hasRole('admin')) {
            return 'administrator/dashboard';
        } else {
            //
        }
    }
}
