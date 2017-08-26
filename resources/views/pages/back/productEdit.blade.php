@extends('layouts.back.default')

@section('breadcrumb')
    @if(!isset($product))
        @include("include.back.breadcrumb", 
                [
                    'title' => 'Add new property'  ,
                    'rootTitle' => "Properties",
                    'root' => route("product.index"),
                    'currentTitle' => "Create", 
                    'actionHtml' => '<a href="' . route('product.index') . '" class="btn btn-primary">Properties</a>'
                ])
    @else
        @include("include.back.breadcrumb", 
                [
                    'title' => $product->title  ,
                    'rootTitle' => "Properties",
                    'root' => route("product.index"),
                    'currentTitle' => $product->kind->name, 
                    'actionHtml' => '
                    <a href="' . route('product.create') . '" class="btn btn-primary">Add new</a>
                    <a href="' . route('product.show', ['product'=> $product->id]) . '" class="btn btn-primary">Property dashboard</a>'
                ])
    @endif     
@stop 

@section('content')
 

@if(isset($product))
    {{ Form::model($product, ['route' => ['product.update', $product->id], 'method' => 'patch']) }}
@else
    {{ Form::open(['route' => 'product.store']) }}
@endif

 @include('include.form.productForm')

{!! Form::close() !!}
 
@stop

