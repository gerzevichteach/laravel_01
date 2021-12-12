<?php

namespace App\Http\Controllers\Grade;

use App\Http\Controllers\Controller;
use App\Models\Grades;
use App\Models\GradeUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

//use Illuminate\Support\Facades\DB;


class GradeController extends Controller
{
//    Просмотр всех групп
    public function index()
    {
        $grades = Grades::all();
        return view('grades.grade', ['grade' => $grades]);
    }

//    Добавление группы
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


    public function option($id)
    {
//        Атрибуты группы
        $results = Grades::where('id', $id)->first();


//        студенты группы
        $users = User::where('grades_users.grades_id', '=', $id)
            ->join('grades_users', 'users.id', '=', 'grades_users.users_id')
            ->get();
        return view('grades.option', ['result' => $results, 'user' => $users, 'id' => $id]);
    }

//    Запись измененных атрибутов группы
    public function option_save(Request $request)
    {
//        $this->validate($request, [
//            'name' => 'required|string|max:15',
//            'description' => 'required|string|max:100',
//            'grade_link' => 'required|string|max:20',
//            'id' => 'required|required|digits_between:1,2'
//        ]);

        Grades::where('id', $request->id)
            ->update(['name' => $request->name,
                'description' => $request->description,
                'grade_link' => $request->grade_link,
            ]);
        return $this->index();
    }

// Добавить студентов списком из формы
// (в запросе:
// username - список студентов,
// grade_id - id группы
    public function students_add(Request $request)
    {

//        $this->validate($request, [
//            'username' => 'required|string',
//            'id_grade' => 'required|digits_between:1,3',
//        ]);
        $id_grade = $request->id;
        $mass = explode("\n", $request->studentname);
        $count = count($mass);

        foreach ($mass as $lastfirstname) {
            $lfname = explode(" ", $lastfirstname);
            $zerro = preg_match("/[а-яё]/iu", $lfname[0]) + preg_match("/[а-яё]/iu", $lfname[1]);

            $str = mb_substr($lfname[0], 0, 7) . mb_substr($lfname[1], 0, 1);

            $converter = array('а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e',
                'ё' => 'e', 'ж' => 'zh', 'з' => 'z', 'и' => 'i', 'й' => 'y', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n',
                'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
                'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch', 'ь' => '\'', 'ы' => 'y', 'ъ' => '\'', 'э' => 'e', 'ю' => 'yu', 'я' => 'ya',

                'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'E', 'Ж' => 'Zh', 'З' => 'Z',
                'И' => 'I', 'Й' => 'Y', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O', 'П' => 'P', 'Р' => 'R',
                'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C', 'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sch',
                'Ь' => '\'', 'Ы' => 'Y', 'Ъ' => '\'', 'Э' => 'E', 'Ю' => 'Yu', 'Я' => 'Ya',);

            $strlatin = strtr($str, $converter);
            $password_user = rand(10000, 99999);

            $id_user = User::create([
                'lastname' => $lfname[1],
                'firstname' => $lfname[0],
                'passuser' => $password_user,
                'login' => $strlatin,
                'password' => Hash::make($password_user),
                'enabled' => '1',
                'condition' => '1',
                'nous' => '1'
            ]);

            GradeUser::create([
                'grades_id' => $id_grade,
                'users_id' => $id_user->id,
            ]);
        }
        return redirect()->route('grade.option',[$id_grade] );
    }

//    Удаление группы
    public function dell($id)
    {
        Grades::destroy($id);
        return $this->index();
    }
}
