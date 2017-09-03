<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>
        <span class="label label-primary pull-right" >{{$label}}</span>
        @if(isset($user))
            {{$user->name}}
        @elseif(isset($source))
            {{$source->name}}
        @else
            {{ isset($label) ? $label : ""}}
        @endif
        </h5> 
        <div class="ibox-tools">
            <a class="collapse-link">
                <i class="fa fa-chevron-down"></i>
            </a>
        </div>
    </div>
    <div class="ibox-content"  style="display: none;">
         <ul class="list-unstyled">
         <li>
            @if(isset($user)) 
                <small>{{$user->email}}</smal>
                {{link_to_route('user.show',  "Visit " . $label . " profile", ['user'=>$user], ['class'=>'small' ])  }}
            @elseif(isset($source))
                 
            @else
                 <strong>No {!! $label !!} assigned</strong>
            @endif
        </li>
    </ul> 
    </div>
</div>