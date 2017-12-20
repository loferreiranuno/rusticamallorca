@extends('layouts.back.default')
 
@section('breadcrumb')

        @include("include.back.breadcrumb", 
        [
            'title' => $product->title  ,
            'rootTitle' => "Property contracts",
            'root' => route("product.index"),
            'currentTitle' => "<span class='label label-default'>Ref.".$product->identifier. " " . $product->kind->name . "</span>", 
            'actionHtml' => '
                <button class="btn btn-primary pull-right margin-left" action-url="' . route('product.edit', ['product'=> $product->id]) . '">Edit Property</button>
                <button class="btn btn-warning pull-right margin-left" action-url="' . route('product_contract.index',['product'=>$product->id]). '">Contracts</button>'
        ])    
@stop  

@section('content')
 
<div class="wrapper wrapper-content animated fadeInRight ecommerce">
    <div class="row">
        <div class="col-lg-12">
        
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
        @if(isset($templateTypes))
            <div class="tabs-container">
            <div class="tabs-left">
                <ul class="nav nav-tabs">
                    @foreach($templateTypes as $templateType) 
                        <li class="{{ $templateType->id == $currentType->id ? 'active' : '' }}">              
                            <a data-toggle="tab" href="#tab-{{ $templateType->id }}">{{ $templateType->text }}</a>
                        </li> 
                    @endforeach
                </ul>
                <div class="tab-content">
                    @foreach($templateTypes as $templateType) 
                        <div id="tab-{{ $templateType->id }}" class="tab-pane {{ $templateType->id == $currentType->id ? 'active' : '' }}">
                            <div class="panel-body">
                                @include("include.back.contract.list",['product'=>$product, 'templateType'=>$templateType])
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>  
            </div> 
            @endif
        </div>
    </div>
    </div> 
@stop

@section("styles") 
    <style> 
        [action-url] { margin-left: 2px; } 
    </style> 
@stop