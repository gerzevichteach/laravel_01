<?php

namespace App\Http\Controllers\Grade;

use App\Http\Controllers\Controller;
use App\Models\Grades;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddGradeController extends Controller
{
    public function add_grade(Request $request)
    {

//        $this->validate($request, [
//            'name' => 'required|string|max:15',
//            'description' => 'required|string|max:100',
//            'grade_link' => 'required|string|max:15'
//        ]);

        Grades::insert([
            'name' => $request->name,
            'description' => $request->description,
            'grade_link' => $request->grade_link,
        ]);

//        $grade = DB::select('select * from grades');
        return redirect()->route('grade.grades');
    }
}
