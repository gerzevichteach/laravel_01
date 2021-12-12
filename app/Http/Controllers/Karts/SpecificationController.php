<?php

namespace App\Http\Controllers\Karts;

use App\Http\Controllers\Controller;
use App\Models\KartName;
use App\Models\KartSpecification;
use Illuminate\Http\Request;

class SpecificationController extends Controller
{
    //    Просмотр всех спецификаций
    public function index($id)
    {
        $specifications = KartSpecification::where('name_id', $id)->get();
        return view('karts.specification', ['specifications' => $specifications, 'id' => $id]);
    }

//    Добавление спецификации
    public function specification_add(Request $request)
    {
        dd($request);
//        $this->validate($request, [
//            'name' => 'required|string|max:15',
//            'description' => 'required|string|max:100',
//            'grade_link' => 'required|string|max:15'
//        ]);

        KartSpecification::insert([
            'specification' => $request->specification,
            'name_id' => $request->name_id,


        ]);

        return redirect()->route('karts.specification');
    }

    public function option($id)
    {
//        Спецификация
        $results = KartSpecification::where('id', $id)->first();

        return view('karts.specification_option', ['result' => $results, 'id' => $id]);
    }

//    Запись измененных атрибутов спецификации
    public function option_save(Request $request)
    {
//        $this->validate($request, [
//            'name' => 'required|string|max:15',
//            'description' => 'required|string|max:100',
//            'grade_link' => 'required|string|max:20',
//            'id' => 'required|required|digits_between:1,2'
//        ]);

        KartSpecification::where('id', $request->id)
            ->update(['specification' => $request->specification,

            ]);
        return $this->index();
    }
}
