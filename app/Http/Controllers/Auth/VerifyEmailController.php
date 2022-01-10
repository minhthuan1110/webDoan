<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class VerifyEmailController extends Controller
{
    /**
     * Request Re-send verification email.
     */
    public function resendEmail(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link sent!');
    }

    /**
     * Verification email.
     */
    public function verification(EmailVerificationRequest $request)
    {
        $request->fulfill();
        return redirect('/');
    }
}
