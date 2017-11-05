@extends('layouts.back.default')

@section('breadcrumb')
   @include("include.back.breadcrumb", 
                [
                    'title' => "",
                    'rootTitle' => "",
                    'root' => "",
                    'currentTitle' => "" , 
                    'actionHtml' => [
                        "<button type=\"button\" onclick=\"window.history.back();\" class=\"btn btn-default\">Back</button>",
                        "<button type=\"button\" delete-task class=\"btn btn-danger\">Delete task</button>",
                        "<button type=\"button\"  submit-task class=\"btn btn-primary\">Save task</button>"
                    ]
                ])  
@stop 

@section('content') 
    
    <div class="row">
        <div class="col-lg-8">
            @include("include.form.taskForm", ['task'=> $task]);
        </div>    
        <div class="col-lg-4">            
            
        </div>
    </div>
@stop


@section("styles")

@stop

@section("scripts")

@stop        
