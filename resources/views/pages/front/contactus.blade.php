

@extends('layouts.front.default',["header"=>['class'=>''], "body"=>['class'=>'page-search', 'id'=>'page-top', 'content'=>['id'=>'page-content-search']]])

@section('content')
		<div id="map2" class="map"></div>
			<div class="container">
				<div class="row">
					<div class="contact-form">

					@if(!isset($product))
						<h2>We're here to help you.</h2>
						<h6>Have a question? Write Us</h6>						
					@else
						<h2>Ask about "{{$product->title}}"</h2> 
						<hr/>
					@endif
						<!--<form id="form-submit" class="form-submit" action="thank_you_page.html">-->
						
						{!! Form::open(['route'=> 'contactus.store']) !!}					
						{!! Form::hidden('product',$product->id) !!}
							<div class="col-md-6">
								<div class="input-group">									
									{!! Form::label("name", "Your Name:") !!}									
									{!! Form::text("name", old('name'), ['class'=>'form-control', 'placeholder'=>'Enter your name']) !!}
								</div>
							</div>
							<div class="col-md-6">
								<div class="input-group">
									{!! Form::label("email", "Your Email:") !!}
									{!! Form::email("email", old("email"), ['class'=>'form-control', 'placeholder'=>'Enter your Email']) !!}
								</div>
							</div>
							<div class="col-md-12">
								<div class="input-group">
									{!! Form::label("subject", "Message subject:") !!}									
									{!! Form::text("subject", old("subject"), ['class'=>'form-control', 'placeholder'=>'Enter the subject']) !!}
								</div>
							</div>
							<div class="col-md-12">
								<div class="input-group">									
									{!! Form::label('text', 'Your message') !!}									
									{!! Form::textarea('text', old('text'), ['rows'=> 8, 'cols'=>45, 'class'=>'form-control']) !!}
								</div>
							</div>
							<div class="submit">
								<span class="ffs-bs">									
									{!! Form::submit('Send message', ['class'=>'btn btn-large btn-primary']) !!}
								</span>
							</div>
						</form>
					</div>
				</div>
			</div>
			<br/>
<div class="hidden">
	<div id="content-string">
		<div id="mapinfo">
		<h4 class="firstHeading">{{config('app.companyName')}}</h4>
		<h6>{{config('app.companyAddress')}}</h6>
		<div><i class="fa fa-phone"></i><a href="tel:{{config('app.companyPhone')}}">{{config('app.companyPhone')}}</a></div>
		<div><i class="fa fa-mobile"></i><a href="tel:{{config('app.companyMobile')}}">{{config('app.companyMobile')}}</a></div>
		<p id="at">@</p>
			<div class="contactblock">
				<a href="mailto:{{config('app.companyEmail')}}">{{config('app.companyEmail')}}</a>
			</div>
		</div>
	</div>
</div>

{!! Form::hidden('lat', config('app.companyGeo')['lat'], ['id'=>'lat'] ) !!}

{!! Form::hidden('lon', config('app.companyGeo')['lon'], ['id'=> 'lon'] ) !!}

@stop
@section('scripts')

	<script src="https://maps.googleapis.com/maps/api/js?v=3&libraries=places"></script>
	<script type="text/javascript" src="{{ asset('assets/js/jquery-2.1.4.min.js')}}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/jquery-migrate-1.2.1.min.js')}}"></script>
	<script type="text/javascript" src="{{ asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/owl.carousel.min.js')}}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/retina-1.1.0.min.js')}}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/jquery.placeholder.js')}}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/jquery.validate.min.js')}}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/markerwithlabel_packed.js')}}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/masonry.pkgd.min.js')}}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/selectize.min.js')}}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/custom-map.js')}}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/custom.js')}}"></script>

	<script>
	//Google map for contact us page
	$(document).ready(function() {
		function initialize() {
			var latlng = {lat: parseFloat($("#lat").val()), lng: parseFloat( $("#lon").val())};
			var mapOptions = {
				center: latlng,
				zoom: 14
			};
			var map = new google.maps.Map(document.getElementById('map2'),
				mapOptions);
			var marker = new MarkerWithLabel({
				position: latlng,
				map: map,
				labelContent: '<div class="marker-loaded"><div class="map-marker"><img src="assets/img/f.svg" alt="" /></div></div>',
				labelClass: "marker-style"
			});
			var contentString = $("#content-string").html();

			var infowindow = new google.maps.InfoWindow({
				content: contentString
			});
			marker.addListener('click', function() {
				infowindow.open(map, marker);
			});
		}
		google.maps.event.addDomListener(window, 'load', initialize);  
	});
	</script>
@stop