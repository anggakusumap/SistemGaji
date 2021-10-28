<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
    public function redirectTo()
    {
        $role = Auth::user()->role;
        switch ($role) {
            case 'ADMIN':
                return '/admin';
                break;
            case 'PEGAWAI':
                return '/pegawai';
                break;

            default:
                return '/admin';
                break;
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

    public function showLoginForm()
    {
        return view('auth.login2');
    }

    protected function authenticated(Request $request, $user)
    {
        $data = User::where('username', $request->username)->firstorFail();

        if (Hash::check($request->password, $data->password)) {
            return redirect(route('dashboarduser'));
        }
        return redirect('/')->with('message', 'Username atau password salah');
    }

    public function username()
    {
        return 'username';
    }
}
