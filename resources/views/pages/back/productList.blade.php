@extends('layouts.back.default')
 

@section('breadcrumb')
    <div class="row wrapper border-bottom white-bg page-heading">       
    <div class="col-sm-4">
        <h2>Search properties</h2>
        <ol class="breadcrumb">
            <li>
                <a href="route('product.index')">Properties</a>
            </li>
            <li class="active">
                <strong>List</strong>
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
<div class="wrapper wrapper-content animated fadeInRight ecommerce">


            <div class="ibox-content m-b-sm border-bottom">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="product_name">Product Name</label>
                            <input type="text" id="product_name" name="product_name" value="" placeholder="Product Name" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label class="control-label" for="price">Price</label>
                            <input type="text" id="price" name="price" value="" placeholder="Price" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label class="control-label" for="quantity">Quantity</label>
                            <input type="text" id="quantity" name="quantity" value="" placeholder="Quantity" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="1" selected="">Enabled</option>
                                <option value="0">Disabled</option>
                            </select>
                        </div>
                    </div>
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

                                    <th data-toggle="true" class="footable-visible"> Renting
                                        <span class="footable-sort-indicator"></span>
                                    </th> 

                                    <th data-toggle="true" class="footable-visible"> Selling
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

                                    <tr style="" class="{!! $product->id % 2 == 0 ? 'footable-even' : 'footable-odd' !!}}">
                                        
                                        <td class="footable-visible"><!-- checkbox --></td>
                                        <td class="footable-visible"><!-- image --></td>
                                        <td class="footable-visible">{!!$product->identifier!!} </td>
                                        <td class="footable-visible">{!!$product->kind->name!!}</td>
                                        <td class="footable-visible">{!!$product->floors!!} </td>
                                        <td class="footable-visible">{!!$product->beds!!} </td>
                                        <td class="footable-visible">{!!$product->bathrooms!!} </td>
                                        <td class="footable-visible">{!!$product->area!!} </td>
                                        <td class="footable-visible">{!!$product->city_name!!} </td>
                                        <td class="footable-visible">{!!$product->street_name!!} </td>
                                        <td class="footable-visible">{!!$product->renting_cost!!} </td>
                                        <td class="footable-visible">{!!$product->selling_cost!!} </td>

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
                        @endif
                        </div>
                    </div>
                </div>
            </div>


        </div>

@stop