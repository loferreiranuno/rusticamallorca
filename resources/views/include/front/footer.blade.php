 
	<footer id="page-footer">
		<div class="inner">
			<section id="footer-main">
				<div class="container">
					<div class="row">
						<div class="col-md-3 col-sm-3">
							<article>
								<h3>@lang('brand.name')</h3>
								<p>@lang('brand.description')</p>
							</article>
						</div><!-- /.col-sm-3 -->
						<div class="col-md-3 col-sm-3">
							<article>
								<h3>@lang('front/home.recentPropertiesForSale')</h3>
								
								@foreach(App\Product::lastSale()->get()->take(2) as $last)
									<div class="property small">
										<a href="{{route('property.show',['id'=> $last->id])}}">
											<div class="property-thumbnail" style="width:35px; height:35px; background-size: 35px 35px; background-image: url('{{RMHelper::getProductImage($last, false)}}')" >
												{{-- <img alt="" src="{{RMHelper::getProductImage($last, false)}}"> --}}
											</div>
										</a>
										<div class="info">
											<a href="{{route('property.show',['id'=>$last->id])}}">{{$last->title}}</a>
											<figure>{{$last->city_name}}</figure>
											<div class="tag price">{{$last->salePrice}}€</div>
										</div>
									</div><!-- /.property -->
								@endforeach
							</article>
						</div><!-- /.col-sm-3 -->
						<div class="col-md-3 col-sm-3">
							<article class="contact-us">
								<h3>@lang('front/home.contact')</h3>
								<address>
									{{ config('app.companyAddress') }}
								</address>
								{{ config('app.companyPhone') }} / {{ config('app.companyMobile') }}<br>
								<a href="mailto:{{config('mail.brand.address')}}" class="mailto">{{config('mail.brand.name')}}</a>
							</article>
						</div><!-- /.col-sm-3 -->
						<div class="col-md-3 col-sm-3">
							<article>
								<h3>@lang('front/home.helpfulLinks')</h3>
								<ul class="list-unstyled list-links">
									<li><a href="{{route('front.search')}}">@lang('front/home.properties')</a></li>
									<li><a href="{{route('front.privacy')}}">@lang('front/home.privacyPolicy')</a></li>
									<li><a href="{{route('front.termsconditions')}}">@lang('front/home.termsAndConditions')</a></li>
								</ul>
							</article>						
						</div><!-- /.col-sm-3 -->
						<div class="col-md-12 col-sm-12">
							<span class="pull-right"><a href="#page-top" class="roll">@lang('front/home.top')</a></span>
						</div>
					</div><!-- /.row -->
				</div><!-- /.container -->
			</section><!-- /#footer-main -->
			<section id="footer-thumbnails" class="footer-thumbnails"></section><!-- /#footer-thumbnails -->
			<section id="footer-copyright">
				<div class="container">
					<a href="{{ config('app.url') }}" target="blank">© {{ config('app.domain') }},</a> 
					<span>Powered by</span>    
					<a href="http://tonifont.com " target="blank">tonifont.com</a>           
					<img class="pull-right bank-logo" alt="" src="{{asset('assets/img/master-card.png')}}">
					<img class="pull-right bank-logo" alt="" src="{{asset('assets/img/visa.png')}}"> 
					<span class="pull-right">@lang('front/home.weAccept')</span>
				</div>
			</section>
		</div><!-- /.inner -->
 