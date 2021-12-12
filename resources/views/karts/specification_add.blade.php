@extends('layouts.app')
@section('content')
    <h1>Add kart specification</h1>
    <form method="POST" action="{{route('karts.specification_add')}}">
        <form >
        @csrf
        <div class="panel panel-info">
            <div class="panel-heading">specification</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control" type="text" name="specification" id="specification" value="" placeholder="спецификация ">
                        </div>
                        <input type="hidden" id="name_id" class="form-control" name="name_id" value={{$id}}>
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
