<!-- Range slider -->
<div class="row">
    @if(isset($title))
        <div class="explore col-xs-12">
            <h2>{{ $title }}</h2>
            <h5 class="team-color col-sm-offset-3 col-sm-6 col-xs-offset-1 col-xs-10">
                {{ $description }}
            </h5>
        </div>
    @endif
    
        <div class="col-md-2 col-sm-3">
            <div class="form-inline">
                <label class="top-indent">@lang("include.priceRange"):</label>
            </div>
        </div>

        <div class="col-md-8 col-sm-7">
            <div class="form-group">
                <div class="price-range price-range-wrapper">  
                @if(isset($id))              
                    {!! Form::text($id, $price, ['id'=> $id,'class'=> 'price-input']) !!} 
                @endif
                </div>
            </div>
        </div>

        @if(isset($sortBy))
            <div class="select-block no-border pull-right col-sm-2 col-xs-12">
                {!! Form::select('sort-by', $sortBy, old('sort-by'), ['id'=>'sort-by', 'class'=>'selection']) !!}
            </div>	
        @endif

    
</div><!-- row -->
<!-- End Range slider -->