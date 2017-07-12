				<div class="col-md-7 col-lg-7 col-lg-offset-1">
							<div class="sidebar">
								<div class="sidebar-widgets">
									<div class="row isotope-container">
										<div class="col-md-24 col-sm-12 col-xs-24 isotope-item">
											<div class="sidebar-widget widget_search">
												<form class="search-form">
													<label>
														<input type="text" class="search-input js-input" />
														<span>Search</span>
													</label>
													<button type="sumit" class="search-submit">
														<i class="icon icon-search"></i>
													</button>
												</form>
											</div>
										</div>

										<div class="col-md-24 col-sm-12 col-xs-24 isotope-item">
											<div class="sidebar-widget widget_latest_listing">
												<p class="heading">Latest listing</p>

												<ul class="listing-items row row-fit-10">
												<?php
												$recent=Property::fetch(6,'properties.id DESC');
												foreach($recent as $recent_property){
													$recent_property->get_picture('sidebar_listing');
													echo "
													<li class=\"item col-xs-8\">
														<div class=\"image\">
															<a href=\"".$recent_property->link()."\">
																<img src=\"".$recent_property->pix->sidebar_listing."\" alt=\"$recent_property->name listing image\" />
															</a>
														</div>

														<h5 class=\"title\">
															<a href=\"".$recent_property->link()."\">".$recent_property->name()."</a>
														</h5>
														<p class=\"address\">".$recent_property->code_name()."</p>
														<span class=\"price\">".$recent_property->price()."</span>
													</li>
													";
												}
												?>
												</ul>
											</div>
										</div>

										<div class="col-md-24 col-sm-12 col-xs-24 isotope-item">
											<div class="sidebar-widget widget_categories">
												<h4 class="widget-title">Category</h4>

												<ul>
													<li><a href="#">Houses</a></li>
													<li><a href="#">Apartments</a></li>
													<li><a href="#">Lands</a></li>
												</ul>
											</div>
										</div>

										<div class="col-md-24 col-sm-12 col-xs-24 isotope-item">
											<div class="sidebar-widget widget_popular_listing">
												<h4 class="widget-title">Popular listing</h4>

												<ul class="popular-listing">
												<?php
												$popular=Property::fetch(3,'views DESC');
												foreach($popular as $popular_property){
													$pix=$popular_property->get_picture('sidebar_popular');
													echo "
													<li class=\"list-item\">
														<div class=\"photo\">
															<a href=\"".$recent_property->link()."\">
																<img src=\"".$pix."\" alt=\"$popular_property->name sidebar popular\" />
															</a>
														</div>

														<h4><a href=\"".$popular_property->link()."\">$popular_property->name</a></h4>
														<p class=\"price\">".$popular_property->price()."</p>
														<a class=\"link\" href=\"".$popular_property->link()."\">View</a>
													</li>
													";
												}
												?>
</ul>
											</div>
										</div>

										<div class="col-md-24 col-sm-12 col-xs-24 isotope-item">
											<div class="sidebar-widget widget_promo">
												<a href="single.html">
													<img class="promo-bg" src="img/promo-bg.jpg" alt="promo widget background" />
													<img class="promo-fg" src="img/promo-fg.png" alt="foreground image" />
													<div class="text">
														<h6>Best deal</h6>
														<p>New house</p>
														<span>$1000 per month</span>
													</div>
												</a>
											</div>
										</div>

										<div class="col-md-24 col-sm-12 col-xs-24 isotope-item">
											<div class="sidebar-widget widget_custom_archive">
												<h4 class="widget-title">Archives</h4>

												<div class="tabs">
													<ul class="heading">
														<li><a href="#2014">2014</a></li>
														<li><a href="#2015">2015</a></li>
													</ul>

													<div id="2014" class="calendar">
														<ul>
															<li class="month">
																<p><i class="icon-plus2"></i>January</p>
																<ul>
																	<li><a href="#">Meeting with our agents</a></li>
																	<li><a href="#">New hotel was opened</a></li>
																</ul>
															</li>

															<li class="month">
																<p><i class="icon-plus2"></i>February</p>
																<ul>
																	<li><a href="#">Meeting with our agents</a></li>
																	<li><a href="#">New hotel was opened</a></li>
																</ul>
															</li>
														</ul>
													</div>

													<div id="2015" class="calendar">
														<ul>
															<li class="month">
																<p><i class="icon-plus2"></i>January</p>
																<ul>
																	<li><a href="#">Meeting with our agents</a></li>
																	<li><a href="#">New hotel was opened</a></li>
																</ul>
															</li>

															<li class="month">
																<p><i class="icon-plus2"></i>February</p>
																<ul>
																	<li><a href="#">Meeting with our agents</a></li>
																	<li><a href="#">New hotel was opened</a></li>
																</ul>
															</li>

															<li class="month">
																<p><i class="icon-plus2"></i>March</p>
																<ul>
																	<li><a href="#">Meeting with our agents</a></li>
																	<li><a href="#">New hotel was opened</a></li>
																</ul>
															</li>
														</ul>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
			