<!DOCTYPE html>
<html>
<head>
{{--    <title>{{isset($title_pages) ? $title_pages : 'Страница по умолчанию'}}</title>--}}
</head>
<body>
<header>
    хедер
</header>
<aside>
    сайдбар
</aside>
<main>

    @foreach($grades as $a)
    <p>{{$a->test_name}}</p>
    @endforeach

</main>
<footer>
    футер
</footer>
</body>
</html>
