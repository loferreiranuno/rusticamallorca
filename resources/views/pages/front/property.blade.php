@extends('layouts.front.default',["header"=>['class'=>''], "body"=>['class'=>'page-property', 'id'=>'page-top', 'content'=>['id'=>'page-property-content']]])


@section('content')
	<!-- Page Content --> 
			<div class="wide_container_3 carousel-full-width">
				<div class="tabs">
					<div class="tab-content">
						<div id="tab1" class="tab active">
							<!-- Owl carousel -->
							<div id="owl-demo-2" class="owl-carousel owl-theme">
							@if($product->images != null)
								@foreach($product->images as $image)
									<div class="item">
										<div class="image" style="background: url({{RMHelper::getImagePath($product, $image, true)}}) center"></div>
									</div> 
								@endforeach
							@endif
							</div>
							<!-- End Owl carousel -->
						</div>
						<div id="tab22" class="tab">
							<!-- Map -->
							<div id="map4"></div>
							<!-- end Map -->
						</div>
						<div id="tab3" class="tab">
						</div>
						{{-- <div id="tab4" class="tab">
							360º
						</div> --}}
					</div>
					<ul class="tab-links col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3">
						<li class="active col-xs-3"><a href="#tab1"><img src="{{asset('assets/img/camera-black.png')}}" alt=""/>Photo</a></li>
						 <li class="col-xs-3"><a href="#tab22" class="map4"><img src="{{asset('assets/img/map.png')}}" alt=""/>Map</a></li>
						<li class="col-xs-3"><a href="#tab3" class="street-view"><img class="street-view-image" src="{{asset('assets/img/street_view.png')}}" alt=""/>Street</a></li>
					</ul>
				</div>
			</div>
			<div class="wide-2">
				<div class="container">
					<ol class="breadcrumb">
						<li><a href="{{route('front.home')}}">RusticaMallorca</a></li>
						<li><a href="{{route('front.search')}}">Property</a></li>
						<li class="active">{{$product->title}}</li>
					</ol>
				</div>
				<div class="container">
					<div class="row">
						<aside class="pr-summary col-md-4 col-xs-12">
							<form action="agent_profile.html">
								@if($product->rentPrice != 0)
								<div class="col-lg-5 col-md-6 col-sm-3 col-xs-6 hl-bl">
									<h2>{{$product->rentPrice}}&euro;</h2>
									<h5 class="team-color">FOR RENT</h5>
								</div>
								@endif
								@if($product->salePrice != 0)
								<div class="col-lg-5 col-md-6 col-sm-3 col-xs-6 hl-bl">
									<h2>{{$product->salePrice}}&euro;</h2>
									<h5 class="team-color">FOR SALE</h5>
								</div>
								@endif
								<div class="row">
									<div class="col-md-12 col-sm-6 col-xs-12">
										<div class="row">
											<div class="col-lg-5 col-md-6 col-xs-6 cat-img">
												<img src="{{asset('assets/img/bedroom.png')}}" alt="">
												<p>{{$product->rooms}} Bedrooms</p>
											</div>
											<div class="col-lg-7 col-md-6 col-xs-6 cat-img cat-img">
												<img src="{{asset('assets/img/bathroom.png')}}" alt="">
												<p >{{$product->bathrooms}} Bathroom</p>
											</div>
										</div>
										<hr>
										<div class="row">
											<div class="col-xs-12">
												<div class="row">
													<div class="col-lg-5 col-md-6 col-xs-6 cat-img">
														<img src="{{asset('assets/img/square.png')}}" alt="">
														<p class="info_line">{{$product->area}} m<span class="rank">2</span></p>
													</div>
													@if($product->garage_area != null)
													<div class="col-lg-7 col-md-6 col-xs-6 cat-img">
														<img src="{{asset('assets/img/garage.png')}}" alt="">
														<p class="info_line">Garage</p>
													</div>
													@endif
												</div>
												<div class="row">
													<div class="col-xs-12">
														<div class="col-lg-5 col-md-6 col-xs-6 line"></div>
														<div class="col-lg-5 col-md-6 col-xs-6 line"></div>
													</div>
												</div>
											</div>
										</div>
										<hr class="full-width">
									</div>
								</div>
								<div class="picker-block col-md-12 col-sm-6 col-xs-12">
									
									@if($product->seller != null)
									<div class="row">
										<div class=" col-xs-12">
											<div class="circle">
												<img src="{{RMHelper::getUserPicture($product->seller)}}" alt="">
											</div>
											<div class="team-info">
												<h3>{{$product->seller->name}}</h3>
												<p class="team-color">{{$product->seller->email}}</p> 
											</div>
										</div>
									</div>
									@endif
								</div>
								<div class="row">
									<div class="col-md-12 col-sm-6 col-xs-12">
										<span class="ffs-bs">
											<button type="submit" class="btn btn-large btn-primary">contact agent</button>
										</span>
										<div class="col-xs-12 fav-block">
											<div class="bookmark col-xs-6" data-bookmark-state="empty">
												<span class="title-add">Add to bookmark</span>
												<p class="col-xs-9 fav-text">Add to Favorit</p>
											</div>
											<div class="compare col-xs-6" data-compare-state="empty">
												<span class="plus-add">Add to compare</span>
												<p class="fav-text">Compare</p>
											</div>
										</div>
									</div>
								</div>
							</form>
						</aside>
						<div class="pr-info col-md-8 col-xs-12">
							<h2>{{$product->title}}</h2>
							<div class="map-marker"></div>
							<h5 class="team-color">{{RMHelper::getProductAddress($product)}}<i class="fa fa-eye"></i>1092</h5>
							<p>{{RMHelper::getProductDescription($product, App::getLocale())}}</p> 
						</div>
						<div class="pr-info col-md-8 col-xs-12">
							<h3>Property Features:</h3>
							<section class="block">
								<ul class="submit-features">  
								@foreach($features as $feature)
									@if($feature['active'])
										<li class="col-md-4 col-xs-4"><div >{{$feature['name']}}</div></li>
									@else
										<li class="col-md-4 col-xs-4 nonexistent">
											<div class="team-color">{{$feature['name']}}</div>
										</li>
									@endif	
								@endforeach								 
								</ul>
							</section>
						</div>
						<div class="pr-info col-md-8 col-xs-12">
							<h3>Floor plans & Additional photo:</h3>
							<div class="row cust-row">
							@foreach($product->images->take(3) as $image)
								<div class="col-xs-3 cust-pad">
									<div class="pr-img" style="background: url({{RMHelper::getImagePath($product, $image, false)}}) center;"></div>
								</div>
							@endforeach
							@if(count($product->images) > 3)
								<div class="col-xs-3 cust-pad">
									<div class="pr-img" style="background: url({{RMHelper::getImagePath($product, $product->images[3], false)}}) center;">
										<span class="filter"></span>
										<label class="img-label" for="op">+{{count($product->images) - 3}} More</label>
									</div>
								</div>
							@endif 
							</div>

							
							<div class="row">
								<div class="col-xs-12">
									@if($product->video_url != null)
										<h3>Video Presentation:</h3>
										<p><iframe src="{{$product->video_url}}"></iframe></p>										
									@endif
									<hr>
									<div class="row">
										<section class="social-block col-sm-6 col-xs-12">
											<ul class="social">
												<li class="social-text">SHARE:</li>
												<li><a class="facebook" href="https://www.facebook.com" target="blank"><i class="fa fa-facebook"></i></a></li>
												<li><a class="twitter" href="https://twitter.com" target="blank"><i class="fa fa-twitter"></i></a></li>
												<li><a class="google" href="https://www.google.com" target="blank"><i class="fa fa-google-plus"></i></a></li>
												<li><a class="pinterest" href="https://www.pinterest.com" target="blank"><i class="fa fa-pinterest"></i></a></li>
											</ul>
										</section>
										<p class="error-block col-sm-6 col-xs-12 pull-right"><a href="#" data-toggle="modal" data-target="#modal-error"><i class="fa fa-exclamation-triangle"></i>Report About Error</a></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="wide_container_3">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-xs-12">
							{{-- <header><h4>3 Feedback</h4></header>
							<div class="hl-bl col-xs-12">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<p class="team-color"><span class="bold_text">5.0</span>/5.0</p>
							</div>
							
							<ul class="comments">
								@if(isset($comments) && count($comments) > 0)
									@foreach($comments->take(3) as $comment)
									<li class="comment">
										<div class="comment-wrapper">
											<div class="name pull-left">Michael Salmon</div>
											<span class="date-block team-color">4 days ago</span>
											<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled
											</p>
										</div>
									</li> 
									@endforeach
								@endif
							</ul>
							
							@if(count($comments) > 3)
								<div class="comments-more">
									<a href="#">Show More</a>
								</div>
							@endif 
							
							<span class="ffs-bs transparent">
								<button type="submit" id="show-reply-form" class="btn btn-default btn-large">
									<i class="fa fa-star-o"></i><span class="btn-text">leave review</span>
								</button>
							</span>

							<section id="leave-reply">
								<header><h4>Leave Review</h4></header>
								<div class="clearfix">
									<aside>
										<div class="rating rating-user">
											<div class="inner"></div>
										</div>
									</aside>
								</div>
								<div class="row">
									<form id="form-single-property-reply" method="post">
										<div class="col-sm-6 col-xs-12">
											<input type="text" class="form-control" id="form-blog-reply-name" name="form-blog-reply-name" placeholder="Your Name" required>
										</div><!-- /.form-group -->
										<div class="col-sm-6 col-xs-12">
											<input type="email" class="form-control" id="form-blog-reply-email" name="form-blog-reply-email" placeholder="Your Email" required>
										</div><!-- /.form-group -->
										<div class="col-xs-12">
											<textarea class="form-control" id="form-blog-reply-message" rows="5" name="form-blog-reply-message" placeholder="Write Your Text..."></textarea>
										</div><!-- /.form-group -->
										<div class="col-xs-12 btm-indent">
											<button type="submit" class="btn pull-right btn-small btn-primary" id="form-blog-reply-submit">Send</button>
										</div><!-- /.form-group -->
										<div id="form-rating-status"></div>
									</form><!-- /#form-contact -->
								</div>
							</section> --}}
						</div>
						
						@if(isset($similarProducts) && count($similarProducts) > 0)

						<div class="col-md-4 col-xs-12 some-prp">
							<h4>Here is some Similar property:</h4>
								<p class="team-color">in {{$product->city_name}}</p>
							@foreach($similarProducts as $similar)
								<hr>
								<div class="property-block-small">
									<a href="{{route('property.show',['id'=> $similar->id])}}">
										<div class="property-image-small" style="background: url({{RMHelper::getProductImage($similar, false)}}) center;"></div>
										<h3>{{$similar->title}}</h3>
										<p class="team-color">{{RMHelper::getProductAddress($similar)}}</p>
										@if($similar->salePrice != 0)
											<h4>{{$similar->salePrice}}&euro;</h4>
										@endif
										@if($similar->rentPrice != 0)
											<h4>{{$similar->rentPrice}}&euro;</h4>
										@endif
									</a>
								</div>
							@endforeach
						</div>

						@endif
					</div>
				</div>
			</div> 
		<!-- end Page Content -->
		<div class="custom-galery">
		<input type="checkbox" class="gal" id="op">
		<div class="lower"></div>
		<div class="overlay overlay-hugeinc">
			<label for="op"></label>
			<nav>
				<!-- Owl carousel -->
				<div class="owl-carousel owl-theme carousel-full-width owl-demo-3">
				@foreach($product->images as $image)
					<div class="item" style="background-image: url({{RMHelper::getImagePath($product, $image, true)}});"></div>
				@endforeach
				</div>
				<!-- End Owl carousel -->
			</nav>
		</div>
		</div>
