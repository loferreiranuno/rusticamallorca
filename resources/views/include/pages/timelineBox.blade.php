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
            <div class="vertical-timeline-icon gray-bg">
                <i class="{{ $task->icon_css }}"></i>
            </div>
            <div class="vertical-timeline-content">
                <p>{{$task->description}}</p>
                <a href="{{route('task.edit', ['task'=>$task->id]) }}">Edit</a>
                <span class="vertical-date small text-muted"> {{$task->start_date}} - {{$task->end_date}} </span>
            </div>
        </div>
        @endforeach
    @endforeach
</div>
@endif 