<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Просмотр списка пользователей
    public function index()
    {
//        $users = User::all();
        $users = User::
        where('id','>','10')->get();

        return view('user.users', ['user' => $users ]);
    }

    public function option_user($id)
    {
        $results = User::where('id', $id)->first();

        return view('user.option_user', ['user' => $results]);
    }

    public function option_user_save(Request $request)
    {

//        $this->validate($request, [
//            'lastname' => 'required|string|max:25',
//            'firstname' => 'required|string|max:25',
//            'passuser' => 'required|digits_between:4,7',
//            'login' => 'required|max:15',
//            //'password' => 'required|digits_between:4,7',
//            //'type_user' => 'required|max:15',
//            'enabled'=>'required|digits_between:1,1',
//            'cond'=>'required|digits_between:1,1',
//            'nous'=>'required|digits_between:1,1',
//        ]);
        try {

            User::where('id', '=', $request->id)
                ->update([
                'lastname' => $request->lastname,
                'firstname' => $request->firstname,
                'passuser' => $request->passuser,
                'login' => $request->login,
                'password' => Hash::make($request->passuser),
                'enabled' => $request->enabled,
                'cond' => $request->cond,
                'nous' => $request->nous
            ]);

          return redirect()->route('user.users');
        } catch (\Illuminate\Database\QueryException $e)
        {
            dump($e->errorInfo);
        }
    }
    public function dell($id)
    {
        User::destroy($id);
        return $this->index();
    }

}
