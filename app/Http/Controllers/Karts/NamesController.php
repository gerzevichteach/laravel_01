<?php

namespace App\Http\Controllers\Karts;

use App\Http\Controllers\Controller;
use App\Models\KartName;
use Illuminate\Http\Request;

class NamesController extends Controller
{
    //    Просмотр всех групп
    public function index()
    {
        $names = KartName::all();
        return view('karts.name', ['names' => $names]);
    }

//    Добавление имени карточки
    public function add_name(Request $request)
    {

//        $this->validate($request, [
//            'name' => 'required|string|max:15',
//            'description' => 'required|string|max:100',
//            'grade_link' => 'required|string|max:15'
//        ]);

        KartName::insert([
            'name' => $request->name,
            'description' => $request->description,

        ]);

        return redirect()->route('karts.name');
    }
}
