@extends('layouts.back.default')
 

 @section('breadcrumb')

        @include("include.back.breadcrumb", 
        [
            'title' => $contact->name  ,
            'rootTitle' => "Contacts",
            'root' => route("contact.index"),
            'currentTitle' => $contact->id, 
            'actionHtml' => '
                <a class="btn btn-primary pull-right margin-left"  href="' . route('contact.create') . '" action-url="' . route('contact.create') . '">Add</a>
                <a class="btn btn-primary pull-right margin-left" href="' . route('contact.edit', ['contact'=> $contact->id]). '" action-url="' . route('contact.edit', ['contact'=> $contact->id]) . '">Edit</a>'
        ])    
@stop 

@section('content')
        <div class="row">
                <div class="col-lg-4">
                    @include("include.pages.boxContact", ['showTitle'=> false, 'showDetails'=> true,'contactSource'=> $contact, 'label'=> 'Contact data'])
                </div> 
                <div class="col-lg-4  {{ !isset($contact->responsable) ? 'hidden':null }}">
                    @include("include.pages.boxUser", ['user'=> $contact->responsable, 'label'=> 'Designated commercial'])
                </div>
                <div class="col-lg-4  {{ !isset($contact->source) ? 'hidden':null }}">
                    @include("include.pages.boxUser", [ 'source'=> $contact->source, 'label'=> 'Source'])
                </div> 
        </div>
      <div class="row">
                <div class="col-lg-12">

                    <div class="ibox product-detail">
                        <div class="ibox-content">
                        <div class="row">    
                            <div class="col-lg-4"> 
                                <div class="row">
                                    <h3>Internal notes</h3>
                                    @if(!isset($contact->note))
                                        <a type="button"  class="btn btn-primary m-r-sm" href="{{route('contact.edit',['id'=> $contact->id,'autofocus'=>'note'])}}">
                                            <i class="fa fa-plus-square-o"></i>
                                        </a> Add Note
                                    @else
                                        {{$contact->note}}
                                    @endif
                                </div>
                                <hr/>
                                <div class="row">
                                    <h3>
                                        <button type="button"  class="btn btn-primary m-r-sm" data-toggle="modal"  data-target="#taskModal">
                                            <i class="fa fa-plus-square-o"></i>
                                        </button> Add Task
                                        @include("include.modal.taskModal", ['modalId'=> 'taskModal', 'contact'=> $contact]) 
                                    </h3>
                                    @include("include.pages.timelineBox", ['tasks'=> $taskByDay, 'url'=> route("contact.show", ['id'=>$contact->id])])                                
                                </div>
                            </div>
                            
                            <div class="col-lg-4">
                                <div class="row well"> 
                                    @include("include.form.interestForm")
                                </div>
                            </div>

                            <div class="col-lg-4">
                            
                            
                            </div>
                            
                        </div>        
                        </div> 
                    </div>

                </div>
            </div>
@stop

@section("styles") 
    <style> 
        [action-url] { margin-left: 2px; } 
    </style> 
@stop
@section("scripts")

<script>

</script>

@stop