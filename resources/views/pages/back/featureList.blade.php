@extends('layouts.back.default')
 

 @section('breadcrumb')

        @include("include.back.breadcrumb", 
        [
            'title' => 'Feature manager'  ,
            'rootTitle' => "Features",
            'root' => route("feature.index"),
            'currentTitle' => 'Edit/Add', 
            'actionData'=> null
        ])    
@stop 

@section('content') 
    <div class="row">
        <div class="form-group">
            <div class="col-sm-3">{!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Enter feature name..']) !!}</div>
            <div class="col-sm-2">{!! Form::submit('add', ['class'=>'btn btn-primary']) !!}</div>
        </div>
    </div>
    <div class="row"><hr/></div>
    <div class="row">
        <table class="table table-condensed">
            <tr>
                <td>Id</td>
                <td>Name</td>
                <td></td>
                <td></td>
            </tr> 
            @foreach($features as $feature)
                <tr>
                    <td>{{$feature->id}}</td>
                    <td>{{$feature->name}}</td>
                    <td></td>
                    <td>{!! Form::button('delete',['class'=>'btn btn-danger']) !!}</td>
                </tr>
            @endforeach
        </table>
    </div>
@stop

@section("styles") 
     
@stop
@section("scripts")

 

@stop