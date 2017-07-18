<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Location <small></small></h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a> 
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="form-group col-sm-8">
                            {{Form::label('name','Name')}}
                            {{Form::text('name',  null, ['class'=> 'form-control'])}}
                        </div> 
                        <div class="form-group col-sm-4">
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
                    <h5>Location <small></small></h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a> 
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">

                        <div class="form-group col-sm-4">
                            {{Form::label('alias','Alias')}}
                            {{Form::text('alias',  null, ['class'=> 'form-control'])}}
                        </div> 
                        <div class="form-group col-sm-4">
                            {{Form::label('email','Email')}}
                            {{Form::text('email',  null, ['class'=> 'form-control'])}}
                        </div> 

                        <div class="form-group col-sm-4">
                            {{Form::label('lang_id','Language')}}
                            {{Form::select('lang_id', App\PublicAccess::pluck('name', 'id'), null, ['class'=> 'form-control'])}}
                        </div> 

                        <div class="form-group col-sm-4">
                            {{Form::label('phone','Phone')}}
                            {{Form::text('phone',  null, ['class'=> 'form-control'])}}
                        </div> 
                        
                        <div class="form-group col-sm-4">
                            {{Form::label('phone_alt','Alt.Phone')}}
                            {{Form::text('phone_alt',  null, ['class'=> 'form-control'])}}
                        </div> 
                        
                        <div class="form-group col-sm-4">
                            {{Form::label('nif','NIF')}}
                            {{Form::text('nif',  null, ['class'=> 'form-control'])}}
                        </div> 
                        
                        <div class="form-group col-sm-4">
                            {{Form::label('address','Address')}}
                            {{Form::text('address',  null, ['class'=> 'form-control'])}}
                        </div> 
                        
                        <div class="form-group col-sm-4">
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
                    <h5>Location <small></small></h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a> 
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="form-group col-sm-12">
                            {{Form::label('notes','Noptes Address*')}}
                            {{Form::textarea('notes',  null, ['class'=> 'form-control'])}}
                        </div> 

                            <div class="form-group col-sm-6">
                            {{Form::label('step_id','Funnel step')}}
                            {{Form::select('step_id', App\ContactStep::pluck('name', 'id'), null, ['class'=> 'form-control'])}}
                        </div> 

                            <div class="form-group col-sm-6">
                            {{Form::label('source_id','Source')}}
                            {{Form::select('source_id', App\Source::pluck('name', 'id'), null, ['class'=> 'form-control'])}}
                        </div> 

                            <div class="form-group col-sm-6">
                            {{Form::label('responsable_id','Responsible')}}
                            {{Form::select('responsable_id', App\User::pluck('name', 'id'), null, ['class'=> 'form-control'])}}
                        </div> 

                        <div class="form-group col-sm-6">
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