@extends('layouts.back.default')
 


 @section('breadcrumb')

        @include("include.back.breadcrumb", 
        [
            'title' => "User list"  ,
            'rootTitle' => "Users",
            'root' => route("user.index"),
            'currentTitle' => "List", 
            'actionData'=>$actionData 
        ])    
@stop 


@section('content') 

<div class="wrapper wrapper-content animated fadeInRight ecommerce">

            <div class="ibox-content m-b-sm border-bottom">
            
            {!! Form::open(array('route' => 'user.index', 'method'=>'GET')) !!}   
                
                {!! Form::hidden('search', true) !!}
            
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">    
                            {!! Form::text('searchQuery', old('searchQuery'), ['placeholder'=> 'Name/Email/Phone Text', 'class'=>'form-control']) !!}                            
                        </div>
                    </div>               
                    <div class="col-sm-2">
                    <div class="form-group">
                    
                    {!! Form::submit("Go", ['class'=>'btn btn-primary']) !!}
                    
                    </div></div>   
                                    
                </div>

            {!! Form::close() !!}    
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-content">
                     
                            <table class=" table table-stripped toggle-arrow-tiny default breakpoint footable-loaded"  >
                                <thead>
                                <tr>
                                    <th data-toggle="true" class="footable-visible"></th> 
                                    <th data-toggle="true" class="footable-visible"></th>  
                                    <th data-toggle="true" class="footable-visible">Name</th> 
                                    <th data-toggle="true" class="footable-visible">Email</th>  
                                    <th data-toggle="true" class="footable-visible">Responsible</th> 
                                    <th data-toggle="true" class="footable-visible">Created</th> 
                                    <th data-toggle="true" class="footable-visible">Last action</th>                                     
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($users))                                   
                                @foreach($users as $user)

                                    <tr contact-row contact-url="{{ route('user.show',['id'=>$user->id]) }}" style="cursor:pointer;" class="{!! $user->id % 2 == 0 ? 'footable-even' : 'footable-odd' !!}}">
                                        
                                        <td class="footable-visible"><!-- checkbox --></td>
                                        <td class="footable-visible"><!-- image --></td>
                                        <td class="footable-visible">{!! $user->name !!}</td>
                                        <td class="footable-visible">{!! $user->email !!}</td>  
                                        <td class="footable-visible">{!! $user->created_at !!}</td> 
                                        <td class="footable-visible">{!! $user->updated_at !!}</td> 
                                        <td class="text-right footable-visible footable-last-column">
                                            <div class="btn-group">
                                                <a href="{!!route('user.edit',['id'=> $user->id])!!}" class="btn btn-primary" title="Edit">
                                                <i class="fa fa-edit"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>  

                                @endforeach
                                @endif

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="14" class="footable-visible"></td>
                                    </tr>
                                </tfoot>
                            </table>

                        @if(isset($users))    
                            {{ $users->appends(Input::except('page'))->links() }}
                        @endif
                        </div>
                    </div>
                </div>
            </div>


        </div>



@stop

@section("scripts") 
@stop

@section("styles") 
@stop 