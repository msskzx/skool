<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Illuminate\Http\Request;

use Auth;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * handle login post request
     * @param  Request $request
     * @return view
     */
    public function login(Request $request) {
      $this->validate($request, [
         'username' => 'required',
         'password' => 'required'
      ]);

      $credentials = $request->only('username', 'password');

      if (Auth::attempt($credentials)) {
         return redirect()->intended($this->redirectPath());
      }

      return redirect('login')
                ->withInput($request->only('username'))
                ->withErrors(['username' => $this->getFailedLoginMessage()]);
  }
}
