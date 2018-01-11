<html>
<head></head>
<body>

Message sended by {{$contact->name}} [{{$contact->email}}] from the web.

<p><strong>Message:</strong></p>
<p>{{$bodyMessage}}</p>


@if(isset($product))
<strong>Property:</strong>
    <p>
    Property: {{ $product->title }}, <a href="{{route('property.show',['property'=>$product])}}"> visit property page</a>.
    </p>
@endif

</body>
</html>
