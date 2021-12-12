@extends('layouts.app')

@section('title-block')основная страница@endsection

@section('content')

    <div class="select">

        <div class="content"><a href="">ИНФОРМАТИКА 7
                <br>
                <img  class="img" src="{{asset('/images/groups_avatar/1.jpg')}}" alt=""></a></div>
        <div class="content"><a href=""> ИНФОРМАТИКА 8А
                <br>
                <img  class="img" src="{{asset('/images/groups_avatar/2.jpg')}}" alt=""></a></div>

        <div class="content"><a href=""> ИНФОРМАТИКА 9
                <br>
                <img  class="img" src="{{asset('/images/groups_avatar/3.jpg')}}" alt=""></a></div>

        <div class="content"><a href=""> ИНФОРМАТИКА 10 ПРОФИЛЬ
                <br>
                <img  class="img" src="{{asset('/images/groups_avatar/4.jpg')}}" alt=""></a></div>

        <div class="content"><a href=""> ИНФОРМАТИКА 10 БАЗА
                <br>
                <img  class="img" src="{{asset('/images/groups_avatar/5.jpg')}}" alt=""></a></div>

        <div class="content"><a href=""> ИНФОРМАТИКА 11 ПРОФИЛЬ
                <br>
                <img  class="img" src="{{asset('/images/groups_avatar/6.jpg')}}" alt=""></a></div>

        <div class="content"><a href=""> ИНФОРМАТИКА 11 БАЗА
                <br>
                <img  class="img" src="{{asset('/images/groups_avatar/7.jpg')}}" alt=""></a></div>

        <div class="content"><a href="{{route('grades.physic_10_base')}}"> ФИЗИКА 10 База
                <br>
                <img  class="img" src="{{asset('/images/groups_avatar/8.jpg')}}" alt=""></a></div>

        <div class="content"><a href=""> ФИЗИКА 10 ПРОФ
                <br>
                <img  class="img" src="{{asset('/images/groups_avatar/8.jpg')}}" alt=""></a></div>

        <div class="content"><a href=""> ФИЗИКА 11
                <br>
                <img  class="img" src="{{asset('/images/groups_avatar/9.jpg')}}" alt=""></a></div>

        <div class="content"><a href="">МАТЕМАТИКА 5
                <br>
                <img  class="img" src="{{asset('/images/groups_avatar/10.png')}}" alt=""></a></div>

        <div class="content"><a href=""> МАТЕМАТИКА 6
                <br>
                <img  class="img" src="{{asset('/images/groups_avatar/11.png')}}" alt=""></a></div>

        <div class="content"><a href=""> МАТЕМАТИКА 7
                <br>
                <img  class="img" src="{{asset('/images/groups_avatar/12.png')}}" alt=""></a></div>

        <div class="content"><a href="https://stepik.org/">stepik.org
                <br>
                <img src='https://is3-ssl.mzstatic.com/image/thumb/Purple128/v4/4e/a1/16/4ea116b0-dc05-d7c3-fe8c-a2d603f21cad/AppIcon-1x_U007emarketing-85-220-0-9.png/1080x800bb.jpg' class="img" alt=""></a></div>
        <div class="content"><a href="https://informatics.msk.ru/">informatics.msk
                <br>
                <img src='https://sun9-65.userapi.com/impf/c836739/v836739219/13859/f9l9I5xaSqg.jpg?size=0x179&crop=0,0,1,1&quality=95&sign=3a9a68b4a1ba6c3ff5fa14ae77ea1b48' class="img" alt=""></a></div>
    </div>
@endsection
