<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Grade\AddGradeController;
use App\Http\Controllers\Grade\GradeController;
use App\Http\Controllers\Grade\GradeUsersController;
use App\Http\Controllers\Karts\NamesController;
use App\Http\Controllers\Karts\SpecificationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//Главная страницв
Route::get('/', function () {
    return view('index_page');
})->name('home');

//   Группа работы с пользователями
Route::name('user.')->group(function () {

//    Регистрация пользователей (Для записи в БД и отладки)
    Route::get('/auth/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/auth/register', [RegisterController::class, 'story']);

//    Страница аутентификации (добавить контроль enabled == 1)
    Route::get('/auth/login', [LoginController::class, 'index'])->name('login');
    Route::post('/auth/login', [LoginController::class, 'authenticate']);

//    Разлогинивание
    Route::get('/logout', function () {Auth::logout();
        return redirect()->route('home');})->name('logout');

//    Страница для зарегистрированных пользователей (для отладки)
    Route::get('/user/private', function (){
        return view('user.private');
    })->name('private');

//    Просмотр всех пользователей и изменение атрибутов пользователей (Без привязки к группе)
    Route::get('/user/users',[UserController::class, 'index'])->name('users');

    Route::get('/user/option_user/{id?}',[UserController::class, 'option_user'])->name('option');
    Route::post('/user/option_user/{id?}',[UserController::class, 'option_user_save'])->name('option');

//Удаление пользователя из БД
    Route::get('/user/users/dell/{id?}', [UserController::class, 'dell'])->name('dell');
});
//  Конец группы работы с пользователями

//  группа классов
Route::name('grades.')->group(function () {

////    Страница для зарегистрированных пользователей (для отладки)
//    Route::get('/user/private', function (){
//        return view('user.private');
//    })->name('private');

    Route::get('/grades/physic_10_base', function (){
        return view('grades.physic_10_base');
    })->name('physic_10_base');

});       //  Конец группы классов
//Студенты и группы
Route::name('grade.')->group(function () {

    //Просмотр всех групп
    Route::get('/grades/grade', [GradeController::class, 'index'])->name('grades');

    //Изменение атрибутов группы
    Route::get('/grades/option/{id?}', [GradeController::class, 'option'])->name('option');
    Route::post('/grades/option/{id?}', [GradeController::class, 'option_save']);

    //Добавление группы
    Route::get('/grades/add', function () {
        return view('grades.add');
    })->name('add');
    Route::post('/grades/add', [GradeController::class, 'add_grade']);

//Удаление группы
    Route::get('/grades/dell/{id?}', [GradeController::class, 'dell'])->name('dell');

//    Просмотр студентов группы + формы для добавления студентов
//    Route::get('/grades/student/{id_grade?}', [GradeUsersController::class, 'index'])->name('students');
//    Route::get('/student/add/{id_grade?}', function ()
//    {
//        return view('student.add');
//    })->name('student_add');
    Route::post('/grade/add/{id_grade?}', [GradeController::class, 'students_add'])->name('students_add');

//    //    Изменение атрибутов студента
//    Route::get('/student/option/{id_student?}', [GradeUsersController::class, 'option'])->name('option_student');
//    Route::post('/student/option/{id_student?}', [GradeUsersController::class, 'option_post_student']);
//
//    //Удаление студента из БД
//    Route::get('/student/dell/{id_student?}/{id_grade?}', [GradeUsersController::class, 'dell'])->name('student_dell');
});

// Карточки
Route::name('karts.')->group(function () {

    //Просмотр имен карточек
    Route::get('/karts/name', [NamesController::class, 'index'])->name('name');


    //Добавление название карточки
    Route::get('/karts/add', function () {
        return view('karts.add');
    })->name('add');
    Route::post('/karts/add', [NamesController::class, 'add_name']);

    //Просмотр спецификаций
    Route::get('/karts/specification/{id?}', [SpecificationController::class, 'index'])->name('specification');

    //Добавление спецификации
    Route::get('/karts/specification_add', function () {
        return view('karts.specification_add');
    })->name('specification_add');
    Route::post('/karts/specification_add', [SpecificationController::class, 'specification_add']);

    //Изменение спецификацию
    Route::get('/karts/specification_option/{id?}', [SpecificationController::class, 'option'])->name('specification_option');
    Route::post('/karts/specification_option/{id?}', [SpecificationController::class, 'option_save']);
});
