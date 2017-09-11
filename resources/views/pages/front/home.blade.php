@extends('layouts.front.default')



@section('content')
<div class="home_1">
				<div class="header_title">
					<h1>Rústica Mallorca Inmobiliaria</h1>
					<h4>Venta y alquiler de propiedades en el sector de las Fincas Rústicas.</h4>
				</div>
					<form id="form-submit" class="form-submit" action="search_result.html">
						<div class="search">
							<div class="selector col-md-3  col-sm-3">
								<select class="selection" id="rent-sale">
									<option>Venta</option>
									<option>Alquiler</option>
									<option>Todos</option>
								</select>
							</div>
							<div id="email-label" class="col-md-7 col-sm-7">
								<i class="fa fa-location-arrow"></i>
								<input type="text" id="search_field" class="form-control" placeholder="Dónde quieres vivir?">
							</div>
							<span class="ffs-bs col-md-2 col-sm-2"><button type="submit" class="btn btn-small btn-primary">Buscar</button></span>
						</div>
					</form>
			</div>
			<div class="container">
				<div class="explore">
					<h2>Explora propiedades en tu area</h2>
					<h5><i class="fa fa-map-marker"></i>Mallorca, España <span class="team-color">Cambiar ubicación</span></h5>
				</div>
				<div class="row">
					<div class="col-md-4 col-sm-6">
						<a href="search_result.html" class="exp-img" style="background:url(http://www.novamallorca.com/property-image/13.000€_BHIAA/BHIAAP4897_87313.jpg) center;background-size: cover;">
							<span class="filter"></span>
							<div class="img-info">
								<h3>Apartmentos</h3>
								<h6>33 propiedades</h6>
								<span class="ffs-bs btn btn-small btn-primary">ver más</span>
							</div>
						</a>
					</div>
					<div class="col-md-4 col-sm-6">
						<a href="search_result.html" class="exp-img" style="background:url(http://www.novamallorca.com/property-image/13.000€_BHIAA/BHIAAP4897_87313.jpg) center;background-size: cover;">
							<span class="filter"></span>
							<div class="img-info">
								<h3>Casas Rústicas</h3>
								<h6>33 propiedades</h6>
								<span class="ffs-bs btn btn-small btn-primary">ver más</span>
							</div>
						</a>
					</div>
					<div class="col-md-4 col-sm-6">
						<a href="search_result.html" class="exp-img" style="background:url(http://www.novamallorca.com/property-image/13.000€_BHIAA/BHIAAP4897_87313.jpg) center;background-size: cover;">
							<span class="filter"></span>
							<div class="img-info">
								<h3>Pisos</h3>
								<h6>33 propiedades</h6>
								<span class="ffs-bs btn btn-small btn-primary">ver más</span>
							</div>
						</a>
					</div>
					<div class="col-md-4 col-sm-6">
						<a href="search_result.html" class="exp-img" style="background:url(http://www.novamallorca.com/property-image/13.000€_BHIAA/BHIAAP4897_87313.jpg) center;background-size: cover;">
							<span class="filter"></span>
							<div class="img-info">
								<h3>Casas de lujo</h3>
								<h6>33 propiedades</h6>
								<span class="ffs-bs btn btn-small btn-primary">ver más</span>
							</div>
						</a>
					</div>
					<div class="col-md-8">
						<a href="search_result.html" class="exp-img" style="background:url(http://www.novamallorca.com/property-image/13.000€_BHIAA/BHIAAP4897_87313.jpg) center;background-size: cover;">
							<span class="filter"></span>
							<div class="img-info">
								<h3>Casas con piscina</h3>
								<h6>33 propiedades</h6>
								<span class="ffs-bs btn btn-small btn-primary">ver más</span>
							</div>
						</a>
					</div>
				</div>
			</div>
			<!-- end container -->
			<div class="wide-1">
				<div class="container rel-img">
					<div class="col-md-8 col-sm-8 ab-us">
						<h2>Somos Rústica Mallorca Inmobiliaria</h2>
						<div class="row">
							<div class="col-md-6 col-sm-6 ex-block">
								<h4><i class="fa fa-circle-o"></i>Amplia gama de propiedades</h4>
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
							</div>
							<div class="col-md-6 col-sm-6 ex-block">
								<h4><i class="fa fa-circle-o"></i>Rústica Mallorca</h4>
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry five centuries, but also the leap.</p>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-6 ex-block">
								<h4><i class="fa fa-circle-o"></i>Agentes para su servicio</h4>
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
							</div>
							<div class="col-md-6 col-sm-6 ex-block">
								<h4>&nbsp;</h4>
								<p>Typesetting, remaining essentially unchanged. It was popularised in the 1960s.</p>
							</div>
						</div>
						<span class="ffs-bs"><a href="property_page.html" class="btn btn-large">explora propiedades</a></span>
					</div>
				</div>
				<div class="ab-us-img col-md-4 col-sm-4"></div>
			</div>
			<!-- end wide-1 -->
			<div class="wide-2">
				<div class="container">
					<div class="explore">
						<h2>Nuestras casas exclusivas</h2>
						<h5 class="team-color">Lorem Ipsum is simply dummy text of the printing and typesetting industry. <br>Lorem Ipsum has been the industry's standard dummy text ever since</h5>
					</div>
					<div class="row">
						<div class="col-md-3 col-sm-3 col-xs-6 prop">
							<div class="wht-cont">
								<div class="exp-img-2" style="background:url(http://www.extravaganzi.com/wp-content/uploads/2013/04/Architect-Designed-Luxury-Villa-in-Mallorca-2.jpg) center;background-size: cover;">
									<span class="filter"></span>
									<span class="ffs-bs"><label for="op" class="btn btn-small btn-primary">ver fotos</label></span>
									<div class="overlay">
										<div class="img-counter">23 Fotos</div>
									</div>
								</div>
								<div class="item-title">
									<h4><a href="property_page.html">Casa de campo</a></h4>
									<p class="team-color">Carrer glosadors 7, 07010 Santanyi</p>
									<div class="col-md-7 col-sm-7 col-xs-7">
										<p>Studio - 2 bd</p>
									</div>
									<div class="col-md-5 col-sm-5 col-xs-5">
										<p>86 m<span class="rank">2</span></p>
									</div>
									<div class="col-md-7 col-sm-7 col-xs-7 lft-brd"></div>
									<div class="col-md-5 col-sm-5 col-xs-5 lft-brd"></div>
								</div>
								<hr>
								<div class="item-title btm-part">
									<div class="row">
										<div class="col-md-8 col-sm-8 col-xs-8">
											<p>5.000.000€</p>
											<p class="team-color">VENTA</p>
										</div>
										<div class="col-md-4 col-sm-4 col-xs-4 favorite">
											<div class="bookmark" data-bookmark-state="empty">
												<span class="title-add">Add to bookmark</span>
											</div>
											<div class="compare" data-compare-state="empty">
												<span class="plus-add">Add to compare</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-6 prop">
							<div class="wht-cont">
								<div class="exp-img-2" style="background:url(http://www.extravaganzi.com/wp-content/uploads/2013/04/Architect-Designed-Luxury-Villa-in-Mallorca-2.jpg) center;background-size: cover;">
									<span class="filter"></span>
									<span class="ffs-bs"><label for="op" class="btn btn-small btn-primary">ver fotos</label></span>
									<div class="overlay">
										<div class="img-counter">23 Fotos</div>
									</div>
								</div>
								<div class="item-title">
									<h4><a href="property_page.html">Casa con encanto</a></h4>
									<p class="team-color">Carrer glosadors 7, 07010 Santanyi</p>
									<div class="col-md-7 col-sm-7 col-xs-7">
										<p>Studio - 2 bd</p>
									</div>
									<div class="col-md-5 col-sm-5 col-xs-5">
										<p>86 m<span class="rank">2</span></p>
									</div>
									<div class="col-md-7 col-sm-7 col-xs-7 lft-brd"></div>
									<div class="col-md-5 col-sm-5 col-xs-5 lft-brd"></div>
								</div>
								<hr>
								<div class="item-title btm-part">
									<div class="row">
										<div class="col-md-8 col-sm-8 col-xs-8">
											<p>5.000.000€</p>
											<p class="team-color">VENTA</p>
										</div>
										<div class="col-md-4 col-sm-4 col-xs-4 favorite">
											<div class="bookmark" data-bookmark-state="empty">
												<span class="title-add">Add to bookmark</span>
											</div>
											<div class="compare" data-compare-state="empty">
												<span class="plus-add">Add to compare</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-6 prop">
							<div class="wht-cont">
								<div class="exp-img-2" style="background:url(http://www.extravaganzi.com/wp-content/uploads/2013/04/Architect-Designed-Luxury-Villa-in-Mallorca-2.jpg) center;background-size: cover;">
									<span class="filter"></span>
									<span class="ffs-bs"><label for="op" class="btn btn-small btn-primary">ver fotos</label></span>
									<div class="overlay">
										<div class="img-counter">23 Fotos</div>
									</div>
								</div>
								<div class="item-title">
									<h4><a href="property_page.html">Casa de Lujo</a></h4>
									<p class="team-color">Carrer glosadors 7, 07010 Santanyi</p>
									<div class="col-md-7 col-sm-7 col-xs-7">
										<p>Studio - 2 bd</p>
									</div>
									<div class="col-md-5 col-sm-5 col-xs-5">
										<p>86 m<span class="rank">2</span></p>
									</div>
									<div class="col-md-7 col-sm-7 col-xs-7 lft-brd"></div>
									<div class="col-md-5 col-sm-5 col-xs-5 lft-brd"></div>
								</div>
								<hr>
								<div class="item-title btm-part">
									<div class="row">
										<div class="col-md-8 col-sm-8 col-xs-8">
											<p>5,.000€0,.000€0</p>
											<p class="team-color">VENTA</p>
										</div>
										<div class="col-md-4 col-sm-4 col-xs-4 favorite">
											<div class="bookmark" data-bookmark-state="empty">
												<span class="title-add">Add to bookmark</span>
											</div>
											<div class="compare" data-compare-state="empty">
												<span class="plus-add">Add to compare</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-6 prop">
							<div class="wht-cont">
								<div class="exp-img-2" style="background:url(http://www.extravaganzi.com/wp-content/uploads/2013/04/Architect-Designed-Luxury-Villa-in-Mallorca-2.jpg) center;background-size: cover;">
									<span class="filter"></span>
									<span class="ffs-bs"><label for="op" class="btn btn-small btn-primary">ver fotos</label></span>
									<div class="overlay">
										<div class="img-counter">23 Fotos</div>
									</div>
								</div>
								<div class="item-title">
									<h4><a href="property_page.html">Casa con encanto</a></h4>
									<p class="team-color">Carrer glosadors 7, 07010 Santanyi</p>
									<div class="col-md-7 col-sm-7 col-xs-7">
										<p>Studio - 2 bd</p>
									</div>
									<div class="col-md-5 col-sm-5 col-xs-5">
										<p>86 m<span class="rank">2</span></p>
									</div>
									<div class="col-md-7 col-sm-7 col-xs-7 lft-brd"></div>
									<div class="col-md-5 col-sm-5 col-xs-5 lft-brd"></div>
								</div>
								<hr>
								<div class="item-title btm-part">
									<div class="row">
										<div class="col-md-8 col-sm-8 col-xs-8">
											<p>5.000.000€</p>
											<p class="team-color">VENTA</p>
										</div>
										<div class="col-md-4 col-sm-4 col-xs-4 favorite">
											<div class="bookmark" data-bookmark-state="empty">
												<span class="title-add">Add to bookmark</span>
											</div>
											<div class="compare" data-compare-state="empty">
												<span class="plus-add">Add to compare</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<span class="ffs-bs bottom"><a href="property_page.html" class="btn btn-default btn-large">explora propiedades</a></span>
			</div>
			<!-- end wide-2 -->
			<div class="wide-3 carousel-full-width">
				<div class="explore">
					<h2>Conoce al equipo de Rústica Mallorca</h2>
					<h5 class="team-color">Lorem Ipsum is simply dummy text of the printing and typesetting industry. <br>Lorem Ipsum has been the industry's standard dummy text ever since</h5>
				</div>
				<div id="owl-demo" class="owl-carousel owl-theme ">
					<div class="item">
						<div class="image" style="background:url(http://www.david-cuenca.com/music/bilder/03.%20jasmin%20wagner%20_X2H0827.jpg) center"></div>
						<div class="img-info">
							<div class="row">
								<div class="half col-xs-7">
									<h3><a href="agent_profile.html">Claudia</a></h3>
									<h6>Comercial</h6>
								</div>
								<div class="half col-xs-5 info-right">
									<p></p>
								</div>
								<hr>
							</div>
							<p>“Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry”</p>
						</div>
					</div>
					<div class="item">
						<div class="image" style="background:url(http://media.al.com/entertainment_impact/photo/michellepruiett---arieljpg-3f414b2947541a2f.jpg) center"></div>
						<div class="img-info">
							<div class="row">
								<div class="half col-xs-7">
									<h3><a href="agent_profile.html">Claudia</a></h3>
									<h6>Propietaria</h6>
								</div>
								<div class="half col-xs-5 info-right">
									<p></p>
								</div>
								<hr>
							</div>
							<p>“Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry”</p>
						</div>
					</div>
					<div class="item">
						<div class="image" style="background:url(http://www.david-cuenca.com/music/bilder/03.%20jasmin%20wagner%20_X2H0827.jpg) center"></div>
						<div class="img-info">
							<div class="row">
								<div class="half col-xs-7">
									<h3><a href="agent_profile.html">Claudia</a></h3>
									<h6>Gerente</h6>
								</div>
								<div class="half col-xs-5 info-right">
									<p></p>
								</div>
								<hr>
							</div>
							<p>“Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry”</p>
						</div>
					</div>
					<div class="item">
						<div class="image" style="background:url(http://placehold.it/475X450) center"></div>
						<div class="img-info">
							<div class="row">
								<div class="half col-xs-7">
									<h3><a href="agent_profile.html">Jason Satti</a></h3>
									<h6>Superhero</h6>
								</div>
								<div class="half col-xs-5 info-right">
									<p>415 Deals Done</p>
								</div>
								<hr>
							</div>
							<p>“Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry”</p>
						</div>
					</div>
					<div class="item">
						<div class="image" style="background:url(http://placehold.it/475X450) center"></div>
						<div class="img-info">
							<div class="row">
								<div class="half col-xs-7">
									<h3><a href="agent_profile.html">Someone</a></h3>
									<h6>Realtor</h6>
								</div>
								<div class="half col-xs-5 info-right">
									<p></p>
								</div>
								<hr>
							</div>
							<p>“Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry”</p>
						</div>
					</div>
				</div>
				<span class="ffs-bs"><a href="about_us.html" class="btn btn-default btn-large">Más sobre Rústica Mallorca</a></span>
			</div>
			<!-- end wide-3 carousel-full-width -->
			<div class="container">
				<section class="block testimonials">
					<header class="center">
						<h2 class="no-border">Nos encanta el trabajo de Rústica Mallorca!</h2>
					</header>
					<div class="owl-carousel testimonials-carousel">
						<blockquote class="item">
							<aside class="cite">
								<p class="team-color">"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 15.000€s, when an unknown printer took a galley of type and scrambled"</p>
							</aside>
							<figure>
								<div class="image">
									<img src="https://pbs.twimg.com/profile_images/801470095394480128/-SNUy0Ys.jpg" alt="">
								</div>
								<p>ToniFont</p>
								<p class="team-color">tonifont.com</p>
							</figure>
						</blockquote>
						<blockquote class="item">
							<aside class="cite">
								<p class="team-color">"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 15.000€s, when an unknown printer took a galley of type and scrambled"</p>
							</aside>
							<figure>
								<div class="image">
									<img src="https://pbs.twimg.com/profile_images/801470095394480128/-SNUy0Ys.jpg" alt="">
								</div>
								<p>ToniFont</p>
								<p class="team-color">tonifont.com</p>
							</figure>
						</blockquote>
						<blockquote class="item">
							<aside class="cite">
								<p class="team-color">"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 15.000€s, when an unknown printer took a galley of type and scrambled"</p>
							</aside>
							<figure>
								<div class="image">
									<img src="https://pbs.twimg.com/profile_images/801470095394480128/-SNUy0Ys.jpg" alt="">
								</div>
								<p>ToniFont</p>
								<p class="team-color">tonifont.com</p>
							</figure>
						</blockquote>
					
						
					</div>
				</section>
			</div> 
			<!-- end container -->
@stop