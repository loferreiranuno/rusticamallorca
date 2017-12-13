@extends('layouts.front.default',["header"=>['class'=>''], "body"=>['class'=>'page-search', 'id'=>'page-top', 'content'=>['id'=>'page-content-search']]])

@section('content')
<div class="container">
	<div class="wide_container_2">
		<div class="tabs">
			<header class="col-md-8 col-xs-12 no-pad">
			
			{!! Form::open(array('method'=>'get', 'route' => 'front.search', 'id'=>'search-form')) !!}
			
				<div class="location-map col-sm-4 col-xs-4">
					<div class="input-group">
						@include("include.front.search.searchField") 
						<a href="" id="search-btn"><i class="fa fa-search"></i></a>
					</div>
				</div>
				<div class="select-block col-sm-2 col-xs-2">
				
				{!! Form::select('rooms', RMHelper::getRoomSelectItems(), old('rooms'), ['class'=>'selection']) !!}
			 
				</div>
				<div class="select-block col-sm-2 col-xs-2 "> 
				
				{!! Form::select("sell_type", RMHelper::getSaleType() , old('sell_type'), ['class'=> 'selection']) !!}
 
				</div>
				<div class="select-block col-md-3 col-xs-4 last">
					<a class="options-button" id="toggle-link">@lang('include.moreFilters')</a>
				</div>
				<div class="options-overlay col-md-offset-4 col-sm-offset-5 col-sm-7" id="hidden_content" style="display: none;">
					<div class="row">
						<div class="col-xs-6 top-mrg">
							<div class="internal-container features">
								<div class="form-group">
									<label>@lang('include.minimunSquareFootage'):</label>
									{!! Form::number('area', old('area'), ['class'=> 'form-control', 'placeholder'=> __('include.enterAnAmount')]) !!}
								</div>
								<label>@lang('include.buildingFeatures'):</label>
								<section class="block">
									<section>
										<ul class="submit-features">
										@foreach(App\Feature::buildingFeatures() as $feature)
										<li>
											<div class="checkbox">
												<label>  
													{!! Form::checkbox("features[]", $feature->id, RMHelper::isChecked(Request::all(),'features', $feature->id)) !!}
													{{ $feature->text }}
												</label>
											</div>
										</li>
										@endforeach
										</ul>
									</section>
								</section>
							</div>
						</div>
						<div class="col-xs-6 top-mrg">
							<div class="internal-container features">
								<label>@lang('include.propertyFeatures'):</label>
								<section class="block">
									<section>
										<ul class="submit-features">
										@foreach(App\Feature::propertyFeatures() as $feature)
											<li>
												<div class="checkbox">
													<label>
													
													{!! Form::checkbox("features[]", $feature->id, old('features')) !!}
													{{ $feature->text }}
														{{-- <input name="features[]" value="{{$feature->id}}" type="checkbox">{{$feature->text}} --}}
													</label>
												</div>
											</li>
										@endforeach
										</ul>
									</section>
								</section>
							</div>
						</div>
					</div>
					</div><!-- options-overlay -->
			
			{!! Form::hidden('price', old('price'), ['id'=>'price']) !!}
			
			{!! Form::close() !!}
			
			</header><!-- end header -->
			<ul class="tab-links col-md-4 col-xs-12">
				<li class="col-lg-3 col-lg-offset-2 col-md-4 col-xs-4 no-pad active"><a href="#tab1" class="map2">
					<img src="{{asset('assets/img/map.png')}}" alt=""/>@lang('include.map')</a></li>
				<li class="col-lg-3 col-md-4 col-xs-4 no-pad"><a href="#tab2">
					<img src="{{asset('assets/img/grid.png')}}" alt=""/>@lang('include.grid')</a></li>
				<li class="col-lg-3 col-md-4 col-xs-4 bdr-rgh no-pad"><a href="#tab3"><i class="fa fa-th-list"></i>@lang('include.list')</a></li>
			</ul>
			<!-- tab-links -->
			<div class="tab-content"> 
				@include("include.front.search.listGrid")
				@include("include.front.search.listList")
				@include("include.front.search.listMap")
			</div><!-- tab-content -->
		</div><!-- tabs -->
	</div>



		<div class="custom-galery">
			<input class="no-icheck gal" type="checkbox" id="op">
			<div class="lower"></div>
			<div class="overlay overlay-hugeinc">
					<label for="op"></label>
					<nav>
						<!-- Owl carousel -->
						<div id='op-carousel' class="owl-carousel owl-theme carousel-full-width owl-demo-3">
							<div class="item" style="background-image: url(http://placehold.it/950X800);"></div>
							<div class="item" style="background-image: url(http://placehold.it/800X650);"></div>
						</div>
						<!-- End Owl carousel -->
					</nav>
			</div>
		</div>

