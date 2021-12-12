@extends('layouts.app')
@section('content')
    <h1>Add kart name</h1>
    <form method="POST" action="{{route('karts.add')}}">
        <form >
        @csrf
        <div class="panel panel-info">
            <div class="panel-heading">наименование карточки</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control" type="text" name="name" id="name" value="" placeholder="название ">
                        </div>


                    </div>
                    <div class="col-md-6">

                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-info">
            <div class="panel-heading">Описание карточки</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control" type="text" name="description" id="description" value="" placeholder="описание ">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg" name="sendMe" value="1">сохранить
                            </button>
                        </div>

                    </div>
                    <div class="col-md-6">

                    </div>
                </div>
            </div>
        </div>

    </form>

@endsection
