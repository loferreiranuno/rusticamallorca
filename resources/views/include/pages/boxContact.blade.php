<div class="widget lazur-bg p-xs">
    @if(isset($contact))   
    <h2>
        {{ $contact->name }}
    </h2>
   
    <ul class="list-unstyled m-t-md">
        <li>
            <span class="fa fa-envelope m-r-xs"></span>
            <label>Email:</label>
            {{ $contact->email }}
        </li>
        <li>
            <span class="fa fa-home m-r-xs"></span>
            <label>Address:</label>
            {{ $contact->address }} {{ $contact->city }}
        </li>
        <li>
            <span class="fa fa-phone m-r-xs"></span>
            <label>Contact:</label>
            {{ $contact->phone }} {{ $contact->phone_alt}}
        </li>
    </ul>

    <small>{{ isset($label) ? $label : "" }}</small>
    @else
    
    <h2>No owner assigned</h2>
    <ul class="list-unstyled m-t-md">
        <li>
            <a href="{{ route('contact.create', ['product'=> isset($product) ? $product->id : null ]) }}" class="btn btn-primary">Add new {{ $label }}</a>
        </li>
    </ul>
    @endif
</div> 