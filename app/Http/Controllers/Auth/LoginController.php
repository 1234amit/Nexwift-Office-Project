<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
// use Illuminate\Support\Facades\Auth;

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
  //protected $redirectTo = RouteServiceProvider::HOME;

  public function authenticated()
  {
    if (Auth::user()->role == '1') //1 for admin 0 for user, 2 for hr, 3 for employee
    {
      return redirect('admin/dashboard');
    } else if (Auth::user()->role == '0') //0 for normal user
    {
      return redirect('/home');
    } else if (Auth::user()->role == '2') //0 for normal user
    {
      return redirect('/hr/dashboard');
    } else if (Auth::user()->role == '3') //0 for normal user
    {
      return redirect('/employee/dashboard');
    } else {
      return redirect('/');
    }
  }

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('guest')->except('logout');
  }
}
