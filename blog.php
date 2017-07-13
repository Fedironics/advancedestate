<?php
require_once "includes/initialize.php";
require_once "parts/header.php";
?>

<!--  Blog Section -->
<section class="blog-section">
	<div class="row">
		<div class="col-lg-16 col-md-17 blog-content-wrapper">
			<div class="blog-content">
				<div class="row row-fit-10">
					<?php
					$blogposts = Blog::find_all();
					foreach ($blogposts as $blogpost) :
						?>



						<div class="col-md-12">
							<div class="blog-post sticky post-with-image">
								<div class="post-body">
									<div class="blog-post-meta">
										<div class="post-cover">
											<a href="blogpost.html">
												<img src="img/featured-post-1.jpg" alt="featured blogpost cover" />
											</a>
										</div>

										<div class="post-author">
											<div class="image">
												<img src="img/blog-author-1.jpg" alt="blog author" />
											</div>

											<p>Robert Doe</p>
										</div>
									</div>
									<h2 class="post-title"><a href="<?php echo $blogpost->link(); ?>"><?php echo $blogpost->title ; ?></a></h2>

									<p><?php echo $blogpost->body ; ?> </p>

									<div class="post-meta">
										<ul class="meta">
											<li class="date"><?php echo $blogpost->added ; ?></li>
											<li class="comments"><?php echo $blogpost->count_comments() ; ?></li>
										</ul>

										<a class="post-link" href="<?php echo $blogpost->link(); ?>">Read More</a>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach ; ?>
				</div>

				<!-- Pagination -->
				<ul class="page-numbers inverted">
					<li>
						<a href="#" class="page-numbers">1</a>
					</li>
					<li>
						<a href="#" class="page-numbers">2</a>
					</li>
					<li>
						<span class="page-numbers current">3</span>
					</li>
					<li>
						<a href="#" class="page-numbers next">Next</a>
					</li>
				</ul>
			</div>
		</div>

		<div class="col-md-7 sidebar-wrapper">
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
									<li class="item col-xs-8">
										<div class="image">
											<a href="single.html">
												<img src="img/sidebar-listing-1.jpg" alt="listing image" />
											</a>
										</div>

										<h5 class="title">
											<a href="single.html">Grand Hotel</a>
										</h5>
										<p class="address">LA 544</p>
										<span class="price">$150</span>
									</li>

									<li class="item col-xs-8">
										<div class="image">
											<a href="single.html">
												<img src="img/sidebar-listing-2.jpg" alt="listing image" />
											</a>
										</div>

										<h5 class="title">
											<a href="single.html">Grand Hotel</a>
										</h5>
										<p class="address">LA 544</p>
										<span class="price">$150</span>
									</li>

									<li class="item col-xs-8">
										<div class="image">
											<a href="single.html">
												<img src="img/sidebar-listing-3.jpg" alt="listing image" />
											</a>
										</div>

										<h5 class="title">
											<a href="single.html">Grand Hotel</a>
										</h5>
										<p class="address">LA 544</p>
										<span class="price">$150</span>
									</li>

									<li class="item col-xs-8">
										<div class="image">
											<a href="single.html">
												<img src="img/sidebar-listing-4.jpg" alt="listing image" />
											</a>
										</div>

										<h5 class="title">
											<a href="single.html">Grand Hotel</a>
										</h5>
										<p class="address">LA 544</p>
										<span class="price">$150</span>
									</li>

									<li class="item col-xs-8">
										<div class="image">
											<a href="single.html">
												<img src="img/sidebar-listing-5.jpg" alt="listing image" />
											</a>
										</div>

										<h5 class="title">
											<a href="single.html">Grand Hotel</a>
										</h5>
										<p class="address">LA 544</p>
										<span class="price">$150</span>
									</li>

									<li class="item col-xs-8">
										<div class="image">
											<a href="single.html">
												<img src="img/sidebar-listing-6.jpg" alt="listing image" />
											</a>
										</div>

										<h5 class="title">
											<a href="single.html">Grand Hotel</a>
										</h5>
										<p class="address">LA 544</p>
										<span class="price">$150</span>
									</li>
								</ul>
							</div>
						</div>

						<div class="col-md-24 col-sm-12 col-xs-24 isotope-item">
							<div class="sidebar-widget widget_categories">
								<h4 class="widget-title">Category</h4>

								<ul>
									<li><a href="#">Properties</a></li>
									<li><a href="#">Hotel</a></li>
									<li><a href="#">White</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-24 col-sm-12 col-xs-24 isotope-item">
							<div class="sidebar-widget widget_popular_listing">
								<h4 class="widget-title">Popular listing</h4>

								<ul class="popular-listing">
									<li class="list-item">
										<div class="photo">
											<a href="single.html">
												<img src="img/sidebar-popular-1.jpg" alt="sidebar popular" />
											</a>
										</div>

										<h4><a href="single.html">VIP Room in NY luxury hotel</a></h4>
										<p class="price">$235 per day</p>
										<a class="link" href="single.html">View</a>
									</li>

									<li class="list-item">
										<div class="photo">
											<a href="single.html">
												<img src="img/sidebar-popular-2.jpg" alt="sidebar popular" />
											</a>
										</div>

										<h4><a href="single.html">VIP Room in NY luxury hotel</a></h4>
										<p class="price">$235 per day</p>
										<a class="link" href="single.html">View</a>
									</li>

									<li class="list-item">
										<div class="photo">
											<a href="single.html">
												<img src="img/sidebar-popular-3.jpg" alt="sidebar popular" />
											</a>
										</div>

										<h4><a href="single.html">VIP Room in NY luxury hotel</a></h4>
										<p class="price">$235 per day</p>
										<a class="link" href="single.html">View</a>
									</li>
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
	</div>
