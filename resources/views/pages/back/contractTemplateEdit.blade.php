@extends('layouts.back.default')
 
 @section('breadcrumb')
    @include("include.back.breadcrumb", 
    [
        'title' => isset($template) ? "Edit template" : "Create new template",
        'rootTitle' => "Contract templates",
        'root' => route("contracttemplate.index"),
        'currentTitle' => isset($template)? $template->name: "New template", 
        'actionData'=> [ 
            ["url"=> route('contracttemplate.create'), "visible"=> true, "title"=> "Add", "attributes"=> ['class'=>'btn btn-primary']]
        ]
    ])    
@stop 

@section('content') 
    <div class="wrapper wrapper-content animated fadeInRight ecommerce">
        <div class="row">
            <div class="col-lg-8">
            @if(isset($template))
                {{ Form::model($template, ['route' => ['contracttemplate.update', $template->id], 'method' => 'patch']) }}
            @else
                {{ Form::open(['route' => 'contracttemplate.store']) }}
            @endif

            @include('include.form.templateForm',['types'=>$templateTypes, 'template'=>$template])

            {!! Form::close() !!}
            </div>
            <div class="col-lg-4">

            </div>
        </div>
    </div>
@stop