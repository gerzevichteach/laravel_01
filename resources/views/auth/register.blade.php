@extends('layouts.app')
@section('title-block')регистрация@endsection

@section('content')
    <h1>Регистрация</h1>
    <form class="col-3 offset-4 border rounded" action="{{route('user.register')}}" method="POST">
        @csrf

        <div class="form-group">
            <label for="lastname" class="col-form-label-lg">Фамилия</label>
            <input type="text" id="lastname" class="form-control" name="lastname"
                   value="{{old('lastname')}}" placeholder="введите фамилию" autofocus>
            @error('lastname')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="firstname" class="col-form-label-lg">Имя</label>
            <input type="text" id="firstname" class="form-control" name="firstname"
                   value="{{old('firstname')}}" placeholder="введите имя" >
            @error('firstname')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="login" class="col-form-label-lg">Логин</label>
            <input type="text" id="login" class="form-control" name="login" value="{{old('login')}}"
                   placeholder="введите логин">
            @error('login')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
{{--        <input type="hidden" id="enabled" class="form-control" name="enabled" value=1>--}}
{{--        <input type="hidden" id="cond" class="form-control" name="cond" value=1>--}}
{{--        <input type="hidden" id="nous" class="form-control" name="nous" value=1>--}}

        <div class="form-group">
            <label for="passuser" class="col-form-label-lg">Пароль</label>
            <input type="text" id="passuser" class="form-control" name="passuser" value="{{old('passuser')}}"
                   placeholder="введите пароль">
            @error('passuser')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        <input type="hidden" id="password" class="form-control" name="password" value="222222">
{{--        <input type="hidden" id="type_user" class="form-control" name="type_user" value="Member">--}}

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg" name="sendMe" value="1">Регистрация</button>
        </div>
    </form>
@endsection