</section>
</div>

<!-- Footer -->
<footer>
	<div class="container">
		<div class="footer-widgets">
			<div class="row">
				<div class="col-md-9">
					<div class="footer-widget widget_info">
						<div class="widget-body">
							<img src="img/logo.png" alt="realtor logo" />

							<p>Duis vel eros mi. Nunc eu sem dolor. Nulla venenatis, augue at rhoncus tincidunt, nisi dolor fringilla nibh, sed tristique quam leo vel arcu. Sed ultricies, odio vel aliquet ultricies, turpis ipsum ultrices massa, vitae pulvinar nibh erat</p>

							<ul class="social-block">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-youtube"></i></a></li>
							</ul>
						</div>
					</div>
				</div>

				<div class="col-md-9">
					<div class="footer-widget widget_most_viewed">
						<h4 class="widget-title">Most viewed</h4>

						<div class="widget-body">
							<div class="most-viewed-property">
								<div class="image">
									<a href="single.html">
										<img src="img/most-viewed-prop-1.jpg" alt="most viewed" />
									</a>
								</div>
								<h2><a href="single.html">Grand hotel</a></h2>
								<p class="price">$450</p>
								<ul class="rating">
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star-o"></i></li>
									<li><i class="fa fa-star-o"></i></li>
								</ul>
							</div>

							<div class="most-viewed-property">
								<div class="image">
									<a href="single.html">
										<img src="img/most-viewed-prop-2.jpg" alt="most viewed" />
									</a>
								</div>
								<h2><a href="single.html">Golden vip room</a></h2>
								<p class="price">$450</p>
								<ul class="rating">
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star-o"></i></li>
									<li><i class="fa fa-star-o"></i></li>
								</ul>
							</div>

							<div class="most-viewed-property">
								<div class="image">
									<a href="single.html">
										<img src="img/most-viewed-prop-1.jpg" alt="most viewed" />
									</a>
								</div>
								<h2><a href="single.html">Grand hotel</a></h2>
								<p class="price">$450</p>
								<ul class="rating">
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star-o"></i></li>
									<li><i class="fa fa-star-o"></i></li>
								</ul>
							</div>

							<div class="most-viewed-property">
								<div class="image">
									<a href="single.html">
										<img src="img/most-viewed-prop-2.jpg" alt="most viewed" />
									</a>
								</div>
								<h2><a href="single.html">Golden vip room</a></h2>
								<p class="price">$450</p>
								<ul class="rating">
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star"></i></li>
									<li><i class="fa fa-star"></i></li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-6">
					<div class="footer-widget widget_contact">
						<h4 class="widget-title">Contact info</h4>

						<div class="widget-body">
							<ul class="contact-info">
								<li class="phone">
									<p>012 125 856 587</p>
								</li>
								<li class="mail">
									<p><a href="#">Info@realtor.com</a></p>
								</li>
								<li class="location">
									<p>Realtor office<br />22 Pink Road<br />Holliday city, La 2211</p>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="copyrigts">
			<p>Copyrights 2015. Designed by <a href="https://www.teslathemes.com/" target="blank">TeslaThemes</a></p>
		</div>
	</div>
</footer>
</div>

<!-- Scripts -->
<script src="http://maps.googleapis.com/maps/api/js"></script>
<script src="js/infobox.js"></script>
<script src="js/jquery.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/bxslider.js"></script>
<script src="js/marquee.js"></script>
<script src="js/nouislider.js"></script>
<script src="js/modernizr.js"></script>
<script src="js/imagesloaded.js"></script>
<script src="js/smooth-scroll.js"></script>
<script src="js/owl-carousel.js"></script>
<script src="js/isotope.js"></script>
<script src="js/theia.js"></script>
<script src="js/lightbox.js"></script>
<script src="js/options.js"></script>
</body>

<!-- Mirrored from teslathemes.com/demo/html/realtor/blog.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Sep 2016 03:25:04 GMT -->
</html>
