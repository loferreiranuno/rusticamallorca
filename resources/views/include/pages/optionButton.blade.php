

@if(isset($type))

@if(isset($item))
<span class="pull-right" style="padding:5px;">
    
    @if(!$task->done)
    <div class="btn-group">
        <a href="#" task-done-btn task-done="true" task-id="{{$task->id}}" class="btn btn-xs btn-primary">
            <i class="fa fa-check"></i>
        </a>
    </div>
    @endif

    <div class="btn-group" role="group">
    <button class="btn btn-xs btn-default dropdown-toggle" type="button" id="task-{{$item->id}}-options" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
        <i class="fa fa-cog"></i>
    </button>
    <ul class="dropdown-menu pull-right" aria-labelledby="task-1374162-options">
    @if(!$task->done)
    <li>
        <a href="{{route('task.edit', ['id'=> $task->id])}}">
            <i class="fa fa-edit"></i>
            Edit
        </a>
    </li>
    @else
    <li>
        <a href="#" task-done-btn task-done="false" task-id="{{$task->id}}" >
            <i class="fa fa-repeat"></i>
            Reactivate
        </a>
    </li>
    @endif
    </ul>
    </div>
</span>
@endif

@endif