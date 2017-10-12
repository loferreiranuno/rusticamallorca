@extends('layouts.front.default',["header"=>['class'=>''], "body"=>['class'=>'page-search', 'id'=>'page-top', 'content'=>['id'=>'page-content-search']]])

@section('content')
<div class="container">
	<div class="wide_container_2">
		<div class="tabs">
			<header class="col-md-8 col-xs-12 no-pad">
				<div class="location-map col-sm-4 col-xs-4">
					<div class="input-group">
						<input type="text" class="form-control" id="address-map" name="address" placeholder="Manhattan, New York">
						<i class="fa fa-search"></i>
					</div>
				</div>
				<div class="select-block col-sm-2 col-xs-2">
					<select class="selection">
						<option>Beds</option>
						<option>1</option>
						<option>2</option>
						<option>3</option>
					</select>
				</div>
				<div class="select-block col-sm-2 col-xs-2 ">
					<select class="selection">
						<option>Type</option>
						<option>For Sale</option>
						<option>For Rent</option>
					</select>
				</div>
				<div class="select-block col-md-3 col-xs-4 last">
					<a class="options-button" id="toggle-link">More Filters</a>
				</div>
				<div class="options-overlay col-md-offset-4 col-sm-offset-5 col-sm-7" id="hidden_content" style="display: none;">
					<div class="row">
						<div class="col-xs-6 top-mrg">
							<div class="internal-container features">
								<div class="form-group">
									<label>Minimum Square Footage:</label>
									<input type="text" class="form-control" placeholder="Enter an Amount">
								</div>
								<label>Building Features:</label>
								<section class="block">
									<section>
										<ul class="submit-features">
										@foreach(App\Feature::buildingFeatures() as $feature)
										<li>
											<div class="checkbox">
												<label>
												<input type="checkbox">{{$feature->name}}
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
								<label>Property Features:</label>
								<section class="block">
									<section>
										<ul class="submit-features">
										@foreach(App\Feature::propertyFeatures() as $feature)
											<li>
												<div class="checkbox">
													<label>
													<input type="checkbox">{{$feature->name}}
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
			</header><!-- end header -->
			<ul class="tab-links col-md-4 col-xs-12">
				<li class="col-lg-3 col-lg-offset-2 col-md-4 col-xs-4 no-pad active"><a href="#tab1" class="map2"><img src="assets/img/map.png" alt=""/>Map</a></li>
				<li class="col-lg-3 col-md-4 col-xs-4 no-pad"><a href="#tab2"><img src="{{asset('assets/img/grid.png')}}" alt=""/>Grig</a></li>
				<li class="col-lg-3 col-md-4 col-xs-4 bdr-rgh no-pad"><a href="#tab3"><i class="fa fa-th-list"></i>List</a></li>
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
						<div class="owl-carousel owl-theme carousel-full-width owl-demo-3">
							<div class="item" style="background-image: url(http://placehold.it/950X800);"></div>
							<div class="item" style="background-image: url(http://placehold.it/800X650);"></div>
						</div>
						<!-- End Owl carousel -->
					</nav>
			</div>
		</div>

</div> 

@stop
		 

@section('styles')
	<link rel="stylesheet" href="{{asset('assets/css/jquery.slider.min.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('assets/css/owl.carousel.css')}}" type="text/css" />
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

	<script>
		// coordinates for current location
		var _latitude = 40.717857;
		var _longitude = -73.995042;
		var locations = {!!json_encode($locations)!!};
		createHomepageGoogleMap(_latitude,_longitude, locations);

		
	</script>

<!--[if gt IE 8]>
<script type="text/javascript" src="{{asset('assets/js/ie.js')}}"></script>
<![endif]-->
@stop