</div> 

{!! Form::hidden("map-locations", json_encode($locations), ['id'=>'map-locations']) !!}
{!! Form::hidden("price-min", $minPrice, ['id'=>'price-min']) !!}
{!! Form::hidden("price-max", $maxPrice, ['id'=>'price-max']) !!}

@stop
		  
@section('scripts')

	<script src="https://maps.googleapis.com/maps/api/js?v=3&libraries=places"></script>

	<script type="text/javascript" src="{{asset('assets/js/bootstrap-select.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/jquery.validate.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/jquery.placeholder.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/infobox.js')}}"></script>
	 
	<script type="text/javascript" src="{{asset('assets/js/waypoints.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/tmpl.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/icheck.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/jquery.dependClass-0.1.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/draggable-0.1.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/markerwithlabel_packed.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/jquery.slider.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/jshashtable-2.1_src.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/jquery.numberformatter-1.2.3.js')}}"></script>
 	<script type="text/javascript" src="{{asset('assets/js/custom-map.js')}}"></script> 


	<script type="text/javascript">
		// coordinates for current location
		var _latitude = 40.717857;
		var _longitude = -73.995042;
		var locations = $("#map-locations").val();
		createHomepageGoogleMap(_latitude,_longitude, locations);

		$(document).ready(function(){
			
			$("#search-btn").on('click', function(e){
				e.preventDefault();
				$("#price").val($(".price-input:first").val());
				$("#search-form").submit();
			});
 
			//  Price slider search page 
			if( $(".price-input").length > 0) {
				$(".price-input").each(function() { 
					var vSLider = $(this).slider({
						from: $("#price-min").val(),
						to: $("#price-max").val(), 
						smooth: true, 
						round: 0,       
						dimension: ',00&nbsp;&euro;' 
					}); 
				});
			}

			$("[data-images]").on('click', function(e){		 
				var carousel = $('.owl-demo-3'); 
				
				//these 3 lines kill the owl, and returns the markup to the initial state
				carousel.trigger('destroy.owl.carousel'); 
				carousel.find('.owl-stage-outer').children().unwrap();
				carousel.removeClass("owl-center owl-loaded owl-text-select-on"); 

				var images = $(this).data("images");
				// add the new items 
				var content = "";
				for (var i = 0; i < images.length; i++) { 
					content += "<div class=\"item\" style=\"background-image: url(" + images[i] + ");\"></div>";
				}
				carousel.html(content);

				//reinitialize the carousel (call here your method in which you've set specific carousel properties)
				carousel.owlCarousel({
					items : 1,
					pagination:true,
					nav: true,
					autoHeight:true,
					itemsCustom: [1600, 1],
					smartSpeed: 1000,
					loop:true,
					touchDrag:true,
					mouseDrag:true,
					navText: [
						"<i class='fa fa-chevron-left'></i>",
						"<i class='fa fa-chevron-right'></i>"
					]
				});

			});
		});
	</script>

<!--[if gt IE 8]>
<script type="text/javascript" src="{{asset('assets/js/ie.js')}}"></script>
<![endif]-->
@stop