@extends('layouts.back.default') 
 
@section('breadcrumb')
        @include("include.back.breadcrumb", 
        [
            'title' => $product->title  ,
            'rootTitle' => "Property contracts",
            'root' => route("product.index"),
            'currentTitle' => "<span class='label label-default'>Ref.".$product->identifier. " " . $product->kind->name . "</span>", 
            'actionHtml' => '
                <button class="btn btn-warning pull-right margin-left" action-url="' . route('product_contract.index',['product'=>$product->id]). '">Back</button>'
        ])    
@stop  

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight ecommerce">
        <div class="row">
            <div class="col-lg-12">
                @include('include.form.contract.'.$templateType->code)
            </div>
        </div>
    </div>
@stop