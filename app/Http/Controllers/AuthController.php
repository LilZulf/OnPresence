<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //
    public function loginAdmin(Request $request)
    {
        return view('auth.login');
    }
    public function loginGuru(Request $request)
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return redirect('/login/admin')->withErrors($validator)->withInput();
        }

        $credentials = $request->only('email', 'password');
        $guard = $request->level == 'admin' ? 'web' : 'guru';

        if (Auth::guard($guard)->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/siswa');
        }

        return redirect('/login/' . $request->level)->withErrors([
            'email' => 'Kombinasi salah',
        ])->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login/guru');
    }

}
