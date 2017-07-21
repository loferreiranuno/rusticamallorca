@if(count($errors))
<div class="row">
    <div class="form-group">
        <div class="alert alert-danger">
            <li>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </li>
        </div>
    </div>
</div>
@endif