@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-md-12">
        <h3>Группа: {{$name}}</h3>
            <table class="table table-hover">
        <tr>
            <th>#</th>
            <th>Ученик</th>
            <th>Логин</th>
            <th>Пароль</th>
            <th>Операции</th>
        </tr>
        <tbody>


        @foreach($user as $u)
            <tr>
                <td>{{$i}}</td>
                <td>{{$u->lastname}} {{$u->firstname}}</td>
                <td>{{$u->login}}</td>
                <td>{{$u->passuser}}</td>
                <td>


                    <div class="btn-group" role="group">

                            <a type="button" class="btn btn-info" href="{{route('grade.option_student')}}/{{$u->users_id}}">
                                изменить
                            </a>
                            <a type="button" class="btn btn-danger" href="{{route('grade.student_dell')}}/{{$u->users_id}}/{{$id_grade}}">
                                &nbsp;&nbsp;удалить
                            </a>

                    </div>
                </td>
            </tr>
            @php
                $i++
            @endphp
        @endforeach

        </tbody>
    </table>
        </div></div>

    <form  method="post" action="{{route('grade.student_add')}}">
        @csrf
        <input type="hidden" name="id_grade" id="id_grade" value="{{$id_grade}}"/>
        <div class="form-group">
            <label for="username"><h3>Регистрация новых учащихся:</h3></label>
            <textarea class="form-control" type="text" name="username" id="username" rows="5"
                      placeholder="введите фамилию имя (каждого ученика в отдельной строке)"></textarea>
            <button class="btn btn-primary" type="submit" name="sendMe" value="1">Добавить учащихся в группу</button>
            </div>
    </form>
@endsection
