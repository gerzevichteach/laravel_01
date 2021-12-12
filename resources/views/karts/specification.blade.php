@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-md-12">
            <h2>Specification</h2>
            <table class="table table-hover">
                <tbody>
                <tr>
                    <th>#</th>
                    <th>Specification</th>
                    <th>Операции</th>
                </tr>
                @foreach ($specifications as $e)
                    <tr>
                        <td>{{$e->id}}</td>
                        <td>{{$e->specification}}</td>
                        <td>
                            <div class="btn-group" role="group">

                                <a type="button" class="btn btn-info" href="{{route('karts.specification_option')}}/{{$e->id}}">
                                    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>&nbsp;&nbsp;изм
                                </a>

                            </div>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="2">
                        <a type="button" class="btn btn-primary" href="{{route('karts.specification_add')}}">
                            <span class="glyphicon glyphicon-list" aria-hidden="true"></span>&nbsp;&nbsp;
                            добавить
                        </a>
                    </td>

                </tr>
                </tbody>
            </table>
        </div>
@endsection
