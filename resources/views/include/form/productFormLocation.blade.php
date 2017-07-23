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
                @include('include.form.productMapSearch')
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group col-sm-12{{ $errors->has('public_access_id') ? ' has-error' : '' }}">
                        {{Form::label('public_access_id','Public Address*')}}
                            {{Form::select('public_access_id', App\PublicAccess::pluck('name', 'id'), old('public_access_id'), ['class'=> 'form-control'])}}
                    </div> 
                    <div class="form-group col-sm-6{{ $errors->has('district') ? ' has-error' : '' }}">
                        {{Form::label('district','District')}}
                        {{Form::text('district', old('district'), ['class'=> 'form-control'])}}
                    </div>
                    <div class="form-group col-sm-6{{ $errors->has('zone') ? ' has-error' : '' }}">
                        {{Form::label('zone','Zone')}}
                        {{Form::text('zone', old('zone'), ['class'=> 'form-control'])}}
                    </div>
                    <div class="form-group col-sm-6{{ $errors->has('urbanization') ? ' has-error' : '' }}">
                        {{Form::label('urbanization','Urbanization')}}
                        {{Form::text('urbanization', old('urbanization'), ['class'=> 'form-control'])}}
                    </div>
                    <div class="form-group col-sm-2{{ $errors->has('block') ? ' has-error' : '' }}">
                        {{Form::label('block','Block')}}
                        {{Form::text('block', old('block'), ['class'=> 'form-control'])}}
                    </div>
                    <div class="form-group col-sm-2{{ $errors->has('doorway') ? ' has-error' : '' }}">
                        {{Form::label('doorway','Doorway')}}
                        {{Form::text('doorway', old('doorway'), ['class'=> 'form-control'])}}
                    </div>
                    <div class="form-group col-sm-2{{ $errors->has('door') ? ' has-error' : '' }}">
                        {{Form::label('door','Door')}}
                        {{Form::text('door', old('door'), ['class'=> 'form-control'])}}
                    </div>
                </div>
                <div class="col-sm-6">
                </div>
                </div>
        </div>
    </div>
</div>