@extends('layouts.app')
@section('title-block')Пользователи@endsection
@section('content')
    <div class="container-fluid">
        <div class="col-md-12">
    <h3>Users</h3>

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
            @foreach($user as $u)
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$u->lastname}} {{$u->firstname}}</td>
                    <td>{{$u->login}}</td>
                    <td>{{$u->passuser}}</td>
                    <td>
                        <input type="hidden" id="id" name="id" value={{$u->id}}>

                        <div class="btn-group" role="group">

                            <a type="button" class="btn btn-info" href="{{route('user.option')}}/{{$u->id}}">
                                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>&nbsp;&nbsp;изм
                            </a>

                            <a type="button" href="{{route('user.dell')}}/{{$u->id}}"
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
        </div></div>
@endsection
