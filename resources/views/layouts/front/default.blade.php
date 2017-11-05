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
	<link rel="stylesheet" href="{{asset('assets/css/jquery.slider.min.css')}}" type="text/css" /> 

	@yield('styles')
	
	<link rel="stylesheet" href="{{asset('assets/css/style.css')}}" type="text/css">

	<title>RUSTICA MALLORCA INMOBILIARIA Y REFORMAS</title>
</head>

<body class="{{isset($body['class']) ? $body['class'] : 'page-homepage'}}" id="{{isset($body['class']) ? $body['id'] : 'page-top'}}">
	<!-- Preloader  -->
	<div id="page-preloader">
		<div class="loader-ring"></div>
		<div class="loader-ring2"></div>
	</div>
	<!-- End Preloader -->
	
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

	<!-- End Modal login, register, custom gallery -->

	<script type="text/javascript" src="{{asset('assets/js/jquery-2.1.4.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/jquery-migrate-1.2.1.min.js')}}"></script>
	<script type="text/javascript"  src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script type="text/javascript" src="{{asset('assets/js/jquery.placeholder.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/retina-1.1.0.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/masonry.pkgd.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/selectize.min.js')}}"></script>	
	<!--[if gt IE 8]>
	<script type="text/javascript" src="{{asset('assets/js/ie.js')}}"></script>
	<![endif]-->
	@yield('scripts')

	<script type="text/javascript" src="{{asset('assets/js/custom.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/rustica.js')}}"></script>	
</body>
</html>