<!DOCTYPE html>

<html lang="en-US">
<head>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="{{asset('assets/fonts/font-awesome.css')}}" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('assets/css/bootstrap-select.min.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('assets/css/owl.carousel.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('assets/css/selectize.css')}}" type="text/css">

	@yield('styles')
	
	<link rel="stylesheet" href="{{asset('assets/css/style.css')}}" type="text/css">

	<title>RUSTICA MALLORCA INMOBILIARIA Y REFORMAS</title>
</head>

<body class="{{isset($body['class']) ? $body['class'] : 'page-homepage'}}" id="{{isset($body['class']) ? $body['id'] : 'page-top'}}">
	<!-- Preloader 
	<div id="page-preloader">
		<div class="loader-ring"></div>
		<div class="loader-ring2"></div>
	</div>
	 End Preloader -->
	
	<!-- Wrapper -->
	<div class="wrapper">
		<!-- Start Header -->
		<div id="header" class="{{(isset($header) && isset($header['class']))? $header['class'] : 'menu-wht'}}">
			 
				@include('include.front.header') 
		</div>
		<!-- End Header -->

		<!-- Page Content -->
		<div id="{{isset($body['content'])?$body['content']['id']:'page-content_home'}}">
			@yield('content')
		</div>
		<!-- end Page Content -->

		<!-- Start Footer -->
		<div id="footer">
		@include('include.front.footer')
		</div>
		<!-- End Footer -->
	</div>

	<!-- Modal login, register, custom gallery -->
	<div id="login-modal-open"></div>
	<div id="register-modal-open"></div>
	<div class="custom-galery">
		<input type="checkbox" class="gal" id="op">
		<div class="lower"></div>
		<div class="overlay overlay-hugeinc">
			<label for="op"></label>
			<nav>
				<!-- Owl carousel -->
				<div class="owl-carousel owl-theme carousel-full-width owl-demo-3">
					<div class="item" style="background-image: url(http://placehold.it/950X8.000€);"></div>
					<div class="item" style="background-image: url(http://placehold.it/8.000€X650);"></div>
				</div>
				<!-- End Owl carousel -->
			</nav>
		</div>
	</div>

	<!-- End Modal login, register, custom gallery -->

	<script type="text/javascript" src="{{asset('assets/js/jquery-2.1.4.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/jquery-migrate-1.2.1.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/jquery.placeholder.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/retina-1.1.0.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/masonry.pkgd.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/selectize.min.js')}}"></script>	
	<!--[if gt IE 8]>
	<script type="text/javascript" src="assets/js/ie.js"></script>
	<![endif]-->
	@yield('scripts')

	<script type="text/javascript" src="{{asset('assets/js/custom.js')}}"></script>
</body>
</html>