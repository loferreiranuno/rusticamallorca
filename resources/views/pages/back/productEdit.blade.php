@extends('layouts.back.default')
 
@section('breadcrumb')
                <div class="row wrapper border-bottom white-bg page-heading">       
                    <div class="col-sm-4">
                    @if(isset($product))
                         <h2>{!! $product->title !!}</h2>
                    @else
                         <h2>New property</h2>
                    @endif
                       
                        <ol class="breadcrumb">
                            <li>
                                <a href="{{route('product.index')}}">Properties</a>
                            </li>
                            <li class="active">
                            @if(isset($product))
                                <strong>Edit Property</strong>
                            @else
                                <strong>Create</strong>
                            @endif
                            </li>
                        </ol>
                    </div>
                    <div class="col-sm-8">
                        <div class="title-action">
                            <a href="{{route('product.create')}}" class="btn btn-primary">Create New</a>
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

