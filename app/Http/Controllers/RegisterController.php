<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        if (Auth::check()) {

            return redirect()->route('user.private');
        }
        return view('auth.register');
    }

    public function login(){
        return 'login';
    }

    public function story(Request $request)
    {
//        dd($request);
        $this->validate($request, [
            'lastname' => 'required|string|max:25',
            'firstname' => 'required|string|max:25',
            'passuser' => 'required|digits_between:4,7',
            'login' => 'required|max:15',
            'password' => 'required|digits_between:4,7',
            'type_user' => 'required|max:15',
            'enabled'=>'required|digits_between:1,1',
            'cond'=>'required|digits_between:1,1',
            'nous'=>'required|digits_between:1,1',
        ]);
        try {
            User::create([
                'lastname' => $request->lastname,
                'firstname' => $request->firstname,
                'passuser' => $request->passuser,

                'login' => $request->login,
                'password' => Hash::make($request->passuser),
                'type_user' => $request->type_user,
                'enabled' => $request->enabled,
                'cond' => $request->cond,
                'nous' => $request->nous
            ]);

            return redirect()->route('user.login');
        } catch (\Illuminate\Database\QueryException $e)
        {
            // show custom view
            //Or

            dump($e->errorInfo);

        }
    }
}
