@extends('layouts.app')
@section('content')
    <h1>Add grade</h1>
    <form method="POST" action="{{route('grade.add')}}">
        <form >
        @csrf
        <div class="panel panel-info">
            <div class="panel-heading">наименование класса</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control" type="text" name="name" id="name" value="" placeholder="название нового класса">
                        </div>


                    </div>
                    <div class="col-md-6">

                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-info">
            <div class="panel-heading">Описание класса</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control" type="text" name="description" id="description" value="" placeholder="описание класса">
                        </div>


                    </div>
                    <div class="col-md-6">

                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-info">
            <div class="panel-heading">Link класса</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control" type="text" name="grade_link" id="grade_link" value="" placeholder="grade_link">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg" name="sendMe" value="1">сохранить
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form>

@endsection
