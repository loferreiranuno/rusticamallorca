@extends('layouts.back.default')
 

@section('breadcrumb')
 
        @include("include.back.breadcrumb", 
        [
            'title' => isset($user)? $user->name : ""  ,
            'rootTitle' => "User list",
            'root' => route("user.index"),
            'currentTitle' => isset($user)? $user->name : "User profile", 
            'actionData'=>isset($actionData) ? $actionData : null 
        ])  

@stop 

@section('content')
<div class="row">
    <div class="col-lg-12">

        <div class="ibox product-detail">
            <div class="ibox-content">
            <div class="row">    
                <div class="col-lg-3"> 
                    <h3>
                        <button type="button"  class="btn btn-primary m-r-sm" data-toggle="modal"  data-target="#taskModal">
                                    <i class="fa fa-plus-square-o"></i>
                        </button> Add Task
                    </h3>
                    @include("include.pages.timelineBox", ['tasks'=> $taskByDay, 'url'=> route("user.show", ['id'=>$user->id])])
                    @include("include.modal.taskModal", ['modalId'=> 'taskModal','user'=>$user])   

                </div>
                <div class="col-lg-6"> 
                  
                </div>
                <div class="col-lg-3"> 
                    @include('include.pages.boxSuggestedProduct',[
                        'products' => $user->productsCreated, 
                        'user'=> $user, 
                        'css_icon'=>'fa fa-house',
                        'label'=> 'Created properties'])

                    @include('include.pages.boxSuggestedProduct',[
                    'products' => $user->productsManaged, 
                    'user'=> $user, 
                    'css_icon'=>'fa fa-house',
                    'label'=> 'Managed properties'])

                    @include('include.pages.boxSuggestedProduct',[
                    'products' => $user->productsRecruited, 
                    'user'=> $user, 
                    'css_icon'=>'fa fa-house',
                    'label'=> 'Recruited properties'])
                </div>
            </div>
            </div>
        </div>
    </div>
</div>        
@stop

@section("styles") 
   
@stop
@section("scripts")
 
@stop