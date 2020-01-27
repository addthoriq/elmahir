<?php

namespace App\Http\Controllers\AuthStudent;

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

    protected $guard = 'student';
    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest:student')->except(['logout','showLoginForm']);
    }

    public function guard()
    {
        return Auth::guard('student');
    }

    public function logout()
    {
        //logout user
        auth('student')->logout();
        // redirect to homepage
        return redirect('/');
    }
}
