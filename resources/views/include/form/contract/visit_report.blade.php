
@extends('include.form.contract.base')

@section("contract-form")

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
        <div class="form-group {{ $errors->has('agreement_time') ? ' has-error' : '' }}">
            {!!Form::label('agreement_time','Agreement Time')!!}
            {!!Form::select('agreement_time',$hours, old('agreement_time'), ['class'=>'form-control'])!!}
        </div>
    </div> 
</div>
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
        <div class="form-group {{ $errors->has('visitor_id') ? ' has-error' : '' }}">
            {!!Form::label('visitor_id','Visitor')!!}            
            {!! Form::select('visitor_id', $contacts->pluck('name', 'id')->prepend('select',''), old('visitor_id'), ['class'=>'form-control']) !!}
        </div>
    </div> 
</div>
<div class="row"> 
    <div class="col-lg-12">
        <div class="form-group {{ $errors->has('comercial_id') ? ' has-error' : '' }}">
            {!!Form::label('comercial_id','Comercial')!!}            
            {!! Form::select('comercial_id', $users->pluck('name','id')->prepend('select', ''), old('comercial_id'), ['class'=>'form-control']) !!}
        </div>
    </div> 
</div>     
@stop