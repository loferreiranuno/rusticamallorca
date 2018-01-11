@extends('layouts.front.default',[
	"header"=>[
		'class'=>'menu-wht',
		'hide'=>true],
	"body"=>[
		'class'=>'page-homepage', 
		'id'=>'page-top', 
		'content'=>[
			'id'=>'page-content_home'
			]
		]
	])

@section('content')
<div class="home_1">
				<div class="header_title">
					<h1>@lang('front/home.searchTitle', ['brandName'=> __('brand.name')])</h1>
					<h4>@lang('front/home.searchSubTitle')</h4>
				</div>
				
				@include('include.front.home.searchBox')
				
			</div>
			<div class="container">
				<div class="explore"> 
					<h2>@lang("front/home.explorePropertiesInArea")</h2>
					<!--<h5>
						<i class="fa fa-map-marker"></i>{{$location['name']}} 
						<span class="team-color">@lang("front/home.changeLocation")</span></h5>-->
				</div>
				<div class="row">
					<div class="col-md-4 col-sm-6">
						<a href="{{$categories['apartments']['url']}}" class="exp-img" style="background:url(http://www.novamallorca.com/property-image/13.000€_BHIAA/BHIAAP4897_87313.jpg) center;background-size: cover;">
							<span class="filter"></span>
							<div class="img-info">
								<h3>@lang('front/home.apartments')</h3>
								<h6>@lang('front/home.nProperties', ['total'=> $categories['apartments']['total']])</h6>
								<span class="ffs-bs btn btn-small btn-primary">@lang('front/home.seeMore')</span>
							</div>
						</a> 
					</div>

					<div class="col-md-4 col-sm-6">
						<a href="{{$categories['rusticHouses']['url']}}" class="exp-img" style="background:url(http://www.novamallorca.com/property-image/13.000€_BHIAA/BHIAAP4897_87313.jpg) center;background-size: cover;">
							<span class="filter"></span>
							<div class="img-info">
								<h3>@lang('front/home.rusticHouses')</h3>
								<h6>@lang('front/home.nProperties', ['total'=> $categories['rusticHouses']['total']])</h6>
								<span class="ffs-bs btn btn-small btn-primary">@lang('front/home.seeMore')</span>
							</div>
						</a>
					</div>
					<div class="col-md-4 col-sm-6">
						<a href="{{$categories['floors']['url']}}" class="exp-img" style="background:url(http://www.novamallorca.com/property-image/13.000€_BHIAA/BHIAAP4897_87313.jpg) center;background-size: cover;">
							<span class="filter"></span>
							<div class="img-info">
								<h3>@lang('front/home.floors')</h3>
								<h6>@lang('front/home.nProperties', ['total'=> $categories['floors']['total']])</h6>
								<span class="ffs-bs btn btn-small btn-primary">@lang('front/home.seeMore')</span>
							</div>
						</a>
					</div>
					<div class="col-md-4 col-sm-6">
						<a href="{{$categories['luxuryHouses']['url']}}" class="exp-img" style="background:url(http://www.novamallorca.com/property-image/13.000€_BHIAA/BHIAAP4897_87313.jpg) center;background-size: cover;">
							<span class="filter"></span>
							<div class="img-info">
								<h3>@lang('front/home.luxuryHouses')</h3>
								<h6>@lang('front/home.nProperties', ['total'=> $categories['luxuryHouses']['total']])</h6>
								<span class="ffs-bs btn btn-small btn-primary">@lang('front/home.seeMore')</span>
							</div>
						</a>
					</div>
					<div class="col-md-8">
						<a href="{{$categories['housesWithPool']['url']}}" class="exp-img" style="background:url(http://www.novamallorca.com/property-image/13.000€_BHIAA/BHIAAP4897_87313.jpg) center;background-size: cover;">
							<span class="filter"></span>
							<div class="img-info">
								<h3>@lang('front/home.housesWithPool')</h3>
								<h6>@lang('front/home.nProperties', ['total'=> $categories['housesWithPool']['total']])</h6>
								<span class="ffs-bs btn btn-small btn-primary">@lang('front/home.seeMore')</span>
							</div>
						</a>
					</div>
				</div>
			</div>

			<!-- end container -->
			<div class="wide-1">
				<div class="container rel-img">
					<div class="col-md-8 col-sm-8 ab-us">
						<h2>@lang("front/home.aboutUsTitle",['brandName'=> __('brand.name')])</h2>
						<div class="row">
							<div class="col-md-6 col-sm-6 ex-block">
								<h4><i class="fa fa-circle-o"></i>@lang('front/home.wideRangeOfPropertiesTitle')</h4>
								<p>@lang('front/home.wideRangeOfPropertiesDescription')</p>
							</div>
							<div class="col-md-6 col-sm-6 ex-block">
								<h4><i class="fa fa-circle-o"></i>@lang('brand.name')</h4>
								<p>@lang('front/home.aboutUsDescription')</p>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-6 ex-block">
								<h4><i class="fa fa-circle-o"></i>@lang('front/home.agentsForYourServiceTitle')</h4>
								<p>@lang('front/home.agentsForYourServiceDescription')</p>
							</div>
							{{-- <div class="col-md-6 col-sm-6 ex-block">
								<h4>&nbsp;</h4>
								<p></p>
							</div> --}}
						</div>
						<span class="ffs-bs"><a href="{{route('front.search')}}" class="btn btn-large">@lang('front/home.exploreProperties')</a></span>
					</div>
				</div>
				<div class="ab-us-img col-md-4 col-sm-4"></div>
			</div>
			
			<!-- end wide-1 -->
			<div class="wide-2">
				<div class="container">
					<div class="explore">
						<h2>@lang('front/home.ourExclusiveHousesTitle')</h2>
						<h5 class="team-color">@lang('front/home.ourExclusiveHousesDescription')</h5>
					</div>
					<div class="row">
						
						@if(isset($products))
							@foreach($products as $product)
							<div class="col-md-3 col-sm-3 col-xs-6 prop">
								@include("include.front.home.itemProperty",['product'=>$product])
							</div> 
							@endforeach
						@endif
					</div>
				</div>
				<span class="ffs-bs bottom">
					<a href="{{route('front.search')}}" class="btn btn-default btn-large">@lang('front/home.exploreProperties')</a></span>
			</div>
			<!-- end wide-2 -->
			<div class="wide-3 carousel-full-width">
				<div class="explore">
					<h2>@lang('front/home.meetTheTeamTitle', ['brandName'=> __('brand.name')])</h2>
					<h5 class="team-color">@lang('front/home.meetTheTeamDescription')</h5>
				</div>
				<div id="owl-demo" class="owl-carousel owl-theme ">
				@if(isset($users))
					@foreach($users as $user)
						@include("include.front.home.itemUser", ['user'=>$user])
					@endforeach	
				@endif				
				</div>
				<span class="ffs-bs">
					<a href="{{route('front.aboutus')}}" class="btn btn-default btn-large">
						@lang('front/home.moreAboutUsTitle', ['brandName'=> __('brand.name')])
					</a>
					</span>
			</div>
			<!-- end wide-3 carousel-full-width -->
			<div class="container">
				<section class="block testimonials">
					<header class="center">
						<h2 class="no-border">@lang('front/home.commentsTitle', ['brandName'=> __('brand.name')])</h2>
					</header>
					<div class="owl-carousel testimonials-carousel">
						@if(isset($comments))
							@foreach($comments as $comment)
								@include("include.front.home.itemComment")
							@endforeach
						@endif
					</div>
				</section>
			</div> 
			<!-- end container -->
@stop