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
				<a href="#" data-toggle="dropdown" class="pull-right drop-left">@lang('front/home.more')
					<div class="gamb-button"> 
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</div>
				</a>				
				<ul class="nav navbar-nav dropdown-menu pull-right slide-left">
					<li class="active has-child">
						<a href="{{route('front.home')}}">@lang('front/home.home')</a>							
					</li> 
					<li class="has-child"><a href="{{route('front.search')}}">@lang('front/home.allProperties')</a>
						<ul class="child-navigation">
							<li><a href="{{route('front.search',['type'=>'sale'])}}">@lang('front/home.sale')</a></li>
							<li><a href="{{route('front.search',['type'=>'rent'])}}">@lang('front/home.rent')</a></li> 
						</ul> 
					</li>           
					<li><a href="{{route('front.aboutus')}}">@lang('front/home.aboutUs')</a></li>
					<li><a href="{{route('contactus.index')}}">@lang('front/home.contactUs')</a></li>
					<li>
						<a href="#" data-toggle="dropdown" class="pull-right drop-close">@lang('front/home.close')
							<span class="cross"></span>
						</a>
					</li>
				</ul>				
			</nav><!-- /.navbar collapse-->
			<nav class="primary start main-menu">
				<ul class="nav navbar-nav pull-right">
					<li><a href="{{route('front.search')}}">@lang('front/home.properties')</a></li> 
					<li>
						<select class="selection" id="menu-language" menu-language data-url="{{ route('front.api.setLanguage') }}">
							@foreach(App\Language::all() as $language)
								<option value="{{$language->code}}" {{ $language->code == App::getLocale() ? "selected" : "" }}>{{$language->code}}</option> 
							@endforeach
						</select>
					</li>							
				</ul>
			</nav>
		</div>
		<div class="site-header">
			<a href="#" data-toggle="dropdown" class="pull-right drop-left">@lang('front/home.menu')
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
				<a href="#" data-toggle="dropdown" class="pull-right drop-close hidden black-cross">@lang('front/home.cerrar')
					<span class="cross"></span>
				</a>
				<nav class="secondary">					
					<ul class="nav navbar-nav">
					
						<li class="active has-child">
							<a href="{{route('front.home')}}">@lang('front/home.home')</a>
							<ul class="child-navigation">
								<li><a href="{{route('front.search',['type'=>'sale'])}}">@lang('front/home.sale')</a></li>
								<li><a href="{{route('front.search',['type'=>'rent'])}}">@lang('front/home.rent')</a></li> 
							</ul> 
						</li> 

						<li class="has-child"><a href="{{route('front.search')}}">@lang('front/home.allProperties')</a> 
						</li>                       
						<li><a href="{{route('front.aboutus')}}">@lang('front/home.aboutUs')</a></li>
						<li><a href="{{route('contactus.index')}}">@lang('front/home.contactUs')</a></li>
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

