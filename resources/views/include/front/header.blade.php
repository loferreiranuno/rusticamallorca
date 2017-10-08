 
	<div class="navigation">
		<header class="navbar" id="top">  
			<div class="container">
				<div class="navbar-brand nav">
					<a class="navbar-brand nav logo" href="{{route('front.home')}}" title="" rel="home">
						<object class="master-logo" type="image/svg+xml"></object>
					</a>
					<a class="navbar-brand nav logo retina" href="{{route('front.home')}}" title="" rel="home">
						<object class="master-logo" type="image/svg+xml"></object> 
					</a>
				</div>
				<nav class="secondary main-menu">
					<a href="#" data-toggle="dropdown" class="pull-right drop-left">Más
						<div class="gamb-button"> 
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</div>
					</a>				
					<ul class="nav navbar-nav dropdown-menu pull-right slide-left">
						<li class="active has-child"><a href="{{route('front.home')}}">Homepage</a>
							
						</li>
						{{--
						<li class="has-child"><a href="#">Agents&nbsp;&amp;&nbsp;agencies</a>
							<ul class="child-navigation">
								 <li><a href="agency_profile.html">Agency Profile</a></li>
								<li><a href="agent_profile.html">Agents Profile</a></li> 
							</ul>
						</li>--}}
						<li class="has-child"><a href="{{route('front.search')}}">All Properties</a>
							{{-- <ul class="child-navigation">
								<li><a href="our_property.html">For Rent</a></li>
								<li><a href="our_property_list_type.html">For Sell</a></li>
								<li><a href="add_property.html">Add Property</a></li>
								<li><a href="property_page.html">Property Page</a></li>
							</ul> --}}
						</li>           
						<li><a href="{{route('front.aboutus')}}">About Us</a></li>
						<li><a href="{{route('front.contactus')}}">Contact us</a></li>
						<li>
							<a href="#" data-toggle="dropdown" class="pull-right drop-close">Close
								<span class="cross"></span>
							</a>
						</li>
					</ul>				
				</nav><!-- /.navbar collapse-->
				<nav class="primary start main-menu">
					<ul class="nav navbar-nav pull-right">
					    <li><a href="{{route('front.search')}}">Propiedades</a></li> 
						<li>
							<select class="selection" id="menu-language" menu-language>
								@foreach(App\Language::all() as $language)
									<option value="{{$language->code}}">{{$language->code}}</option> 
								@endforeach
							</select>
						</li>							
					</ul>
				</nav>
			</div>
			<div class="site-header">
				<a href="#" data-toggle="dropdown" class="pull-right drop-left">Menu
					<div class="gamb-button"> 
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</div>
				</a>
				<div class="navbar-brand nav">
					<a class="navbar-brand nav logo" href="{{route('front.home')}}" title="" rel="home">
						<object class="master-logo" type="image/svg+xml"></object> 
					</a>
					<a class="navbar-brand nav logo retina" href="{{route('front.home')}}" title="" rel="home">
						<object class="master-logo" type="image/svg+xml"></object> 
					</a>
				</div>
				<div class="mob-menu drop-close hidden">
					<a href="#" data-toggle="dropdown" class="pull-right drop-close hidden black-cross">Close
						<span class="cross"></span>
					</a>
					<nav class="secondary">					
						<ul class="nav navbar-nav">
							{{-- <li><a href="#" data-toggle="modal" data-target="#modal-login">Log in<i class="fa fa-arrow-right"></i></a></li>	
							<li><a href="#" data-toggle="modal" data-target="#modal-register">Registration</a></li> --}}
							<li class="active has-child"><a href="{{route('front.home')}}">Homepage</a>
								{{-- <ul class="child-navigation">
									<li><a href="index_v_1.html">Index V1</a></li>
									<li><a href="index_v_2.html">Index V2</a></li>
									<li><a href="index_v_3.html">Index V3</a></li>
								</ul> --}}
							</li>
							{{-- <li class="has-child"><a href="#">Agents&nbsp;&amp;&nbsp;agencies</a>
								<ul class="child-navigation">
									<li><a href="agency_profile.html">Agency Profile</a></li>
									<li><a href="agent_profile.html">Agents Profile</a></li>
								</ul>
							</li> --}}
							<li class="has-child"><a href="{{route('front.search')}}">All Properties</a> 
							</li>                       
							<li><a href="{{route('front.aboutus')}}">About Us</a></li>
							<li><a href="{{route('front.contactus')}}">Contact us</a></li>
							<li>								
								<select class="selection" id="menu-language" menu-language>
									@foreach(App\Language::all() as $language)
										<option value="{{$language->code}}">{{$language->code}}</option> 
									@endforeach
								</select>
							</li>
						</ul>				
					</nav><!-- /.navbar collapse-->
				</div>
			</div>
		</header><!-- /.navbar -->
	</div>
 
