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
                        <div class="form-group col-sm-8 {{ $errors->has('name') ? ' has-error' : '' }}">
                            {{Form::label('name','Name*')}}
                            {{Form::text('name',  null, ['class'=> 'form-control'])}}
                        </div> 
                        <div class="form-group col-sm-4 {{ $errors->has('kind_id') ? ' has-error' : '' }}">
                            {{Form::label('kind_id','Kind*')}}
                            {{Form::select('kind_id', App\ContactKind::pluck('name', 'id'), null, ['class'=> 'form-control'])}}
                        </div>  
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
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Advanced information <small></small></h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a> 
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">

                        <div class="form-group col-sm-4 {{ $errors->has('alias') ? ' has-error' : '' }}">
                            {{Form::label('alias','Alias')}}
                            {{Form::text('alias',  null, ['class'=> 'form-control'])}}
                        </div> 
                        <div class="form-group col-sm-4 {{ $errors->has('email') ? ' has-error' : '' }}">
                            {{Form::label('email','Email*')}}
                            {{Form::text('email',  null, ['class'=> 'form-control'])}}
                        </div> 

                        <div class="form-group col-sm-4 {{ $errors->has('lang_id') ? ' has-error' : '' }}">
                            {{Form::label('lang_id','Language')}}
                            {{Form::select('lang_id', App\Language::pluck('name', 'id'), null, ['class'=> 'form-control'])}}
                        </div> 

                        <div class="form-group col-sm-4 {{ $errors->has('phone') ? ' has-error' : '' }}">
                            {{Form::label('phone','Phone')}}
                            {{Form::text('phone',  null, ['class'=> 'form-control'])}}
                        </div> 
                        
                        <div class="form-group col-sm-4 {{ $errors->has('phone_alt') ? ' has-error' : '' }}">
                            {{Form::label('phone_alt','Alt.Phone')}}
                            {{Form::text('phone_alt',  null, ['class'=> 'form-control'])}}
                        </div> 
                        
                        <div class="form-group col-sm-4 {{ $errors->has('nif') ? ' has-error' : '' }}">
                            {{Form::label('nif','NIF')}}
                            {{Form::text('nif',  null, ['class'=> 'form-control'])}}
                        </div> 
                        
                        <div class="form-group col-sm-4 {{ $errors->has('address') ? ' has-error' : '' }}">
                            {{Form::label('address','Address')}}
                            {{Form::text('address',  null, ['class'=> 'form-control'])}}
                        </div> 
                        
                        <div class="form-group col-sm-4 {{ $errors->has('city') ? ' has-error' : '' }}">
                            {{Form::label('city','City')}}
                            {{Form::text('city',  null, ['class'=> 'form-control'])}}
                        </div>                     
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
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Notes <small></small></h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a> 
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="form-group col-sm-12 {{ $errors->has('note') ? ' has-error' : '' }}">
                            {{Form::label('note','Notes Address*')}}
                            {{Form::textarea('note',  null, ['class'=> 'form-control'])}}
                        </div> 

                            <div class="form-group col-sm-6 {{ $errors->has('step_id') ? ' has-error' : '' }}">
                            {{Form::label('step_id','Funnel step')}}
                            {{Form::select('step_id', App\ContactStep::pluck('name', 'id'), null, ['class'=> 'form-control'])}}
                        </div> 

                            <div class="form-group col-sm-6 {{ $errors->has('source_id') ? ' has-error' : '' }}">
                            {{Form::label('source_id','Source')}}
                            {{Form::select('source_id', App\Source::pluck('name', 'id'), null, ['class'=> 'form-control'])}}
                        </div> 

                            <div class="form-group col-sm-6 {{ $errors->has('responsable_id') ? ' has-error' : '' }}">
                            {{Form::label('responsable_id','Responsible')}}
                            {{Form::select('responsable_id', App\User::pluck('name', 'id'), null, ['class'=> 'form-control'])}}
                        </div> 

                        <div class="form-group col-sm-6 {{ $errors->has('partner_id') ? ' has-error' : '' }}">
                            {{Form::label('partner_id','Partner')}}
                            {{Form::select('partner_id', App\ContactKind::where('name', 'partner')->first()->contacts()->pluck('name', 'id')->prepend('',''), null, ['class'=> 'form-control'])}}
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group text-center">
            
            {!! Form::submit('Submit', ['class'=> 'btn btn-success']) !!}
            
            </div>
        </div>
    </div>
</div>