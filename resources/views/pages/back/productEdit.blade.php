@extends('layouts.back.default')
 

@section('content')
 

@if(isset($product))
    {{ Form::model($product, ['route' => ['product.update', $product->id], 'method' => 'patch']) }}
@else
    {{ Form::open(['route' => 'product.store']) }}
@endif

 @include('include.form.productForm')
 
{!! Form::close() !!}


@stop

