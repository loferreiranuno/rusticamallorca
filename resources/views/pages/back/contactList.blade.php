@extends('layouts.back.default')
 

@section('breadcrumb')
        @include("include.back.breadcrumb", 
        [
            'title' => "Contact list"  ,
            'rootTitle' => "Contacts",
            'root' => route("contact.index"),
            'currentTitle' => "List", 
            'actionHtml' => '
                <a class="btn btn-primary pull-right margin-left"  href="' . route('contact.create') . '" action-url="' . route('contact.create') . '">Add</a>'
        ])   
@stop 


@section('content')
<div class="wrapper wrapper-content animated fadeInRight ecommerce">

            <div class="ibox-content m-b-sm border-bottom">
            
            {!! Form::open(array('route' => 'contact.index', 'method'=>'GET')) !!}   
                
                {!! Form::hidden('search', true) !!}
            
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">    
                            {!! Form::text('searchQuery', old('searchQuery'), ['placeholder'=> 'Name/Email/Phone Text', 'class'=>'form-control']) !!}                            
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">                 
                            {!! Form::select('step', App\ContactStep::pluck('name', 'id')->prepend('Funnel step', ''), old('step'), ['class'=>'form-control']) !!}                            
                        </div>
                    </div>                    
                    <div class="col-sm-2">
                        <div class="form-group">    
                        {!! Form::select('kind_id', $contactKinds->prepend('Type',''), old('kind_id'), ['class'=>'form-control']) !!}                            
                        </div>
                    </div>              
                    <div class="col-sm-2">
                        <div class="form-group">    
                        {!! Form::select('responsable', $responsibles->prepend('Responsible',''), old('responsable'), ['class'=>'form-control']) !!}                            
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
                                    {{-- <th data-toggle="true" class="footable-visible">Kind</th>  --}}
                                    <th data-toggle="true" class="footable-visible">Name</th> 
                                    <th data-toggle="true" class="footable-visible">Email</th> 
                                    <th data-toggle="true" class="footable-visible">Phone</th> 
                                    <th data-toggle="true" class="footable-visible">Source</th> 
                                    <th data-toggle="true" class="footable-visible">Creator</th>
                                    <th data-toggle="true" class="footable-visible">Responsible</th> 
                                    <th data-toggle="true" class="footable-visible">Created</th> 
                                    <th data-toggle="true" class="footable-visible">Last action</th> 
                                    {{-- <th data-toggle="true" class="footable-visible">Funnel step</th>                                     --}}
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($contacts))                                   
                                @foreach($contacts as $contact)

                                    <tr contact-row contact-url="{{ route('contact.show',['id'=>$contact->id]) }}" style="" class="{!! $contact->id % 2 == 0 ? 'footable-even' : 'footable-odd' !!}}">
                                        
                                        <td class="footable-visible"><!-- checkbox --></td>
                                        <td class="footable-visible"><span class="b-r-xl"><h2>{{$contact->sigla}}</h2></span></td>
                                        {{-- <td class="footable-visible">{!! $contact->kind->name !!}</td> --}}
                                        <td class="footable-visible">{!! $contact->name !!}</td> 
                                        <td class="footable-visible">{!! $contact->email !!}</td> 
                                        <td class="footable-visible">{!! $contact->phone !!}</td> 
                                        <td class="footable-visible">{!! $contact->source->name !!}</td> 
                                        <td class="footable-visible">{!! $contact->creator->name !!}</td>
                                        <td class="footable-visible">{!! $contact->responsable->name !!}</td> 
                                        <td class="footable-visible">{!! $contact->created_at !!}</td> 
                                        <td class="footable-visible">{!! $contact->updated_at !!}</td> 
                                        {{-- <td class="footable-visible">{!! isset($contact->step)?$contact->step->name : '-' !!}</td>     --}}

                                        <td class="text-right footable-visible footable-last-column">
                                            <div class="btn-group">
                                                <a href="{!!route('contact.edit',['id'=> $contact->id])!!}" class="btn btn-primary" title="Edit">
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

                        @if(isset($contacts))    
                            {{ $contacts->appends(Input::except('page'))->links() }}
                        @endif
                        </div>
                    </div>
                </div>
            </div>


        </div>

@stop

@section("scripts")
<script>
    $(document).ready(function(){        
        $("[contact-row]").on("click", function(){
            window.location = $(this).attr("contact-url");
        })
        .on("mouseover", function(){
            $(this).addClass("active");
        })
        .on("mouseout", function(){
            $(this).removeClass("active");
        });
    });
</script>
@stop

@section("styles")
    <style>
        [contact-row]
        {
            cursor:pointer;
        }
    </style>
@stop 