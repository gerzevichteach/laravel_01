@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-md-12">
            <h2>карточки</h2>
            <table class="table table-hover">
                <tbody>
                <tr>
                    <th>#</th>
                    <th>Карточки</th>
                    <th>Операции</th>
                </tr>
                @foreach ($names as $e)
                    <tr>
                        <td>{{$e->id}}</td>
                        <td>{{$e->name}}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a type="button" class="btn btn-primary" href="{{route('karts.specification')}}/{{$e->id}}">
                                    <span class="glyphicon glyphicon-list" aria-hidden="true"></span>&nbsp;&nbsp;
                                    спецификация
                                </a>
{{--                                <a type="button" class="btn btn-info" href="{{route('karts.option')}}/{{$gr->id}}">--}}
{{--                                    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>&nbsp;&nbsp;настройки--}}
{{--                                </a>--}}
{{--                                <a type="button" class="btn btn-danger" href="{{route('grade.dell')}}/{{$gr->id}}">--}}
{{--                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;&nbsp;удалить--}}
{{--                                </a>--}}
                            </div>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="2">
                        <a type="button" class="btn btn-primary" href="{{route('karts.add')}}">
                            <span class="glyphicon glyphicon-list" aria-hidden="true"></span>&nbsp;&nbsp;
                            добавить карточку
                        </a>
                    </td>

                </tr>
                </tbody>
            </table>
        </div>
@endsection
