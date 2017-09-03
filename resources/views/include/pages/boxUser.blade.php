<div class="widget lazur-bg p-xs">
    @if(isset($user))   
    <h2>
        {{ $user->name }}
    </h2> 

    <small>{{ isset($label) ? link_to_route('user.show',  $label, ['user'=>$user], ['class'=>'' ]) : "" }}</small>
       
    @elseif(isset($source))
        <h2>
            {{ $source->name }}
        </h2>
    
    <small>{{ isset($label) ? $label : "" }}</small>

    
    @else
    
    <h2>No {!! $label !!} assigned</h2>
    
    @endif
</div> 