@extends('layouts.app')

@section('content')
    {{--    Изменение спецификации--}}
    <form method="POST" action="{{route('karts.specification_option')}}">
        @csrf
        {{--        Наименование группы--}}
        <div class="panel panel-info">
            <div class="panel-heading"> спецификация</div>
            <div class="panel-body row col-md-4">
                <div class="form-group">
                    <textarea class="form-control" type="text" name="specification" id="specification" >{{$result->specification}}</textarea>
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

@endsection
