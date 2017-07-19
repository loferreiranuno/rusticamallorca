@extends('layouts.back.default')

@section('content')

    <div class="middle-box text-center loginscreen   animated fadeInDown">
        <div> 
        
        {!! Form::open(array('route'=> array('register'), 'method'=>'POST')) !!}
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            {!! Form::text('name', old('name'), ['class'=>'form-control', 'placeholder'=>'Name', 'required']) !!}
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif                    
        </div>
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            {!! Form::text('email',  old('email'), ['class'=>'form-control', 'placeholder'=>'Email', 'required']) !!}
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif                    
        </div>
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            {!! Form::password('password',  ['class'=>'form-control','placeholder'=>'Password',  'required']) !!}
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif                    
        </div>
        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            {!! Form::password('password_confirmation',   ['class'=>'form-control', 'placeholder'=>'Confirm password', 'required']) !!}                       
        </div>
                        
        {!! Form::submit('Register', ['class'=>'btn btn-primary block full-width m-b']) !!}
            
        <p class="text-muted text-center"><small>Already have an account?</small></p>
        <a class="btn btn-sm btn-white btn-block" href="{{route('login')}}">Login</a>

        {!! Form::close() !!}
         
        </div>
    </div>
 
@endsection
