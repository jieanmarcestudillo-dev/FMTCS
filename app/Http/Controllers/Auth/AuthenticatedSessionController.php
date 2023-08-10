<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
class AuthenticatedSessionController extends Controller
{

    public function create(): View
    {
        return view('auth.login');
    }

    public function admin_create(): View
    {
        return view('auth.admin_login');
    }

    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();

        if (Auth::check()) {
            if(Auth::user()->email_verified_at !== NULL && Auth::user()->role === 'USER'){
                return redirect()->route('welcome');
            }else{
                Auth::guard('web')->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                Session::put('valid_account','not_valid');
                return redirect()->route('login');
            }
        } else {
            Log::info(3);
            return redirect()->route('login');
        }
    }

    public function admin_store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();

        if (Auth::check()) {
            if(Auth::user()->email_verified_at !== NULL && Auth::user()->role === 'ADMIN'){
                return redirect()->route('adminDashboard');
            }else{
                Auth::guard('web')->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                Session::put('valid_account','not_valid');
                return redirect()->route('adminlogin');
            }
        } else {
            Log::info(3);
            return redirect()->route('admin');
        }
    }

    public function destroy(Request $request): RedirectResponse
    {
        if(Auth::user()->role == 'ADMIN'){
            Log::info('f');
            Auth::guard('web')->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect('/admin');
        }else{
            Log::info('1');
            Auth::guard('web')->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect('/');
        }
        
    }


}
