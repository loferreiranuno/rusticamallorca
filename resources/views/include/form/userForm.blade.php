<div class="wrapper wrapper-content animated fadeInRight">
    @include('include.form.errorMessage')
    {{csrf_field()}}
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Basic information <small></small></h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a> 
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="form-group col-sm-12 {{ $errors->has('name') ? ' has-error' : '' }}">
                            {{Form::label('name','Name*')}}
                            {{Form::text('name',   old('name'), ['class'=> 'form-control'])}}
                        </div>  
    
                        <div class="form-group col-sm-4 {{ $errors->has('email') ? ' has-error' : '' }}">
                            {{Form::label('email','Email*')}}
                            {{Form::text('email',  old('email'), ['class'=> 'form-control'])}}
                        </div>   
                        
                    @if(!isset($user))
                        <div class="form-group col-sm-4 {{ $errors->has('email') ? ' has-error' : '' }}">
                            {{Form::label('password','Password*')}}
                            {!! Form::password('password', ['class'=> 'form-control']) !!} 
                        </div>   
                        
                        <div class="form-group col-sm-4 {{ $errors->has('email') ? ' has-error' : '' }}">
                            {{Form::label('password_confirmation','Password confirmation*')}}
                            {!! Form::password('password_confirmation', ['class'=> 'form-control']) !!} 
                        </div>   
                    @endif 
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group  text-center">            
            {!! Form::submit('Submit', ['class'=> 'btn btn-success']) !!}            
            </div>
        </div>
    </div>  
</div>