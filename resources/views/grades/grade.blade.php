@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-md-12">
            <h2>Grades</h2>
            <table class="table table-hover">
                <tbody>
                <tr>
                    <th>#</th>
                    <th>Группа</th>
                    <th>Операции</th>
                </tr>
                @foreach ($grade as $gr)
                    <tr>
                        <td>{{$gr->id}}</td>
                        <td>{{$gr->name}}</td>
                        <td>
                            <div class="btn-group" role="group">
{{--                                <a type="button" class="btn btn-primary" href="{{route('grades.students')}}/{{$gr->id}}">--}}
{{--                                    <span class="glyphicon glyphicon-list" aria-hidden="true"></span>&nbsp;&nbsp;список--}}
{{--                                    учащихся--}}
{{--                                </a>--}}
                                <a type="button" class="btn btn-info" href="{{route('grade.option')}}/{{$gr->id}}">
                                    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>&nbsp;&nbsp;настройки
                                </a>
                                <a type="button" class="btn btn-danger" href="{{route('grade.dell')}}/{{$gr->id}}">
                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;&nbsp;удалить
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="2">
                        <a type="button" class="btn btn-primary" href="{{route('grade.add')}}">
                            <span class="glyphicon glyphicon-list" aria-hidden="true"></span>&nbsp;&nbsp;создать
                            группу
                        </a>
                    </td>

                </tr>
                </tbody>
            </table>
        </div>
@endsection
