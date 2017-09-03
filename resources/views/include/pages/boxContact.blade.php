<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>        
        <span class="label label-primary pull-right">{{$label}}</span>
        @if(isset($contact))
            {{$contact->name}}
        @elseif(isset($user))
            {{$user->name}}
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
    <div class="ibox-content" style="display: none;">
    @if(isset($contact))
        
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
            <li>
                {{link_to_route('contact.show', "Visit ". $label . " profile", ['contact'=>isset($contact)?$contact:null], ['class'=>'small' ])}}
            </li>
        </ul> 
    @elseif(isset($user))    
        <small>{{ (isset($label) ? link_to_route('user.show',  $label, ['user'=>$user], ['class'=>'' ]): "") }}</small>
    @else    
        
        <ul class="list-unstyled m-t-md">
            <li><h3>No {{ $label }} assigned</h3></li>
            <li>
                <a href="{{ route('contact.create', ['product'=> isset($product) ? $product->id : null ]) }}" class="btn btn-primary">Add new {{ $label }}</a>
            </li>
        </ul>
    @endif
        </div>
    </div>