<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(LoginRequest $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'name' => 'required',
        //     'email' => 'required|email',
        //     'password' => 'required|min:6',
        //     're_password' => 'required|min:6',
        // ], [
        //     'name.required' => __('validation.name'),
        //     'email.required' => __('validation.required', ['attribute' => 'email']),
        //     'email.email' => __('validation.email', ['attribute' => 'email']),
        //     'password.required' => __('validation.required', ['attribute' => 'password']),
        //     'password.min' => __('validation.min.numeric', ['attribute' => 'password', 'min' => 6]),
        //     're_password.required' => __('validation.required', ['attribute' => 'Re-password']),
        //     're_password.min' => __('validation.min.numeric', ['attribute' => 'Re-password', 'min' => 6]),
        // ]);

        // if ($validator->fails()) {
        //     return response()->json(['error' => $validator->errors()->all()]);
        // }

        // dd($request->all());

        $email = $request->email;
        $password = $request->password;
        $rePassword = $request->re_password;

        if (strcmp($password, $rePassword) !== 0) {
            toast(__('password.renew.incorrect'), self::TYPE_ERROR);
            return back();
            // return response()->json(['error' => __('validation.re-password')]);
        }

        // check email
        $emailCheck = User::select('email')->where('email', $email)->count();
        if ($emailCheck > 0) {
            toast(__('email.existed'), self::TYPE_ERROR);
            return back()->withInput();
            // return response()->json(['error' => __('validation.exists', ['attribute' => 'email'])]);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);
        // dd($request->all());
        // event(new Registered($user));
        toast(__('Register successfully.'), self::STATUS_SUCCESS);
        // return response()->json(['success' => __('Register successfully.')]);
        return back();
    }
}
