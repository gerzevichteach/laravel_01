@section('top_nav')
    <header>
        <div class="container col-12">

            <nav class="d-inline-flex justify-content-end">
                @unless(\Illuminate\Support\Facades\Auth::check())
                    <a class="me-3 py-2 text-white text-decoration-none" href="{{route('user.login')}}">Войти</a>
                    <a class="me-3 py-2 text-white text-decoration-none"
                       href="{{route('user.register')}}">Регистрация</a>
                @endunless

                @if(\Illuminate\Support\Facades\Auth::check())
                    {{--                    <a class="me-3 py-2 text-white text-decoration-none" href="{{route('grade.students',['id_grade'=>'5'])}}">Students for Grades(5)</a>--}}
                    <a class="me-3 py-2 text-white text-decoration-none" href="{{route('grade.grades')}}">Grades</a>

                    <div class="dropdown">
                        <a class="me-3 py-2 text-white text-decoration-none dropdown-toggle" href="#"
                           id="dropdownMenuLink_karts"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            Karts
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink_karts">
                            <li><a class="dropdown-item me-3 py-2 text-black text-decoration-none"
                                   href="{{route('karts.name')}}">Karts</a></li>
                            <li><a class="dropdown-item me-3 py-2 text-black text-decoration-none"
                                   href="{{route('karts.specification')}}">Specification</a></li>
                            <li><a class="dropdown-item me-3 py-2 text-black text-decoration-none"
                                   href="#">Что-то еще здесь</a></li>
                        </ul>
                    </div>
                        <div class="dropdown">
                            <a class="me-3 py-2 text-white text-decoration-none dropdown-toggle" href="#"
                                                          id="dropdownMenuLink_tests"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                Tests
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink_tests">
                                <li><a class="dropdown-item me-3 py-2 text-black text-decoration-none"
                                       href="{{route('karts.name')}}">Tests</a></li>
                                <li><a class="dropdown-item me-3 py-2 text-black text-decoration-none"
                                       href="{{route('karts.specification')}}">Specification</a></li>
                                <li><a class="dropdown-item me-3 py-2 text-black text-decoration-none"
                                       href="#">Что-то еще здесь</a></li>
                            </ul>
                        </div>

                    <a class="me-3 py-2 text-white text-decoration-none" href="{{route('user.users')}}">Users</a>
                    <a class="me-3 py-2 text-white text-decoration-none" href="{{route('user.logout')}}">Выход</a>
                @endif

            </nav>
        </div>
    </header>


