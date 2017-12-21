<div class="row"> 
    <div class="col-lg-12">
        <div class="form-group {{ $errors->has($id) ? ' has-error' : '' }}">
            @if(isset($required) && $required)
                {!!Form::label($id,$name."*")!!}          
                {!! Form::hidden('required[]', $id, ['disabled'=>'disabled']) !!}     
            @else
                {!!Form::label($id,$name)!!}    
            @endif 
            
                
                @if(isset($icon))
                <div class="input-group">
                    {!!Form::number($id, old($id), ['class'=>'form-control']) !!}
                    <span class="input-group-addon">{{$icon}}</span>
                </div>  
                @else
                    {!!Form::number($id, old($id), ['class'=>'form-control']) !!}
                @endif   
        </div>
    </div> 
</div> 