<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        if (Auth::guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ], $request->remember)) {
            $request->session()->regenerate();

            return redirect('/admin/dashboard');
        }

        if (Auth::guard('user')->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ], $request->remember)) {
            $request->session()->regenerate();
            toast(__('Welcome back.'), 'success')->position('top');

            return redirect(url()->previous());
        }
        toast(__('auth.failed'), 'error')->autoClose(10000);

        return back()->withErrors(__('auth.failed'))->withInput();

        /**
         * * Hien thi loi tren View
         * @if (session('errors'))
         *<div class="alert alert-danger">
         *    {{ session('status') }}
         *</div>
         *@endif
         */
    }

    public function logout(Request $request)
    {
        if (Auth::guard('user')->check() || auth('admin')->check()) {
            Auth::guard('user')->logout();
            auth('admin')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            toast(__('You are logged out.'), 'warning');
        } else {
            Alert::error(__('Error.'), __('You are not logged in yet.'));
        }

        return redirect()->intended();
    }
}
