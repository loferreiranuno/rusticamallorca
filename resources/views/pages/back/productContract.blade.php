@extends('layouts.back.print')
 
@section("content") 
<div class="hidden">  
{!! Form::textarea("text", $html, ['id'=>'summary-ckeditor', 'class'=>'form-control']) !!}
</div>
@stop

 