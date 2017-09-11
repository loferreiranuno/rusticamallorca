@extends('layouts.front.default',["body"=>['class'=>'page-search', 'id'=>'page-top', 'content'=>['id'=>'page-content-search']]])

@section('content')
<div class="container">
				<div class="wide_container_2">
					<div class="tabs">
						<header class="col-md-8 col-xs-12 no-pad">
							<div class="location-map col-sm-4 col-xs-4">
								<div class="input-group">
									<input type="text" class="form-control" id="address-map" name="address" placeholder="Manhattan, New York">
									<i class="fa fa-search"></i>
								</div>
							</div>
							<div class="select-block col-sm-2 col-xs-2">
								<select class="selection">
									<option>Beds</option>
									<option>1</option>
									<option>2</option>
									<option>3</option>
								</select>
							</div>
							<div class="select-block col-sm-2 col-xs-2 ">
								<select class="selection">
									<option>Type</option>
									<option>For Sale</option>
									<option>For Rent</option>
								</select>
							</div>
							<div class="select-block col-md-3 col-xs-4 last">
								<a class="options-button" id="toggle-link">More Filters</a>
							</div>
							<div class="options-overlay col-md-offset-4 col-sm-offset-5 col-sm-7" id="hidden_content" style="display: none;">
								<div class="row">
									<div class="col-xs-6 top-mrg">
										<div class="internal-container features">
											<div class="form-group">
												<label>Minimum Square Footage:</label>
												<input type="text" class="form-control" placeholder="Enter an Amount">
											</div>
											<label>Building Features:</label>
											<section class="block">
												<section>
													<ul class="submit-features">
														<li><div class="checkbox"><label><input type="checkbox">Elevator</label></div></li>
														<li><div class="checkbox"><label><input type="checkbox">Gym</label></div></li>
														<li><div class="checkbox"><label><input type="checkbox">Pool</label></div></li>
														<li><div class="checkbox"><label><input type="checkbox">Lorem Ipsum</label></div></li>
													</ul>
												</section>
											</section>
										</div>
									</div>
									<div class="col-xs-6 top-mrg">
										<div class="internal-container features">
											<label>Property Features:</label>
											<section class="block">
												<section>
													<ul class="submit-features">
														<li><div class="checkbox"><label><input type="checkbox">Air conditioning</label></div></li>
														<li><div class="checkbox"><label><input type="checkbox">Balcony</label></div></li>
														<li><div class="checkbox"><label><input type="checkbox">Garage Internet</label></div></li>
														<li><div class="checkbox"><label><input type="checkbox">Dishwasher</label></div></li>
														<li><div class="checkbox"><label><input type="checkbox">Washer Mashine</label></div></li>
														<li><div class="checkbox"><label><input type="checkbox">Some Lorem Ipsum</label></div></li>
													</ul>
												</section>
											</section>
										</div>
									</div>
								</div>
								</div><!-- options-overlay -->
						</header><!-- end header -->
						<ul class="tab-links col-md-4 col-xs-12">
							<li class="col-lg-3 col-lg-offset-2 col-md-4 col-xs-4 no-pad active"><a href="#tab1" class="map2"><img src="assets/img/map.png" alt=""/>Map</a></li>
							<li class="col-lg-3 col-md-4 col-xs-4 no-pad"><a href="#tab2"><img src="{{asset('assets/img/grid.png')}}" alt=""/>Grig</a></li>
							<li class="col-lg-3 col-md-4 col-xs-4 bdr-rgh no-pad"><a href="#tab3"><i class="fa fa-th-list"></i>List</a></li>
						</ul>
						<!-- tab-links -->
						<div class="tab-content">
							<div id="tab1" class="tab" style="display: block;">
								<div class="sidebar col-sm-4 col-xs-12">
									<!-- Map -->
									<div id="map"></div>
									<!-- end Map -->
								</div><!-- sidebar -->
								<div class="content col-sm-8 col-xs-12">
									<!-- Range slider -->
									<div class="col-xs-12">
										<div class="row">
											<form method="post">
												<div class="col-md-3 col-sm-4">
													<div class="form-inline">
														<label class="top-indent">Price Range:</label>
													</div>
												</div>
												<div class="col-md-9 col-sm-8">
													<div class="form-group">
														<div class="price-range price-range-wrapper">
															<input class="price-input" type="text" name="price" value="0;5000000">
														</div>
													</div>
												</div>
											</form>
										</div><!-- row -->
									</div>	<!-- explore_grid -->
									<!-- End Range slider -->

									<div class="wide-2">
										<div class="col-xs-12">
											<div class="row">
												<div class="col-md-4 col-sm-6 col-xs-6 prop">
													<div class="wht-cont">
														<div class="exp-img-2" style="background:url(http://placehold.it/255x200) center;background-size: cover;">
															<span class="filter"></span>
															<span class="ffs-bs"><label for="op" class="btn btn-small btn-primary">browse photos</label></span>
															<div class="overlay">
																<div class="img-counter">23 Photo</div>
															</div>
														</div>
														<div class="item-title">
															<h4><a href="property_page.html">AVA High Line 89 - 916 Apartments</a></h4>
															<p class="team-color">525 W 28th St, New York, NY 10001</p>
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
																	<p>$5,000,000</p>
																	<p class="team-color">FOR SALE</p>
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
												<div class="col-md-4 col-sm-6 col-xs-6 prop">
													<div class="wht-cont">
														<div class="exp-img-2" style="background:url(http://placehold.it/255x200) center;background-size: cover;">
															<span class="filter"></span>
															<span class="ffs-bs"><label for="op" class="btn btn-small btn-primary">browse photos</label></span>
															<div class="overlay">
																<div class="img-counter">23 Photo</div>
															</div>
														</div>
														<div class="item-title">
															<h4><a href="property_page.html">Prism at Park Avenue South Apar</a></h4>
															<p class="team-color">525 W 28th St, New York, NY 10001</p>
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
																	<p>$5,000,000</p>
																	<p class="team-color">FOR SALE</p>
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
												<div class="col-md-4 col-sm-6 col-xs-6 prop">
													<div class="wht-cont">
														<div class="exp-img-2" style="background:url(http://placehold.it/255x200) center;background-size: cover;">
															<span class="filter"></span>
															<span class="ffs-bs"><label for="op" class="btn btn-small btn-primary">browse photos</label></span>
															<div class="overlay">
																<div class="img-counter">23 Photo</div>
															</div>
														</div>
														<div class="item-title">
															<h4><a href="property_page.html">Avalon Morningside Park Apartment</a></h4>
															<p class="team-color">525 W 28th St, New York, NY 10001</p>
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
																	<p>$5,000,000</p>
																	<p class="team-color">FOR SALE</p>
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
												<div class="col-md-4 col-sm-6 col-xs-6 prop">
													<div class="wht-cont">
														<div class="exp-img-2" style="background:url(http://placehold.it/255x200) center;background-size: cover;">
															<span class="filter"></span>
															<span class="ffs-bs"><label for="op" class="btn btn-small btn-primary">browse photos</label></span>
															<div class="overlay">
																<div class="img-counter">23 Photo</div>
															</div>
														</div>
														<div class="item-title">
															<h4><a href="property_page.html">AVA High Line 89 - 916 Apartments</a></h4>
															<p class="team-color">525 W 28th St, New York, NY 10001</p>
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
																	<p>$5,000,000</p>
																	<p class="team-color">FOR SALE</p>
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
												<div class="col-md-4 col-sm-6 col-xs-6 prop">
													<div class="wht-cont">
														<div class="exp-img-2" style="background:url(http://placehold.it/255x200) center;background-size: cover;">
															<span class="filter"></span>
															<span class="ffs-bs"><label for="op" class="btn btn-small btn-primary">browse photos</label></span>
															<div class="overlay">
																<div class="img-counter">23 Photo</div>
															</div>
														</div>
														<div class="item-title">
															<h4><a href="property_page.html">Prism at Park Avenue South Apar</a></h4>
															<p class="team-color">525 W 28th St, New York, NY 10001</p>
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
																	<p>$5,000,000</p>
																	<p class="team-color">FOR SALE</p>
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
												<div class="col-md-4 col-sm-6 col-xs-6 prop">
													<div class="wht-cont">
														<div class="exp-img-2" style="background:url(http://placehold.it/255x200) center;background-size: cover;">
															<span class="filter"></span>
															<span class="ffs-bs"><label for="op" class="btn btn-small btn-primary">browse photos</label></span>
															<div class="overlay">
																<div class="img-counter">23 Photo</div>
															</div>
														</div>
														<div class="item-title">
															<h4><a href="property_page.html">Avalon Morningside Park Apartment</a></h4>
															<p class="team-color">525 W 28th St, New York, NY 10001</p>
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
																	<p>$5,000,000</p>
																	<p class="team-color">FOR SALE</p>
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
											</div><!-- end row -->
										</div><!-- end container -->
										<div class="col-xs-12 content_2 top-indent">
											<nav class="site-navigation paging-navigation navbar">
												<div class="nav-previous"><a href="#">PREV PAGE</a></div>
												<ul class="pagination pagination-lg">
													<li><a href="#">1</a></li>
													<li><span class="active">2</span></li>
													<li><a href="#">3</a></li>
													<li><span class="nav-dots">...</span></li>
													<li><a href="#">5</a></li>
												</ul>
												<div class="nav-next"><a href="#">NEXT PAGE</a></div>
											</nav>
										</div>
									</div>	<!-- end wide-2 -->
								</div>	<!-- content -->
							</div>
							<div id="tab2" class="tab">
								<div class="col-xs-12 content_2">
									<div class="col-md-10 col-md-offset-1">
										<!-- Range slider -->
										<div class="explore_grid">
											<div class="row">
												<div class="explore col-xs-12">
													<h2>Properties for rent</h2>
													<h5 class="team-color col-sm-offset-3 col-sm-6 col-xs-offset-1 col-xs-10">Lorem Ipsum is simply dummy text of the printing and Lorem Ipsum has been the industry's standard </h5>
												</div>
												<form method="post">
													<div class="col-md-2 col-sm-3">
														<div class="form-inline">
															<label class="top-indent">Price Range:</label>
														</div>
													</div>
													<div class="col-md-8 col-sm-7">
														<div class="form-group">
															<div class="price-range price-range-wrapper"></div>
														</div>
													</div>
													<div class="select-block no-border pull-right col-sm-2 col-xs-12">
														<select class="selection">
															<option>Sort By:</option>
															<option>Date</option>
															<option>Price</option>
															<option>Type</option>
														</select>
													</div>	<!-- select-block -->
												</form>
											</div><!-- row -->
										</div>
										<!-- End Range slider -->
										<div class="wide-2">
											<div class="row">
												<div class="col-md-3 col-sm-3 col-xs-6 prop">
													<div class="wht-cont">
														<div class="exp-img-2" style="background:url(http://placehold.it/255x200) center;background-size: cover;">
															<span class="filter"></span>
															<span class="ffs-bs"><label for="op" class="btn btn-small btn-primary">browse photos</label></span>
															<div class="overlay">
																<div class="img-counter">23 Photo</div>
															</div>
														</div>
														<div class="item-title">
															<h4><a href="property_page.html">AVA High Line 89 - 916 Apartments</a></h4>
															<p class="team-color">525 W 28th St, New York, NY 10001</p>
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
																	<p>$5,000,000</p>
																	<p class="team-color">FOR SALE</p>
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
														<div class="exp-img-2" style="background:url(http://placehold.it/255x200) center;background-size: cover;">
															<span class="filter"></span>
															<span class="ffs-bs"><label for="op" class="btn btn-small btn-primary">browse photos</label></span>
															<div class="overlay">
																<div class="img-counter">23 Photo</div>
															</div>
														</div>
														<div class="item-title">
															<h4><a href="property_page.html">Prism at Park Avenue South Apar</a></h4>
															<p class="team-color">525 W 28th St, New York, NY 10001</p>
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
																	<p>$5,000,000</p>
																	<p class="team-color">FOR SALE</p>
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
														<div class="exp-img-2" style="background:url(http://placehold.it/255x200) center;background-size: cover;">
															<span class="filter"></span>
															<span class="ffs-bs"><label for="op" class="btn btn-small btn-primary">browse photos</label></span>
															<div class="overlay">
																<div class="img-counter">23 Photo</div>
															</div>
														</div>
														<div class="item-title">
															<h4><a href="property_page.html">Avalon Morningside Park Apartment</a></h4>
															<p class="team-color">525 W 28th St, New York, NY 10001</p>
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
																	<p>$5,000,000</p>
																	<p class="team-color">FOR SALE</p>
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
														<div class="exp-img-2" style="background:url(http://placehold.it/255x200) center;background-size: cover;">
															<span class="filter"></span>
															<span class="ffs-bs"><label for="op" class="btn btn-small btn-primary">browse photos</label></span>
															<div class="overlay">
																<div class="img-counter">23 Photo</div>
															</div>
														</div>
														<div class="item-title">
															<h4><a href="property_page.html">Prism at Park Avenue South Apar</a></h4>
															<p class="team-color">525 W 28th St, New York, NY 10001</p>
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
																	<p>$5,000,000</p>
																	<p class="team-color">FOR SALE</p>
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
											<div class="row">
												<div class="col-md-3 col-sm-3 col-xs-6 prop">
													<div class="wht-cont">
														<div class="exp-img-2" style="background:url(http://placehold.it/255x200) center;background-size: cover;">
															<span class="filter"></span>
															<span class="ffs-bs"><label for="op" class="btn btn-small btn-primary">browse photos</label></span>
															<div class="overlay">
																<div class="img-counter">23 Photo</div>
															</div>
														</div>
														<div class="item-title">
															<h4><a href="property_page.html">AVA High Line 89 - 916 Apartments</a></h4>
															<p class="team-color">525 W 28th St, New York, NY 10001</p>
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
																	<p>$5,000,000</p>
																	<p class="team-color">FOR SALE</p>
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
														<div class="exp-img-2" style="background:url(http://placehold.it/255x200) center;background-size: cover;">
															<span class="filter"></span>
															<span class="ffs-bs"><label for="op" class="btn btn-small btn-primary">browse photos</label></span>
															<div class="overlay">
																<div class="img-counter">23 Photo</div>
															</div>
														</div>
														<div class="item-title">
															<h4><a href="property_page.html">Prism at Park Avenue South Apar</a></h4>
															<p class="team-color">525 W 28th St, New York, NY 10001</p>
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
																	<p>$5,000,000</p>
																	<p class="team-color">FOR SALE</p>
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
														<div class="exp-img-2" style="background:url(http://placehold.it/255x200) center;background-size: cover;">
															<span class="filter"></span>
															<span class="ffs-bs"><label for="op" class="btn btn-small btn-primary">browse photos</label></span>
															<div class="overlay">
																<div class="img-counter">23 Photo</div>
															</div>
														</div>
														<div class="item-title">
															<h4><a href="property_page.html">Avalon Morningside Park Apartment</a></h4>
															<p class="team-color">525 W 28th St, New York, NY 10001</p>
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
																	<p>$5,000,000</p>
																	<p class="team-color">FOR SALE</p>
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
														<div class="exp-img-2" style="background:url(http://placehold.it/255x200) center;background-size: cover;">
															<span class="filter"></span>
															<span class="ffs-bs"><label for="op" class="btn btn-small btn-primary">browse photos</label></span>
															<div class="overlay">
																<div class="img-counter">23 Photo</div>
															</div>
														</div>
														<div class="item-title">
															<h4><a href="property_page.html">Prism at Park Avenue South Apar</a></h4>
															<p class="team-color">525 W 28th St, New York, NY 10001</p>
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
																	<p>$5,000,000</p>
																	<p class="team-color">FOR SALE</p>
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
										<!-- content_2 -->
									</div>
								</div>
								<div class="col-xs-12">
									<div class="col-md-10 col-md-offset-1 col-xs-12">
										<nav class="site-navigation paging-navigation navbar">
											<div class="nav-previous"><a href="#">PREV PAGE</a></div>
											<ul class="pagination pagination-lg">
												<li><a href="#">1</a></li>
												<li><span class="active">2</span></li>
												<li><a href="#">3</a></li>
												<li><span class="nav-dots">...</span></li>
												<li><a href="#">5</a></li>
											</ul>
											<div class="nav-next"><a href="#">NEXT PAGE</a></div>
										</nav>
									</div>
								</div>
							</div>
							<div id="tab3" class="tab">
								<div class="col-xs-12 content_2">
									<div class="col-lg-10 col-lg-offset-1 col-md-12">
										<!-- Range slider -->
										<div class="row">
											<div class="explore col-xs-12">
												<h2>Properties for sale</h2>
												<h5 class="team-color col-sm-offset-3 col-sm-6 col-xs-offset-1 col-xs-10">Lorem Ipsum is simply dummy text of the printing and Lorem Ipsum has been the industry's standard </h5>
											</div>
											<form method="post">
												<div class="col-md-2 col-sm-3">
													<div class="form-inline">
														<label class="top-indent">Price Range:</label>
													</div>
												</div>
												<div class="col-md-8 col-sm-7">
													<div class="form-group">
														<div class="price-range price-range-wrapper"></div>
													</div>
												</div>
												<div class="select-block no-border pull-right col-sm-2 col-xs-12">
													<select class="selection">
														<option>Sort By:</option>
														<option>Date</option>
														<option>Price</option>
														<option>Type</option>
													</select>
												</div>	<!-- select-block -->
											</form>
										</div><!-- row -->
										<!-- End Range slider -->
										<div class="wide-2">
											<div class="row white">
												<div class="col-md-3 col-sm-3 prp-img">
													<div class="exp-img-2" style="background:url(http://placehold.it/285x200) center;background-size: cover;">
														<span class="filter"></span>
														<span class="ffs-bs"><label for="op" class="btn btn-small btn-primary">browse photos</label></span>
														<div class="overlay">
															<div class="img-counter">23 Photo</div>
														</div>
													</div>
												</div>
												<div class="item-info col-lg-7 col-md-6 col-sm-6">
													<h4><a href="property_page.html">AVA High Line 89 - 916 Apartments</a></h4>
													<p class="team-color">525 W 28th St, New York, NY 10001</p>
													<div class="block">
														<div class="col-md-3 col-sm-3 col-xs-3 cat-img">
															<img src="asset('assets/img/bedroom.png')}}" alt="">
															<p class="info-line">3 Bedrooms</p>
														</div>
														<div class="col-md-3 col-sm-3 col-xs-3 cat-img">
															<img src="{{asset('assets/img/bathroom.png')}}" alt="">
															<p class="info-line">1 Bathroom</p>
														</div>
														<div class="col-md-3 col-sm-3 col-xs-3 cat-img">
															<img src="{{asset('assets/img/square.png')}}" alt="">
															<p class="info-line">100 m<span class="rank">2</span></p>
														</div>
														<div class="col-md-3 col-sm-3 col-xs-3 cat-img">
															<img src="{{asset('assets/img/garage.png')}}" alt="">
															<p class="info-line">1 Garage</p>
														</div>
													</div>
													<div class="col-md-3 col-sm-3 col-xs-3 line"></div>
													<div class="col-md-3 col-sm-3 col-xs-3 line"></div>
													<div class="col-md-3 col-sm-3 col-xs-3 line"></div>
													<div class="col-md-3 col-sm-3 col-xs-3 line"></div>
													<hr>
													<p>Aenean quis sem nisi. Aliquam vehicula gravida orci, nec pretium mi ultricies in. Donec fermentum pulvinar mauris neque justo ...</p>
												</div>
												<div class="item-price col-lg-2 col-md-3 col-sm-3 col-xs-12">
													<div class="sum col-sm-12 col-xs-6">
														<p>$1,000,000</p>
														<p class="team-color">for rent</p>
													</div>
													<span class="ffs-bs col-xs-12 btn-half-wth"><a href="property_page.html" class="btn btn-default btn-small">learn more <i class="fa fa-caret-right"></i></a></span>
													<div class="sum favorite col-sm-12 col-xs-6">
														<div class="bookmark col-xs-3" data-bookmark-state="empty">
															<span class="title-add">Add to bookmark</span>
														</div>
														<p class="col-xs-3">Fav</p>
														<div class="compare col-xs-3" data-compare-state="empty">
															<span class="plus-add">Add to compare</span>
														</div>
														<p class="col-xs-3">Comp</p>
													</div>
												</div>
											</div>
											<div class="row white">
												<div class="col-md-3 col-sm-3 prp-img">
													<div class="exp-img-2" style="background:url(http://placehold.it/285x200) center;background-size: cover;">
														<span class="filter"></span>
														<span class="ffs-bs"><label for="op" class="btn btn-small btn-primary">browse photos</label></span>
														<div class="overlay">
															<div class="img-counter">23 Photo</div>
														</div>
													</div>
												</div>
												<div class="item-info col-lg-7 col-md-6 col-sm-6">
													<h4><a href="property_page.html">AVA High Line 89 - 916 Apartments</a></h4>
													<p class="team-color">525 W 28th St, New York, NY 10001</p>
													<div class="block">
														<div class="col-md-3 col-sm-3 col-xs-3 cat-img">
															<img src="assets/img/bedroom.png" alt="">
															<p class="info-line">3 Bedrooms</p>
														</div>
														<div class="col-md-3 col-sm-3 col-xs-3 cat-img">
															<img src="assets/img/bathroom.png" alt="">
															<p class="info-line">1 Bathroom</p>
														</div>
														<div class="col-md-3 col-sm-3 col-xs-3 cat-img">
															<img src="assets/img/square.png" alt="">
															<p class="info-line">100 m<span class="rank">2</span></p>
														</div>
														<div class="col-md-3 col-sm-3 col-xs-3 cat-img">
															<img src="assets/img/garage.png" alt="">
															<p class="info-line">1 Garage</p>
														</div>
													</div>
													<div class="col-md-3 col-sm-3 col-xs-3 line"></div>
													<div class="col-md-3 col-sm-3 col-xs-3 line"></div>
													<div class="col-md-3 col-sm-3 col-xs-3 line"></div>
													<div class="col-md-3 col-sm-3 col-xs-3 line"></div>
													<hr>
													<p>Aenean quis sem nisi. Aliquam vehicula gravida orci, nec pretium mi ultricies in. Donec fermentum pulvinar mauris neque justo ...</p>
												</div>
												<div class="item-price col-lg-2 col-md-3 col-sm-3 col-xs-12">
													<div class="sum col-sm-12 col-xs-6">
														<p>$1,000,000</p>
														<p class="team-color">for rent</p>
													</div>
													<span class="ffs-bs col-xs-12 btn-half-wth"><a href="property_page.html" class="btn btn-default btn-small">learn more <i class="fa fa-caret-right"></i></a></span>
													<div class="sum favorite col-sm-12 col-xs-6">
														<div class="bookmark col-xs-3" data-bookmark-state="empty">
															<span class="title-add">Add to bookmark</span>
														</div>
														<p class="col-xs-3">Fav</p>
														<div class="compare col-xs-3" data-compare-state="empty">
															<span class="plus-add">Add to compare</span>
														</div>
														<p class="col-xs-3">Comp</p>
													</div>
												</div>
											</div>
											<div class="row white">
												<div class="col-md-3 col-sm-3 prp-img">
													<div class="exp-img-2" style="background:url(http://placehold.it/285x200) center;background-size: cover;">
														<span class="filter"></span>
														<span class="ffs-bs"><label for="op" class="btn btn-small btn-primary">browse photos</label></span>
														<div class="overlay">
															<div class="img-counter">23 Photo</div>
														</div>
													</div>
												</div>
												<div class="item-info col-lg-7 col-md-6 col-sm-6">
													<h4><a href="property_page.html">AVA High Line 89 - 916 Apartments</a></h4>
													<p class="team-color">525 W 28th St, New York, NY 10001</p>
													<div class="block">
														<div class="col-md-3 col-sm-3 col-xs-3 cat-img">
															<img src="assets/img/bedroom.png" alt="">
															<p class="info-line">3 Bedrooms</p>
														</div>
														<div class="col-md-3 col-sm-3 col-xs-3 cat-img">
															<img src="assets/img/bathroom.png" alt="">
															<p class="info-line">1 Bathroom</p>
														</div>
														<div class="col-md-3 col-sm-3 col-xs-3 cat-img">
															<img src="assets/img/square.png" alt="">
															<p class="info-line">100 m<span class="rank">2</span></p>
														</div>
														<div class="col-md-3 col-sm-3 col-xs-3 cat-img">
															<img src="assets/img/garage.png" alt="">
															<p class="info-line">1 Garage</p>
														</div>
													</div>
													<div class="col-md-3 col-sm-3 col-xs-3 line"></div>
													<div class="col-md-3 col-sm-3 col-xs-3 line"></div>
													<div class="col-md-3 col-sm-3 col-xs-3 line"></div>
													<div class="col-md-3 col-sm-3 col-xs-3 line"></div>
													<hr>
													<p>Aenean quis sem nisi. Aliquam vehicula gravida orci, nec pretium mi ultricies in. Donec fermentum pulvinar mauris neque justo ...</p>
												</div>
												<div class="item-price col-lg-2 col-md-3 col-sm-3 col-xs-12">
													<div class="sum col-sm-12 col-xs-6">
														<p>$1,000,000</p>
														<p class="team-color">for rent</p>
													</div>
													<span class="ffs-bs col-xs-12 btn-half-wth"><a href="property_page.html" class="btn btn-default btn-small">learn more <i class="fa fa-caret-right"></i></a></span>
													<div class="sum favorite col-sm-12 col-xs-6">
														<div class="bookmark col-xs-3" data-bookmark-state="empty">
															<span class="title-add">Add to bookmark</span>
														</div>
														<p class="col-xs-3">Fav</p>
														<div class="compare col-xs-3" data-compare-state="empty">
															<span class="plus-add">Add to compare</span>
														</div>
														<p class="col-xs-3">Comp</p>
													</div>
												</div>
											</div>
											<div class="row white">
												<div class="col-md-3 col-sm-3 prp-img">
													<div class="exp-img-2" style="background:url(http://placehold.it/285x200) center;background-size: cover;">
														<span class="filter"></span>
														<span class="ffs-bs"><label for="op" class="btn btn-small btn-primary">browse photos</label></span>
														<div class="overlay">
															<div class="img-counter">23 Photo</div>
														</div>
													</div>
												</div>
												<div class="item-info col-lg-7 col-md-6 col-sm-6">
													<h4><a href="property_page.html">AVA High Line 89 - 916 Apartments</a></h4>
													<p class="team-color">525 W 28th St, New York, NY 10001</p>
													<div class="block">
														<div class="col-md-3 col-sm-3 col-xs-3 cat-img">
															<img src="assets/img/bedroom.png" alt="">
															<p class="info-line">3 Bedrooms</p>
														</div>
														<div class="col-md-3 col-sm-3 col-xs-3 cat-img">
															<img src="assets/img/bathroom.png" alt="">
															<p class="info-line">1 Bathroom</p>
														</div>
														<div class="col-md-3 col-sm-3 col-xs-3 cat-img">
															<img src="assets/img/square.png" alt="">
															<p class="info-line">100 m<span class="rank">2</span></p>
														</div>
														<div class="col-md-3 col-sm-3 col-xs-3 cat-img">
															<img src="assets/img/garage.png" alt="">
															<p class="info-line">1 Garage</p>
														</div>
													</div>
													<div class="col-md-3 col-sm-3 col-xs-3 line"></div>
													<div class="col-md-3 col-sm-3 col-xs-3 line"></div>
													<div class="col-md-3 col-sm-3 col-xs-3 line"></div>
													<div class="col-md-3 col-sm-3 col-xs-3 line"></div>
													<hr>
													<p>Aenean quis sem nisi. Aliquam vehicula gravida orci, nec pretium mi ultricies in. Donec fermentum pulvinar mauris neque justo ...</p>
												</div>
												<div class="item-price col-lg-2 col-md-3 col-sm-3 col-xs-12">
													<div class="sum col-sm-12 col-xs-6">
														<p>$1,000,000</p>
														<p class="team-color">for rent</p>
													</div>
													<span class="ffs-bs col-xs-12 btn-half-wth"><a href="property_page.html" class="btn btn-default btn-small">learn more <i class="fa fa-caret-right"></i></a></span>
													<div class="sum favorite col-sm-12 col-xs-6">
														<div class="bookmark col-xs-3" data-bookmark-state="empty">
															<span class="title-add">Add to bookmark</span>
														</div>
														<p class="col-xs-3">Fav</p>
														<div class="compare col-xs-3" data-compare-state="empty">
															<span class="plus-add">Add to compare</span>
														</div>
														<p class="col-xs-3">Comp</p>
													</div>
												</div>
											</div>
										</div>	
										<!-- end wide-2 -->
									</div>
								</div>
								<div class="col-xs-12">
									<div class="col-md-10 col-md-offset-1 col-xs-12">
										<nav class="site-navigation paging-navigation navbar">
											<div class="nav-previous"><a href="#">PREV PAGE</a></div>
											<ul class="pagination pagination-lg">
												<li><a href="#">1</a></li>
												<li><span class="active">2</span></li>
												<li><a href="#">3</a></li>
												<li><span class="nav-dots">...</span></li>
												<li><a href="#">5</a></li>
											</ul>
											<div class="nav-next"><a href="#">NEXT PAGE</a></div>
										</nav>
									</div>
								</div>
							</div>
						</div><!-- tab-content -->
					</div><!-- tabs -->
				</div>
			</div> 
@stop
		 

@section('styles')

	<link rel="stylesheet" href="{{asset('assets/css/jquery.slider.min.css')}}" type="text/css">

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


	<script type="text/javascript" src="{{asset('assets/js/custom-map.js')}}"></script> 

	<script>
		// coordinates for current location
		var _latitude = 40.717857;
		var _longitude = -73.995042;
		createHomepageGoogleMap(_latitude,_longitude);
	</script>

<!--[if gt IE 8]>
<script type="text/javascript" src="{{asset('assets/js/ie.js')}}"></script>
<![endif]-->
@stop

