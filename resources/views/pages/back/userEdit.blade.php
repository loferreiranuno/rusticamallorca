@extends('layouts.back.default')
  

 @section('breadcrumb')

        @include("include.back.breadcrumb", 
        [
            'title' => (isset($user)? "Edit user" : "Create user")  ,
            'rootTitle' => "User list",
            'root' => route("user.index"),
            'currentTitle' => isset($user)? $user->name : "Create user", 
            'actionData'=>$actionData 
        ])    
@stop 


@section('content') 

    @if(isset($user))        
        {{ Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'patch']) }} 
    @else        
         {{ Form::open(['route' => 'user.store']) }}       
    @endif

    @include('include.form.userForm',['user'=>isset($user)?$user:null])
    
    {!! Form::close() !!}
    
@stop