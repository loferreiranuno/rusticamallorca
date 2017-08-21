            <h1>Property properties</h1>
            <fieldset> 
                <div class="ibox-content">
                    <h2>Property amenities</h2>                    
                    <div class="row hidden">
                    @foreach(App\Feature::all()->sortBy('name') as $item)
                        <div class="col-sm-4" >
                            <ul class="todo-list m-t" feature-item>
                                <li>
                                    {!! Form::checkbox('feature-'.$item->id, $item->id, old('feature-'.$item->id) != null ? old('feature-'.$item->id) : (isset($product)? $product->features->find($item->id) != null : false), ["class" => "i-checks", "name"=> "feature-".$item->id]) !!}
                                    <span class="m-l-xs">{{ $item->name }}</span>
                                </li> 
                            </ul>                            
                        </div> 
                    @endforeach
                    </div>
                </div>
            </fieldset>