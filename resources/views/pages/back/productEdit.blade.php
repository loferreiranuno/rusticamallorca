@extends('layouts.back.default')
 
@section('breadcrumb')
                <div class="row wrapper border-bottom white-bg page-heading">       
                    <div class="col-sm-4">
                        <h2>This is main title</h2>
                        <ol class="breadcrumb">
                            <li>
                                <a href="route('product.index')">This is</a>
                            </li>
                            <li class="active">
                                <strong>Property List</strong>
                            </li>
                        </ol>
                    </div>
                    <div class="col-sm-8">
                        <div class="title-action">
                            <a href="{{route('product.create')}}" class="btn btn-primary">New property</a>
                        </div>
                    </div>
                </div>
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

