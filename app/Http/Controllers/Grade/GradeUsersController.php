<?php

namespace App\Http\Controllers\Grade;

use App\Http\Controllers\Controller;
use App\Models\GradeUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class GradeUsersController extends Controller
{

//    public function option_post_student(Request $request)
//    {
//        $this->validate($request, [
//            'lastname' => 'required|string|max:15',
//            'firstname' => 'required|string|max:15',
//            'passuser' => 'required|digits_between:4,7',
//
//            'login' => 'required|max:15',
//            'enabled'=>'required|digits_between:1,1',
//            'condition'=>'required|digits_between:1,1',
//            'nous'=>'required|digits_between:1,1',
//        ]);
//
//        $affected = DB::table('users')
//            ->where('id', '=', $request->id)
//            ->update([
//                'lastname' => $request->lastname,
//                'firstname' => $request->firstname,
//                'passuser' => $request->passuser,
//
//                'login' => $request->login,
//                'password' => Hash::make($request->passuser),
//                'enabled' => $request->enabled,
//                'condition' => $request->condition,
//                'nous' => $request->nous
//            ]);
//        return redirect()->route('grade.option_student',['id_student'=>$request->id]);
//    }

//    public function dell($id_student, $id_grade)
//    {
//        DB::table('users')->where('id', '=', $id_student)->delete();
//        return $this->index($id_grade);
//    }


// Добавить студентов списком из формы
// (в запросе:
// username - список студентов,
// grade_id - id группы
    public function students_add(Request $request)
    {

        $this->validate($request, [
            'username' => 'required|string',
            'id_grade' => 'required|digits_between:1,3',
        ]);
        $id_grade = $request->id_grade;
        $mass = explode("\n", $request->username);

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

            $id_user = User::insertGetId([
                'lastname' => $lfname[1],
                'firstname' => $lfname[0],
                'passuser' => $password_user,
                'login' => $strlatin,
                'password' => Hash::make($password_user),
                'enabled' => '1',
                'condition' => '1',
                'nous' => '1'
            ]);
            GradeUser::insert([
                'grades_id' => $id_grade,
                'users_id' => $id_user,
            ]);
        }
        return redirect()->route('grade.students', ['id_grade' => $id_grade]);
    }
}
