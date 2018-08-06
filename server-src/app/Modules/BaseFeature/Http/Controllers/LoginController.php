<?php

/**
 * File Login Controller
 * Hanlde request
 * @author TriHNM <minhtri191195@gmail.com>
 * @package App\Modules\BaseFeature\Http\Controllers
 * @date 2018-08-07
 */

namespace App\Modules\BaseFeature\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = '/demo';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Function render page login
     *
     * @return view
     */
    public function getLogin()
    {
        return view('BaseFeature::auth.login');
    }

    public function postLogin(Request $request)
    {
        dd($request->all());
    }
}
