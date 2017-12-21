<tr>
    @foreach($columns as $column)
        <{{$td}}>{{$column}}</{{$td}}>
    @endforeach
    
    @if(isset($action))
        <{{$td}}></{{$td}}>
    @endif
</tr> 