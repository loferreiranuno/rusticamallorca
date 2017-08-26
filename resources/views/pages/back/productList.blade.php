
@extends('layouts.back.default')
 

@section('breadcrumb')
 @include("include.back.breadcrumb", 
        [
            'title' => "Search properties" ,
            'rootTitle' => "Properties",
            'root' => route('product.index'),
            'currentTitle' => "List", 
            'actionHtml' => '<a href="' . route('product.create') . '" class="btn btn-primary">New property</a>'
        ])   
@stop 

@section('content')
<div class="wrapper wrapper-content animated fadeInRight ecommerce">


            <div class="ibox-content m-b-sm border-bottom">
                <div class="row">
                
                
                {!! Form::open(array('route' => 'product.index', 'method'=>'GET')) !!}   
                
                {!! Form::hidden('search', true) !!}
                             
                    {!! Form::token() !!}                    
                    <div class="col-sm-2">
                        <div class="form-group">                                                 
                         {!! Form::select('typology', App\ProductKindType::pluck('name', 'id')->prepend('Typology',''), old('typology'), ['class'=>'form-control']) !!}                                                  
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">               
                         {!! Form::select('status', App\ProductStatus::pluck('name', 'id')->prepend('Status',''), old('status'), ['class'=>'form-control']) !!}                                                  
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            
                        <div class="form-group">                                            
                         {!! Form::select('sell_type', array(''=> 'Renting or selling', 'rent'=>'Renting', 'sell'=>'Selling'), old('sell_type'), ['class'=>'form-control']) !!}                                                  
                        </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">        
                            <div class="input-group">
                                {!! Form::number('max_price', old('max_price'), ['placeholder'=>'Price', 'title'=>'Max Price',  'class'=>'form-control']) !!}                            
                                 <span class="input-group-addon">&euro;</span>
                            </div>                                                
                        
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">   
                            <div class="input-group">
                                {!! Form::number('min_area', old('min_area'), ['placeholder'=>'Area', 'title'=>'Min Area',   'class'=>'form-control']) !!}                                    
                                <span class="input-group-addon">m&sup2;</span>
                            </div>                         
                            
                        </div>
                    </div> 
                    <div class="col-sm-1">  
                    <div class="form-group">                        
                        {!! Form::submit("GO", ['class'=>'btn btn-primary','title'=>'Search']) !!}                        
                    </div>
                    </div>
                {!! Form::close() !!}
                </div>

            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-content">
                        @if(isset($products))
                            <table class=" table table-stripped toggle-arrow-tiny default breakpoint footable-loaded"  >
                                <thead>
                                <tr>
                                    <th data-toggle="true" class="footable-visible"> 
                                        <span class="footable-sort-indicator"></span>
                                    </th> 

                                    <th data-toggle="true" class="footable-visible"> Picture
                                    </th> 

                                    <th data-toggle="true" class="footable-visible"> Ref
                                        <span class="footable-sort-indicator"></span>
                                    </th> 

                                    <th data-toggle="true" class="footable-visible"> Kind
                                        <span class="footable-sort-indicator"></span>
                                    </th> 

                                    <th data-toggle="true" class="footable-visible"> Floor
                                        <span class="footable-sort-indicator"></span>
                                    </th> 

                                    <th data-toggle="true" class="footable-visible"> Bed.
                                        <span class="footable-sort-indicator"></span>
                                    </th> 

                                    <th data-toggle="true" class="footable-visible"> Bath.
                                        <span class="footable-sort-indicator"></span>
                                    </th> 

                                    <th data-toggle="true" class="footable-visible"> Area.
                                        <span class="footable-sort-indicator"></span>
                                    </th> 

                                    <th data-toggle="true" class="footable-visible"> City
                                        <span class="footable-sort-indicator"></span>
                                    </th> 

                                    <th data-toggle="true" class="footable-visible"> Street
                                        <span class="footable-sort-indicator"></span>
                                    </th> 

                                    <th data-toggle="true" class="footable-visible"> Rent
                                        <span class="footable-sort-indicator"></span>
                                    </th> 
                                    <th data-toggle="true" class="footable-visible"> Sell
                                        <span class="footable-sort-indicator"></span>
                                    </th> 

                                    <th data-toggle="true" class="footable-visible"> Status
                                        <span class="footable-sort-indicator"></span>
                                    </th> 

                                    <th data-toggle="true" class="footable-visible"> Partner
                                        <span class="footable-sort-indicator"></span>
                                    </th> 

                                    <th> </th>

                                </tr>
                                </thead>
                                <tbody>
                                                                
                                @foreach($products as $product)

                                    <tr product-row product-url="{{ route('product.show', ['id'=> $product->id]) }}" style="" class="{!! $product->id % 2 == 0 ? 'footable-even' : 'footable-odd' !!}}">
                                        
                                        <td class="footable-visible">
                                            {!! Form::checkbox('selected-products[]', $product->id, false, ['class'=>'form-control', 'id'=>'product-'.$product->id]) !!}
                                        </td>
                                        <td class="footable-visible"><img src="{!! asset(App\Helpers\RusticaHelper::getProductImage($product, false)); !!}" class="img-thumbnail" /></td>
                                        <td class="footable-visible">{!!$product->identifier!!} </td>
                                        <td class="footable-visible">{!!$product->kind->name!!}</td>
                                        <td class="footable-visible">{!!$product->floors!!} </td>
                                        <td class="footable-visible">{!!$product->beds!!} </td>
                                        <td class="footable-visible">{!!$product->bathrooms!!} </td>
                                        <td class="footable-visible"><small>{!!$product->area!!} </small></td>
                                        <td class="footable-visible"><small>{!!$product->city_name!!} </small></td>
                                        <td class="footable-visible"><small>{!!$product->street_name!!} </small></td>
                                        <td class="footable-visible">
                                                <span class="  {!! $product->renting_enabled && isset($product->renting_cost)  ? '' : 'hidden' !!}">{!!isset($product->renting_cost) ? $product->renting_cost : "-"!!}&euro; <small>({!! $product->rentingPeriod->name!!})</small> </span>                                                
                                        </td>
                                        <td class="footable-visible">                                                
                                                <span class="  {!! $product->selling_enabled && isset($product->selling_cost) ? '' : 'hidden' !!}">{!!isset($product->selling_cost) ? $product->selling_cost : "-"!!}&euro; </span>
                                        </td>
                                        <td class="footable-visible">{!!$product->status->name!!} </td>

                                        <td class="text-right footable-visible footable-last-column">
                                            <div class="btn-group">
                                                <a href="{!!route('product.edit',['id'=> $product->id])!!}" class="btn btn-primary" title="Edit">
                                                <i class="fa fa-edit"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>  

                                @endforeach


                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="14" class="footable-visible"></td>
                                    </tr>
                                </tfoot>
                            </table>
                            {{ $products->links() }}
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

@stop

@section("styles")
    <style>
        [product-row]
        {
            cursor:pointer;
        }
    </style>
@stop 

@section("scripts")
<script>
    $(document).ready(function(){
        
        $("[product-row]").on("click", function(){
            window.location = $(this).attr("product-url");
        });
    });
</script>
@stop