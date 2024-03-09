<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        try {
            if ($user->hasRole(['Super Admin', 'Admin'])) {
                return redirect('/dashboard')->with('success', 'Welcome back, Super Admin!');
            } else {
                return redirect('/home')->with('success', 'Welcome back! How are you?');
            }
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Oops! Something went wrong.')->with('toastr', 'error');
        }
    }

    public function logout(Request $request)
    {
        try {
            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect('/login')->with('success', 'Logged out! Hope to see you again soon.');;
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Oops! Something went wrong.')->with('toastr', 'error');
        }
    }
}
