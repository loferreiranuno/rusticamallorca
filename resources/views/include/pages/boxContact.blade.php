 
<div class="widget lazur-bg p-xs">
    @if(isset($contact))   

    @if(!isset($showTitle) || $showTitle)
        <h2> 
            {{ $contact->name }}
        </h2>
    @endif    
    
    @if(isset($showDetails) && $showDetails)
        <ul class="list-unstyled">
            
            @if(isset($contact->email))
                <li>
                    <span class="fa fa-envelope m-r-xs"></span>
                    <label>Email:</label>
                    {{$contact->email}}
                </li>
            @endif

            @if(isset($contact->fullAddress) && trim($contact->fullAddress)!= "")
            <li>
                <span class="fa fa-home m-r-xs"></span>
                <label>Address:</label>
                {{$contact->fullAddress}}
            </li>
            @endif

            @if(isset($contact->phone))
            <li>
                <span class="fa fa-phone m-r-xs"></span>
                <label>Contact:</label>
                {{ $contact->phone }}  
            </li>
            @endif
            @if(isset($contact->phone_alt))
                <li>
                <span class="fa fa-phone m-r-xs"></span>
                <label>Contact alt.:</label>
                {{ $contact->phone_alt }}  
            </li>
            @endif
        </ul>
    @endif

    <small>{{ isset($label) ? link_to_route('contact.show',  $label, ['contact'=>$contact], ['class'=>'' ]) : "" }}</small>    
 
    @elseif(isset($user))

        <h2>
            {{ $user->name }}
        </h2>
    
    <small>{{ (isset($label) ? link_to_route('user.show',  $label, ['user'=>$user], ['class'=>'' ]): "") }}</small>
    @else    
        <h2>No {{ $label }} assigned</h2>
        <ul class="list-unstyled m-t-md">
            <li>
                <a href="{{ route('contact.create', ['product'=> isset($product) ? $product->id : null ]) }}" class="btn btn-primary">Add new {{ $label }}</a>
            </li>
        </ul>
    @endif

</div> 