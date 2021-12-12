@extends('layouts.app')

@section('content')
    {{--    Изменение атрибутов группы--}}
    <form method="POST" action="{{route('grade.option')}}">
        @csrf
        {{--        Наименование группы--}}
        <div class="panel panel-info">
            <div class="panel-heading"> наименование группы</div>
            <div class="panel-body row col-md-4">
                <div class="form-group">
                    <input class="form-control" type="text" name="name" id="name" value="{{$result->name}}">
                </div>
            </div>
        </div>
        {{--        Описание группы--}}
        <div class="panel panel-info">
            <div class="panel-heading">Описание группы</div>
            <div class="panel-body row col-md-4">
                <div class="form-group">
                    <input class="form-control" type="text" name="description" id="description"
                           value="{{$result->description}}">
                </div>
            </div>
        </div>
        {{--        Линк группы--}}
        <div class="panel panel-info">
            <div class="panel-heading">линк класса</div>
            <div class="panel-body row col-md-4">
                <div class="form-group">
                    <input class="form-control" type="text" name="grade_link" id="grade_link"
                           value="{{$result->grade_link}}">
                </div>
                <input type="hidden" id="id" class="form-control" name="id" value={{$id}}>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg" name="sendMe" value="1">
                        сохранить изменения
                    </button>
                </div>
            </div>
        </div>
    </form>
    {{--Просмотр студентов группы--}}
    <div class="container-fluid">
        <div class="col-md-12">
            <h3>GradeUsers</h3>

            <table class="table table-hover">
                <tr>
                    <th>#</th>
                    <th>Ученик</th>
                    <th width="5">Логин</th>
                    <th width="5">Пароль</th>
                    <th>Операции</th>
                </tr>
                <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach($user as $item)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$item->lastname}} {{$item->firstname}}</td>
                        <td>{{$item->login}}</td>
                        <td>{{$item->passuser}}</td>
                        <td>
                            <input type="hidden" id="id" name="id" value={{$item->id}}>

                            <div class="btn-group" role="group">

                                <a type="button" class="btn btn-info" href="{{route('user.option')}}/{{$item->id}}">
                                    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>&nbsp;&nbsp;изм
                                </a>

                                <a type="button" href="{{route('user.dell')}}/{{$item->id}}"
                                   class="btn btn-danger btn-xs "
                                   aria-expanded="false"> удалить
                                </a>

                            </div>
                        </td>
                    </tr>
                    @php
                        $i++;
                    @endphp
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{--    Добавление студентов в группу--}}
    <form name="studentadd" id="studentadd" method="post" action="{{route('grade.students_add')}}">
        @csrf
        <input type="hidden" id="id" class="form-control" name="id" value={{$id}}>
        <div class="form-group">
            <label for="studentname"><h2>Регистрация новых учащихся:</h2></label>
            <textarea class="form-control" type="text" name="studentname" id="studentname" rows="5"
                      placeholder="введите фамилию имя (каждого ученика в отдельной строке)"></textarea>
            <input class="btn btn-primary" type="submit" name="action" value="Добавить учащихся в группу"/>
        </div>
    </form>
@endsection
