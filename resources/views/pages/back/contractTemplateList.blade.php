@extends('layouts.back.default')
 
 @section('breadcrumb')
    @include("include.back.breadcrumb", 
    [
        'title' => "Contract Templates",
        'rootTitle' => "Contract",
        'root' => route("contracttemplate.index"),
        'currentTitle' => "List", 
        'actionData'=> [ 
            ["url"=> route('contracttemplate.create'), "visible"=> true, "title"=> "Add", "attributes"=> ['class'=>'btn btn-primary']]
 
        ]
    ])    
@stop 

@section('content') 
<div class="wrapper wrapper-content animated fadeInRight ecommerce">
 <div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-content">
            
                <table class=" table table-stripped toggle-arrow-tiny default breakpoint footable-loaded"  >
                    <thead>
                    <tr>
                        <th data-toggle="true" class="footable-visible"> 
                            <span class="footable-sort-indicator"></span>
                        </th> 
                        <th data-toggle="true" class="footable-visible"> 
                            Template Name
                        </th> 
                        <th data-toggle="true" class="footable-visible"> 
                            Template Kind
                        </th> 
                        <th data-toggle="true" class="footable-visible"> 
                            
                        </th>   
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($templates as $template)
                        <tr>
                            <td>{{$template->id}}</td>
                            <td>{{$template->name}}</td>
                            <td>{{$template->templateType->Text}}</td>
                            <td>
                                <a class="btn btn-info pull-right" href="{{route('contracttemplate.edit',['id'=> $template->id])}}">Edit</a> 
                   
                                {!! Form::button("delete", ['data-token'=> csrf_token(), 'data-action'=> 'delete', 'data-href'=> route('contracttemplate.destroy',['id'=> $template->id]), 'class'=>'btn btn-danger']) !!} 
                               
                                 
                                </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
@stop

@section("scripts")
@parent

@stop