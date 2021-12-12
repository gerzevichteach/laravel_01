@extends('layouts.app')
@section('title-block')Пользователь@endsection
@section('content')
    <h3>Option_user</h3>
    <form class="col-3 offset-4 border rounded" method="POST" action="{{route('user.option')}}">
        @csrf
        <div class="form-group">
            <input type="text" id="lastname" class="form-control" name="lastname"
                   value="{{$user->lastname}}" autofocus>
        </div>
        <div class="form-group">
            <input type="text" id="firstname" class="form-control" name="firstname"
                   value="{{$user->firstname}}">
        </div>

        <div class="form-group">
            <input type="text" id="login" class="form-control" name="login"
                   value="{{$user->login}}">
        </div>
        <div class="form-group">
            <input type="text" id="passuser" class="form-control" name="passuser"
                   value="{{$user->passuser}}">
        </div>
        <div class="form-group">
            <input type="text" id="enabled" class="form-control" name="enabled"
                   value="{{$user->enabled}}">
        </div>
        <div class="form-group">
            <input type="text" id="cond" class="form-control" name="cond"
                   value="{{$user->cond}}">
        </div>
        <div class="form-group">
            <input type="text" id="nous" class="form-control" name="nous"
                   value="{{$user->nous}}">
        </div>

        <input type="hidden" id="id" class="form-control" name="id" value={{$user->id}}>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg" name="sendMe" value="1">
                сохранить изменения
            </button>
        </div>

    </form>

@endsection
