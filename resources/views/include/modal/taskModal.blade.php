
<div class="modal inmodal" id="{{$modalId}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content animated bounceInRight">
            {{ Form::open(array('method'=>'post', 'id'=>'task-form', 'name' => 'task-form', 'url' => route("task.store"))) }}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button> 
            </div>
            <div class="modal-body">
            
            <h1>Task form</h1>
            <fieldset> 
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <div id="calendar"></div>
                        </div>                    
                    </div>
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">   
                                    {!! Form::label("day", "Date") !!}
                                    {!! Form::date("day", new \DateTime() , ['id'=>'day', 'class'=> 'form-control']) !!}                                                                                                                                                
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">    
                                            {!! Form::label("day_hour", "Hour") !!}
                                            {!! Form::selectRange("hours", 0, 23, 12, ['class'=>'form-control', 'time-select' => '', 'id'=>'hours']) !!}
                                        </div>
                                    </div>
                                    <div class="col-sm-6">        
                                        <div class="form-group">    
                                            {!! Form::label("day_hour", "Minutes") !!}
                                            {!! Form::selectRange("minutes", 0, 59, 0, ['class'=>'form-control' ,'time-select' => '', 'id'=>'minutes']) !!}
                                        </div>

                                    </div> 
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    {!! Form::label("day_hour", "Duration") !!}
                                    {!! Form::selectRange("duration", 10, 180, 30, ['class'=>'form-control', 'id'=> 'duration']) !!}                                    
                                </div>
                            </div>
                        </diV>
                        
                        {!! Form::hidden("start_date", "", ["id"=>"start_date"]) !!}
                        {!! Form::hidden("end_date", "", ["id"=>"end_date"]) !!}
                        
                        <div class="form-group">                                                
                            {!! Form::label("task_kind_id", "Kind*") !!}                                                
                            {!!Form::select('task_kind_id', App\TaskKind::pluck('name', 'id'), null, ['class'=> 'form-control'])!!} 
                        </div> 
                        <div class="form-group">                                                
                            {!! Form::label("user_id", "Assign to*") !!}                                                
                            {!!Form::select('user_id',App\User::pluck('name', 'id'), null, ['class'=> 'form-control'])!!} 
                        </div> 
                        <div class="form-group">                                                
                            {!! Form::label("contact_id", "Contact") !!}                                                
                            {!!Form::select('contact_id',App\Contact::pluck('name', 'id'), null, ['class'=> 'form-control'])!!} 
                        </div> 
                        <div class="form-group">                                                
                            {!! Form::label("product_id", "Property") !!}                                                
                            {!!Form::select('product_id',App\Product::pluck('title', 'id'), null, ['class'=> 'form-control'])!!} 
                        </div> 
                        <div class="form-group">
                        {!! Form::label("description", "Property") !!}          
                        {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
                        
                        </div>
                    </div> 
                </div>

            </fieldset>
                                            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <button type="button" submit-task class="btn btn-primary">Submit task</button>
            </div>
    
            {!! Form::close() !!}
    
        </div>
    </div>
</div> 
@section("styles")
@parent
    <link href="{{asset('css/plugins/fullcalendar/fullcalendar.css')}}" rel="stylesheet">
    <link href="{{asset('css/plugins/fullcalendar/fullcalendar.print.css')}}" rel='stylesheet' media='print'>
@stop

@section("scripts")
@parent
    <script src="{{asset('js/plugins/fullcalendar/moment.min.js')}}"></script>
    <!-- Full Calendar -->
    <script src="{{asset('js/plugins/fullcalendar/fullcalendar.min.js')}}"></script>

    <script>
        
        function pad(num, size) {
            var s = "000000000" + num;
            return s.substr(s.length-size);
        }

        Date.prototype.addHours = function(h) {    
            this.setTime(this.getTime() + (h*60*60*1000)); 
            return this;   
        }

        $(document).ready(function(){
            $("[submit-task]").on("click", function(){                

                var start_date = $("#day").val() + " " + pad(parseInt($("#hours").val()), 2) + ":" + pad(parseInt($("#minutes").val()), 2);
                var date = new Date(start_date);   
                $("#start_date").val(moment(date).format("YYYY-MM-DD HH:mm:ss"));

                var end_date = new Date(date.setMinutes(date.getMinutes() + parseInt($("#duration").val())));
                $("#end_date").val(moment(end_date).format("YYYY-MM-DD HH:mm:ss"));

                $.ajax({
                    type: 'POST',
                    data: $("#task-form").serialize(),
                    url: $("#task-form").attr("action"),
                    success: function(data){ 
                        window.location.reload();
                    },
                    error: function(error){ 
                        
                    }
                })
            });


    
        });
    </script>
@stop

