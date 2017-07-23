@if(count($errors))
<div class="row">
    <div class="form-group">
        <div class="alert alert-danger">
            
                @foreach($errors->all() as $error)
                    @if(isset($error) && !empty($error))
                        <li>{{$error}}</li>
                    @endif
                @endforeach
             
        </div>
    </div>
</div>
@endif