@extends('layouts.app')

@section('title-block')аутентификация@endsection

@section('content')

    h1>Авторизация</h1>
    <form class="col-3 offset-4 border rounded" action="{{route('user.login')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="login" class="col-form-label-lg">Логин</label>
            <input type="text" id="login" class="form-control" name="login" value="" placeholder="Login" autofocus>
            @error('login')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password" class="col-form-label-lg">Пароль</label>
            <input type="password" id="password" class="form-control" name="password" value="" placeholder="Пароль" autofocus>
            @error('password')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg" name="sendMe" value="1">Войти</button>
        </div>
    </form>
@endsection


