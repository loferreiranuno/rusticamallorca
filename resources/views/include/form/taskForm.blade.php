{{ Form::open(array('method'=>'post', 'id'=>'task-form', 'name' => 'task-form', 'url' => route("task.store"))) }}
            @if(!isset($task))
                <h1>Task form</h1>
            @endif
            <fieldset> 
                <div class="row"> 
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-4"> 
                                <div class="form-group">   
                                    {!! Form::label("day", "Date") !!}
                                    {!! Form::date("day", isset($task) ? date('Y-m-d', strtotime(str_replace('-','/', $task->start_date))) : new \DateTime() , ['id'=>'day', 'class'=> 'form-control']) !!}                                                                                                                                                
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">    
                                            {!! Form::label("day_hour", "Hour") !!}
                                            {!! Form::selectRange("hours", 0, 23, isset($task) ? intval(date('H', strtotime(str_replace('-','/', $task->start_date)))) :  12, ['class'=>'form-control', 'time-select' => '', 'id'=>'hours']) !!}
                                        </div>
                                    </div>
                                    <div class="col-sm-6">        
                                        <div class="form-group">    
                                            {!! Form::label("day_hour", "Minutes") !!}
                                            {!! Form::selectRange("minutes", 0, 59, isset($task) ? intval(date('H', strtotime(str_replace('-','/', $task->start_date)))) :  30, ['class'=>'form-control' ,'time-select' => '', 'id'=>'minutes']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    {!! Form::label("day_hour", "Duration") !!}
                                    {!! Form::selectRange("duration", 0, 180, isset($task) ? round(abs((strtotime($task->end_date) - strtotime($task->start_date))) / 60,2) : 30, ['class'=>'form-control', 'id'=> 'duration']) !!}                                    
                                </div>
                            </div>
                        </diV>
                        
                        {!! Form::hidden("start_date", isset($task) ? $task->start_date : null, ["id"=>"start_date"]) !!}
                        {!! Form::hidden("end_date", isset($task) ? $task->end_date : null, ["id"=>"end_date"]) !!}
                        
                        <div class="form-group">                                                
                            {!! Form::label("task_kind_id", "Kind*") !!}                                                
                            {!!Form::select('task_kind_id', App\TaskKind::pluck('name', 'id'), isset($task) ? $task->task_kind_id : null, ['class'=> 'form-control'])!!} 
                        </div> 
                        <div class="form-group">                                                
                            {!!Form::label("user_id", "Assign to*") !!}                                                
                            {!!Form::select('user_id',App\User::pluck('name', 'id'), isset($task) ? $task->user_id : null, ['class'=> 'form-control'])!!} 
                        </div> 
                        <div class="form-group">                                                
                            {!! Form::label("contact_id", "Contact") !!}                                                
                            {!!Form::select('contact_id',App\Contact::pluck('name', 'id'), isset($task) ? $task->contact_id : null, ['class'=> 'form-control'])!!} 
                        </div> 
                        <div class="form-group">                                                
                            {!!Form::label("product_id", "Property") !!}                                                
                            {!!Form::select('product_id',App\Product::pluck('title', 'id'), isset($task) ? $task->product_id : null, ['class'=> 'form-control'])!!} 
                        </div> 
                        <div class="form-group">
                        {!! Form::label("description", "Property") !!}          
                        {!! Form::textarea('description', isset($task) ? $task->description : null, ['class'=>'form-control']) !!}
                        
                        </div>
                    </div> 
                </div>

            </fieldset>
             {!! Form::close() !!}

 
@section("scripts")
@parent
    <script src="{{asset('js/plugins/fullcalendar/moment.min.js')}}"></script> 
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