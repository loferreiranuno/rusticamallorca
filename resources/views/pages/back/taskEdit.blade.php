@extends('layouts.back.default')

@section('breadcrumb')
   @include("include.back.breadcrumb", 
                [
                    'title' => "Task edit"  ,
                    'rootTitle' => isset($task) ?  $task->user->name :  "My tasks",
                    'root' => '',
                    'currentTitle' => isset($task) ?  $task->description : null , 
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

        $(document).ready(function(){


            $("#save-calendar").on('click', function(){
                var events = $('#calendar').fullCalendar('clientEvents').map(function(event){
                    var start_date =  event.start.format("YYYY-MM-DD HH:mm:ss");
                    var end_date;
                    if(!event.end){
                        if(event.allDay){
                            end_date = event.start.format("YYYY-MM-DD") + " 23:59:59";
                        }
                    }else{
                        end_date = event.end.format("YYYY-MM-DD HH:mm:ss");
                    }

                    return {  
                        "task": event.id,
                        "start_date": start_date,
                        "end_date":  end_date
                    }
                });

                $.ajax({
                    url: "{{route('task.calendar.update')}}",
                    type: "POST",
                    data:{
                        events: events,
                        _token: "{{csrf_token()}}"
                    }, 
                    success: function(){
                        window.location.reload();
                    },
                    error: function(){
                        alert("")
                    }
                })
                
            });


            $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            }, 
            defaultView: 'agendaWeek',
            defaultDate: $("#start_date").val(), 
            editable: true,
            drop: function() {
                // is the "remove after drop" checkbox checked?
                if ($('#drop-remove').is(':checked')) {
                    // if so, remove the element from the "Draggable Events" list
                    $(this).remove();
                }
            },
            eventSources:[
                {
                    url: '{{route("task.search", ["task"=> isset($task) ? $task->id : null ])}}',
                    type: 'GET',
                    data: {
                        task:  $("#task_id").val(),
                        otherOnly: false,
                        _token: ''
                    },
                    error: function() {
                        alert('There was an error while fetching events!');
                    } 
                },
                {
                    url: '{{route("task.search", ["task"=>isset($task) ? $task->id : null ])}}',
                    type: 'GET',
                    data: {
                        task: $("#task_id").val(),
                        otherOnly: true,
                        _token: ''
                    },
                    error: function() {
                        alert('there was an error while fetching events!');
                    },
                    eventColor: '#378006'
                }                
            ] 
            })
        });
    </script>
@stop        
