<div class="widget lazur-bg p-xs">
    @if(isset($contact))   
    <h2>
        {{ $contact->name }}
    </h2>
    
    <small>{{ isset($label) ? $label : "" }}</small>
    
    @else
    
    <h2>No {{ $label }} assigned</h2>
    <ul class="list-unstyled m-t-md">
        <li>
            <a href="{{ route('contact.create', ['product'=> isset($product) ? $product->id : null ]) }}" class="btn btn-primary">Add new {{ $label }}</a>
        </li>
    </ul>
    @endif
</div> 