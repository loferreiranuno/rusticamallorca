@extends('layouts.back.default')

@section('content')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

  <div class="middle-box text-center loginscreen   animated fadeInDown">
        <div> 
        
        {!! Form::open(array('route'=> array('password.email'), 'method'=>'POST')) !!}
        {{ csrf_field() }}
        
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            {!! Form::text('email', old('email'), ['class'=>'form-control', 'placeholder'=>'Email', 'required']) !!}
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif                    
        </div>  
                        
        {!! Form::submit('Send Password Reset Link', ['class'=>'btn btn-primary block full-width m-b']) !!}
            
        <p class="text-muted text-center"><small>Already have an account?</small></p>
        <a class="btn btn-sm btn-white btn-block" href="{{route('login')}}">Login</a>

        {!! Form::close() !!}
         
        </div>
    </div>
 
@endsection
