@extends('layouts.back.default')
  

@section('breadcrumb')
        @include("include.back.breadcrumb", 
        [
            'title' => isset($contact) ? $contact->name : "Create contact"  ,
            'rootTitle' => "Contacts",
            'root' => route("contact.index"),
            'currentTitle' => isset($contact) ? $contact->name : "Create contact",
            'actionData'=>[
                ["url"=> route('contact.show',['contact'=> $contact??null]),"visible"=>isset($contact), "title"=> "View", "attributes"=> ['class'=>'btn btn-primary']],
                ["url"=> route('contact.create'),"visible"=>true, "title"=> "Add", "attributes"=> ['class'=>'btn btn-primary']]
            ]  
        ])   
@stop 


@section('content')

@if(isset($contact))
    {{ Form::model($contact, ['route' => ['contact.update', $contact->id], 'method' => 'patch']) }}
@else
    {!! Form::open(['route' => 'contact.store']) !!}    
    {!! Form::hidden('creator_id', Auth::user()->id, []) !!}
    {!! Form::hidden('product_id', isset($product) ? $product->id : null) !!}

    
@endif

 @include('include.form.contactForm')
 
{!! Form::close() !!}

@stop