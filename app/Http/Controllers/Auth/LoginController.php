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
            if ($user->is_approved == 1) {
                // User is approved, proceed with login
                if ($user->hasRole(['Super Admin', 'Admin'])) {
                    return redirect('/dashboard')->with('success', 'Welcome back, Super Admin!');
                } else {
                    return redirect('/home')->with('success', 'Welcome back! How are you?');
                }
            } elseif ($user->is_approved == 0) {
                // User is pending approval
                Auth::logout(); // Logout the user
                return redirect('/login')->with('warning', 'Wait! Your account is pending approval.');
            } else {
                // User is denied approval
                Auth::logout(); // Logout the user
                return redirect('/login')->with('error', 'Sorry! Your account has been denied.');
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
