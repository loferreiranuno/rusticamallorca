@if(isset($tasks))
<div id="vertical-timeline" class="vertical-container dark-timeline">
    @foreach($tasks as $key => $taskItems)
        <div class="vertical-timeline-block">
            <span class="btn btn-default btn-sm">
                <small>{{ $key }}</small>
            </span>  
        </div>
        @foreach($taskItems as $task)
        <div class="vertical-timeline-block">
            <div class="vertical-timeline-icon {{ App\Helpers\RusticaHelper::getTaskCss($task) }}">
                <i class="{{ $task->kind->css_icon }}"></i>
            </div>
            <div class="vertical-timeline-content">
                <div>
                     @include("include.pages.optionButton", ["item" => $task, "url"=> $url, "type" => "task"])
                     <span>
                        Created Account<br/>
                        <small>
                            {{ App\Helpers\RusticaHelper::formatDate($task->end_date, "H:s") }} - {{ App\Helpers\RusticaHelper::formatDate($task->start_date, "H:s") }}
                        </small>
                     </span>
                </div>                
                <span><i>{{$task->description}}</i></span>
                <hr/> 
                <span class="vertical-date small text-muted">
                    @if($task->product != null && (!isset($product) || $product->id != $task->product->id))
                        <a href="{{route('product.show', ['id'=>$task->product->id])}}" >{{$task->product->fullAddress}}</a>
                    @endif
                    @if($task->contact != null)
                        <br/> Contact <a href="{{route('contact.show', ['id'=>$task->contact->id])}}" >{{$task->contact->name}}</a>
                    @endif
                     {{ \Carbon\Carbon::createFromTimeStamp(strtotime($task->created_at))->diffForHumans() }}
                </span>
            </div>
        </div>
        @endforeach
    @endforeach
</div>
@endif 

@section("scripts")
@parent

<script>

$(document).ready(function(){

    $("[task-done-btn]").on("click", function(e){
        e.stopPropagation();
        e.preventDefault();
        
        var id = $(this).attr("task-id");
        var done = $(this).attr("task-done");

        $.ajax({
            url: "{{ route('task.done') }}",
            method: 'post',
            data:{
                id: id,
                done: done,
                _token: "{{csrf_token()}}" 
            },
            success:function(data){
                if(!data.error){
                    window.location.reload();
                }
            },
            error:function(){

            }
        });

    })
    
});
</script>

@stop