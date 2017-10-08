 
	<footer id="page-footer">
		<div class="inner">
			<section id="footer-main">
				<div class="container">
					<div class="row">
						<div class="col-md-3 col-sm-3">
							<article>
								<h3>Rústica Mallorca</h3>
								<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed
								</p>
							</article>
						</div><!-- /.col-sm-3 -->
						<div class="col-md-3 col-sm-3">
							<article>
								<h3>Propiedades recientes en venta</h3>
								
								@foreach(App\Product::lastSale()->get()->take(2) as $last)
									<div class="property small">
										<a href="{{route('property.show',['id'=> $last->id])}}">
											<div class="property-thumbnail">
												<img alt="" src="{{RMHelper::getProductImage($last, false)}}">
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
								<h3>Contacto</h3>
								<address>
									Rústica Mallorca<br>
									Carrer Glosadors 7<br>
									07010 Palma de Mallorca
								</address>
								(+34) 971 000 000<br>
								<a href="mailto=hello@example.com" class="mailto">info@rusticamallorca.com</a>
							</article>
						</div><!-- /.col-sm-3 -->
						<div class="col-md-3 col-sm-3">
							<article>
								<h3>Enlaces útiles</h3>
								<ul class="list-unstyled list-links">
									<li><a href="{{route('front.search')}}">Propiedades</a></li>
									<li><a href="{{route('front.privacy')}}">Privacy Policy</a></li>
									<li><a href="{{route('front.termsconditions')}}">Terminos y condiciones</a></li>
								</ul>
							</article>						
						</div><!-- /.col-sm-3 -->
						<div class="col-md-12 col-sm-12">
							<span class="pull-right"><a href="#page-top" class="roll">Top</a></span>
						</div>
					</div><!-- /.row -->
				</div><!-- /.container -->
			</section><!-- /#footer-main -->
			<section id="footer-thumbnails" class="footer-thumbnails"></section><!-- /#footer-thumbnails -->
			<section id="footer-copyright">
				<div class="container">
					<a href="http://fruitfulcode.com" target="blank">© rusticamallorca.com,</a> 
					<span>Powered by</span>    
					<a href="http://tonifont.com " target="blank">tonifont.com</a>           
					<img class="pull-right bank-logo" alt="" src="{{asset('assets/img/master-card.png')}}">
					<img class="pull-right bank-logo" alt="" src="{{asset('assets/img/visa.png')}}"> 
					<span class="pull-right">Aceptamos:</span>
				</div>
			</section>
		</div><!-- /.inner -->
 