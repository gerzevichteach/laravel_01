<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index()
    {
// Если пользователь авторизван
        if (Auth::check()) {
            return redirect()->route('user.private');
        }
        return view('auth.login');
    }


    public function authenticate(Request $request)
    {

        $credentials = $request->validate([
            'login' => 'required|max:15',
            'password' => 'required|digits_between:4,7',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('user.private', 'request');
        }
        return redirect(route('auth.login'))->withErrors(['login' => 'Не удалось авторизоваться']);
    }
}
