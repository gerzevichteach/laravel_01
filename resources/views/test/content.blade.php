@extends('layouts.app')

@section('title-block')основное содержание@endsection
@section('content')

    <h1>CONTENT tt</h1>
@endsection

@section('aside')
    @parent
    <p>Дополниетельный текст</p>
@endsection
{{--@php--}}
{{--echo phpinfo()--}}

{{--@endphp--}}