@stop


@section('styles')
	{{-- <link rel="stylesheet" href="{{asset('assets/css/jquery.slider.min.css')}}" type="text/css"> --}}
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

	<script type="text/javascript" src="{{asset('assets/js/retina-1.1.0.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/masonry.pkgd.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/jquery.raty.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/waypoints.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/classie.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/selectize.min.js')}}"></script>


	<script type="text/javascript" src="{{asset('assets/js/custom-map.js')}}"></script> 

	<script>
		// coordinates for current location
		var _latitude = {{$product->latitude}};
		var _longitude =  {{$product->longitude}};
		var locations = {!!json_encode($locations)!!}; 


//Google map for property page
	function initialize(lat, lon) {

			var latlng = {lat: lat, lng:  lon};
			var mapOptions = {
				center: latlng,
				zoom: 15
			};
			var map = new google.maps.Map(document.getElementById('map4'),
				mapOptions);
			var marker = new MarkerWithLabel({
				position: latlng,
				map: map,
				labelContent: '<div class="marker-loaded"><div class="map-marker"><img src="{{asset("assets/img/f.svg")}}" alt="" /></div></div>',
				labelClass: "marker-style"
			});

			var contentString =   '<div id="mapinfo">'+
			'<h4 class="firstHeading">St Floor Wingate House</h4>'+
			'<h6>London, 93-107 Shaftesbury Ave, W1D 5DY</h6>';
			var infowindow = new google.maps.InfoWindow({
				content: contentString
			});
			marker.addListener('click', function() {
				infowindow.open(map, marker);
			});
			//resize for opeening and to get center of map
			$('.map4').bind('click', function(){
				google.maps.event.trigger(map4, 'resize');
				map.panTo(marker.getPosition());
			});

			// Use this code below only if you are using google street view
			var fenway = {lat: lat, lng: lon};
			var panorama = new google.maps.StreetViewPanorama(document.getElementById('tab3'), {
					position: fenway,
					pov: {
						heading: 34,
						pitch: 10
					}
				});
			map.setStreetView(panorama);
			$('.street-view').bind('click', function(e){
				setTimeout(function() {
					google.maps.event.trigger(panorama, 'resize');
				}, 400 ); 
			});

	}
	google.maps.event.addDomListener(window, 'load', function(){
		initialize(_latitude, _longitude);
	}); 


	</script>

<!--[if gt IE 8]>
<script type="text/javascript" src="{{asset('assets/js/ie.js')}}"></script>
<![endif]-->
@stop