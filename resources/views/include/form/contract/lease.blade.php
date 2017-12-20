
@extends('include.form.contract.base')

@section("contract-form")

<div class="row"> 
    <div class="col-lg-12">
        <div class="form-group {{ $errors->has('template_id') ? ' has-error' : '' }}">
            {!!Form::label('template_id','Agreement Model')!!}
            {!!Form::select('template_id', $templates->pluck('name','id')->prepend('select',''), old('template_id'), ['class'=>'form-control'])!!}
        </div>
    </div> 
</div> 
<div class="row"> 
    <div class="col-lg-12">
        <div class="form-group {{ $errors->has('agreement_date') ? ' has-error' : '' }}">
            {!!Form::label('agreement_date','Agreement Date')!!}
            {!!Form::date('agreement_date', old('agreement_date'), ['class'=>'form-control'])!!}
        </div>
    </div> 
</div>

<div class="row"> 
    <div class="col-lg-12">
        <div class="form-group {{ $errors->has('lessor_id') ? ' has-error' : '' }}">
            {!!Form::label('lessor_id','Lessor')!!}            
            {!!Form::select('lessor_id', $owners->pluck('name','id')->prepend('select', ''), old('lessor_id'), ['class'=>'form-control']) !!}
        </div>
    </div> 
</div> 

<div class="row"> 
    <div class="col-lg-12">
        <div class="form-group {{ $errors->has('first_lessee') ? ' has-error' : '' }}">
            {!!Form::label('first_lessee','First lessee')!!}            
            {!!Form::select('first_lessee', $contacts->pluck('name','id')->prepend('select', ''), old('first_lessee'), ['class'=>'form-control']) !!}
        </div>
    </div> 
</div> 

<div class="row"> 
    <div class="col-lg-12">
        <div class="form-group {{ $errors->has('second_lessee') ? ' has-error' : '' }}">
            {!!Form::label('second_lessee','Second lessee')!!}            
            {!!Form::select('second_lessee', $contacts->pluck('name','id')->prepend('select', ''), old('second_lessee'), ['class'=>'form-control']) !!}
        </div>
    </div> 
</div> 

<div class="row"> 
    <div class="col-lg-12">
        <div class="form-group {{ $errors->has('third_lessee') ? ' has-error' : '' }}">
            {!!Form::label('third_lessee','Third lessee')!!}            
            {!!Form::select('third_lessee', $contacts->pluck('name','id')->prepend('select', ''), old('third_lessee'), ['class'=>'form-control']) !!}
        </div>
    </div> 
</div> 

<div class="row"> 
    <div class="col-lg-12">
        <div class="form-group {{ $errors->has('initial_renting_date') ? ' has-error' : '' }}">
            {!!Form::label('initial_renting_date','Initial renting date')!!}            
            {!! Form::date('initial_renting_date', old('initial_renting_date'), ['class'=>'form-control']) !!}
        </div>
    </div> 
</div>     

<div class="row"> 
    <div class="col-lg-12">
        <div class="form-group {{ $errors->has('max_years_extend_time') ? ' has-error' : '' }}">
            {!!Form::label('max_years_extend_time','Years the contract can be extended for')!!}            
            {!!Form::number('max_years_extend_time', old('max_years_extend_time'), ['class'=>'form-control']) !!}
        </div>
    </div> 
</div>     

<div class="row"> 
    <div class="col-lg-12">
        <div class="form-group {{ $errors->has('max_days_warn_revoke') ? ' has-error' : '' }}">
            {!!Form::label('max_days_warn_revoke','Maximum number of days to notify the revocation of the contract')!!}            
            {!!Form::number('max_days_warn_revoke', old('max_days_warn_revoke'), ['class'=>'form-control']) !!}
        </div>
    </div> 
</div>     
 

@stop