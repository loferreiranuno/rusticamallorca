@extends('layouts.back.default')

@section('breadcrumb')
   @include("include.back.breadcrumb", 
                [
                    'title' => "Task edit"  ,
                    'rootTitle' => "",
                    'root' => '',
                    'currentTitle' => "" , 
                    'actionHtml' => '<button id="save-calendar" class="btn btn-primary">Save Calendar</button>'
                ])  
@stop 

@section('content') 
    <div class="row">
        <div class="col-lg-12">
           <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div id="calendar"></div>    
                </div>
            </div>
        </div>
    </div>

    {!! Form::hidden("task_id", isset($task)?$task->id:null) !!}    
    {!! Form::hidden("contact_id", isset($contact) ? $contact->id : null) !!}
    {!! Form::hidden("user_id", isset($user) ? $user->id : null) !!}
    {!! Form::hidden("product_id", isset($product) ? $product->id : null) !!}   

    
    @include("include.modal.taskModal", ['modalId'=> 'taskModal']) 
                        
    {!! Form::hidden("server-url", route("task.search", [
        "task" => isset($task) ? $task->id : null,
        "contact" => isset($contact) ? $contact->id : null,
        "user" => isset($user) ? $user->id : null,
        "product" => isset($product) ? $product->id : null])) !!}

    {{ csrf_field() }}
    
    {!! Form::hidden("server-update", route('task.calendar.update')) !!}    
    {!! Form::hidden('current-date', isset($task) ? $task->start_date : Carbon\Carbon::now()) !!}
    
@stop


@section("styles")
 
    <link href="{{asset('css/plugins/fullcalendar/fullcalendar.css')}}" rel="stylesheet">
    <link href="{{asset('css/plugins/fullcalendar/fullcalendar.print.css')}}" rel='stylesheet' media='print'>
@stop

@section("scripts")
@parent
    <script src="{{asset('js/plugins/fullcalendar/moment.min.js')}}"></script>
    <!-- Full Calendar -->
    <script src="{{asset('js/plugins/fullcalendar/fullcalendar.min.js')}}"></script>
 
    <script>      

        function parseEvent(event){
            var start_date =  event.start.format("YYYY-MM-DD HH:mm:ss");
            var end_date;
            if(!event.end){
                if(event.allDay){
                    end_date = event.start.format("YYYY-MM-DD") + " 23:59:59";
                }else{
                    end_date = start_date;
                }
            }else{
                end_date = event.end.format("YYYY-MM-DD HH:mm:ss");
            }

            return {  
                "task": event.id,
                "start_date": start_date,
                "end_date":  end_date
            }
        }

        function saveEvent(events, onSuccess, onError){
            $.ajax({
                    url: $("[name='server-update']").val(),
                    type: "POST",
                    data:{
                        events: events,
                        _token: $("[name='_token']:first").val()
                    }, 
                    success: function(data){
                        onSuccess(data);
                    },
                    error: function(data){
                        onError(data)
                    }
                });
        }
        $(document).ready(function(){

            $("#save-calendar").on('click', function(){

                var events = $('#calendar').fullCalendar('clientEvents').map(function(event){
                    return parseEvent(event);
                });
                
                saveEvent(events, 
                function(data){
                    window.location.reload();
                }, function(data){
                    alert("server error");
                })
                
            });

            $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },  
            defaultView: 'agendaWeek',
            eventAfterRender: function(event, element, view) {
                 
                if(view.name == "agendaDay" || view.name == "agendaWeek"){

                    var description = $("<p>");
                    description.text(event.description);
                    element.append(description);

                    if(event.product){
                       
                        var product = "<div class=''>";
                        product += "<label>" + event.product.label + "</label>: ";
                        product += "<span href='" + event.product.url + "' target='_blank'>" + event.product.name + "</span>";
                        product += "</div>";
                        
                        element.append(product);
                        element.append("<br>");
                    }


                    if(event.contact){
                        var contact = "<div class=''>";
                        contact += "<label>" + event.contact.label + "</label>: ";
                        contact += "<span href='" + event.contact.url + "' target='_blank'>" + event.contact.name + "</span>";
                        contact += "</div>";

                        element.append(contact);
                        element.append("<br>");
                    }
                    
                    if(event.creator){
                       
                        var creator = "<div class=''>";
                        creator += "<label>" + event.creator.label + "</label>: ";
                        creator += "<span href='" + event.creator.url + "' target='_blank'>" + event.creator.name + "</span>";
                        creator += "</div>";
                        
                        element.append(creator);
                        element.append("<br>");
                    }

                }
            },
            editable: true,
            eventDrop: function(event, delta, revertFunc){
                var events = [parseEvent(event)];
                saveEvent(events, function(data){
                    
                }, function(data){
                    alert("server error");
                })
            },
            eventClick: function(event, jsEvent, view){
                //TODO: nothing...  
            },
            defaultDate: moment($("#current-date").val()) ,
            eventSources:[
                {
                    url: $("[name='server-url']").val(),
                    type: 'GET',
                    data: {
                        task:  $("#task_id").val(), 
                        _token: $("[name='_token']:first").val()
                    },
                    error: function() {
                        alert('There was an error while fetching events!');
                    } 
                }              
            ] 
            })
        });
    </script>
@stop        
