@extends('layouts.back.default')
  
@section('content')

@if(isset($contact))
    {{ Form::model($contact, ['route' => ['contact.update', $contact->id], 'method' => 'patch']) }}
@else
    {{ Form::open(['route' => 'contact.store']) }}
@endif

 @include('include.form.contactForm')
 
{!! Form::close() !!}

@stop