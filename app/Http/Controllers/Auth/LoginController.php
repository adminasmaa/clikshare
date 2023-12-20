<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Lang;

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

    public function authenticated(Request $request, $user)
    {
        if($user->can('View Dashboard') && $user->user_type === 1) {
            return redirect('/admin/dashboard');
        } else if ($user->can('View Dashboard') && $user->user_type === 2) {
            return redirect('/moderator/dashboard');
        } else if ($user->can('View Dashboard') && $user->user_type === 3) {
            return redirect('/trader/dashboard');
        } else {
            return redirect()->back()->with('error', Lang::get('auth.user_not_have_permissions'));
        }
    }

}
