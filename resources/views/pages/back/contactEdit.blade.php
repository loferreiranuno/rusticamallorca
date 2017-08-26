@extends('layouts.back.default')
  

@section('breadcrumb')
                <div class="row wrapper border-bottom white-bg page-heading">       
                    <div class="col-sm-4">
                    @if(isset($contact))
                         <h2>{!! $contact->name !!}</h2>
                    @else
                         <h2>New Contact</h2>
                    @endif
                       
                        <ol class="breadcrumb">
                            <li>
                                <a href="{{route('contact.index')}}">Contacts</a>
                            </li>
                            <li class="active">
                            @if(isset($contact))
                                <strong>Edit Contact</strong>
                            @else
                                <strong>Create</strong>
                            @endif
                            </li>
                        </ol>
                    </div>
                    <div class="col-sm-8">
                        <div class="title-action">
                            <a href="{{route('contact.create')}}" class="btn btn-primary">Create New</a>
                        </div>
                    </div>
                </div>
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