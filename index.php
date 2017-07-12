<?php
require_once "includes/initialize.php";
require_once "parts/header.php";
?>
			<!-- Properties Map Section -->
			<section class="properties-map">
				<div class="row row-fit">
					<div class="col-md-9 col-lg-7">
						<div class="map-filter-box">
							<div class="box-caption">
								<h4>Search</h4>
								<p>Where are you looking?</p>
							</div>

							<div>
								<input name="location" class="filter-box-input js-input " type="text" value="" placeholder="Enter A Location" />
							</div>							
							<div class="select-box">
								<input name="type-select" class="filter-box-input js-input no-select" type="text" readonly value="" placeholder="For sale" />
								<ul>
									<li data-value="1">For Sale</li>
									<li data-value="2">Renting</li>
									<li data-value="3">Sale/Renting</li>
								</ul>
							</div>

							<div class="select-box">
								<input name="category" class="filter-box-input js-input no-select" type="text" readonly value="" placeholder="All types" />
								<ul>
									<li data-value="">All types</li>
									<li data-value="1">Houses</li>
									<li data-value="2">Apartments</li>
									<li data-value="3">Land</li>
								</ul>
							</div>

							<div class="select-box">
								<input class="filter-box-input js-input no-select" type="text" readonly value="" placeholder="All cities" />
								<ul>
									<?php
												$states= DatabaseTable::get_table('states',100);
												foreach ($states as $key => $state) {
													echo "<li data-value=\"$state->id\">$state->name</li>";
												}

												?>
								</ul>
							</div>
							<?php 
							$places=DatabaseTable::get_table('property_non_boolean',4);
							$no=count($places);
							$count=0;
							foreach($places as $place){
									if(is_even($count))echo "<div class=\"row row-fit-10\">";
								echo "
								<div class=\"col-xs-12\">
									<input class=\"filter-box-input js-input nr-only\" name=\"$place->code_name\" type=\"text\" placeholder=\"Min $place->screen_name\" />
								</div>";
								if(!is_even($count) || $count==($no-1))echo "</div>";
								$count++;
							}
							?>



							<div class="price-box">
								<p class="caption"><i>Price</i> &#40;<?php echo Property::$sign;?><span class="min"></span> - <?php echo Property::$sign;?><span class="max"></span>&#41;</p>

								<div class="price-slider" data-min="<?php echo Property::convert(0)?>" data-max="<?php echo Property::convert(20000)?>" data-start="<?php echo Property::convert(2500)?>" data-stop="<?php echo Property::convert(11000)?>" data-step="<?php echo Property::convert(500)?>"></div>

								<div class="price-limits clearfix">
									<span class="lower"><?php echo Property::$sign;echo Property::convert(0)?></span>
									<span class="upper"><?php echo Property::$sign;echo Property::convert(20000)?></span>
								</div>
							</div>

							<a href="#" id="index_find_property" class="button theme-button-1 update-properties">Find Property</a>
						</div>
					</div>

					<div class="col-md-15 col-lg-17">
						<!-- Map Popup -->
						<div id="property-popup" class="property-popup">
							<i class="close-popup icon-cross2"></i>
							<div class="popup-loader">
								<div class="spinner">
									<div class="spinner-container container1">
										<div class="circle1"></div>
										<div class="circle2"></div>
										<div class="circle3"></div>
										<div class="circle4"></div>
									</div>
									<div class="spinner-container container2">
										<div class="circle1"></div>
										<div class="circle2"></div>
										<div class="circle3"></div>
										<div class="circle4"></div>
									</div>
									<div class="spinner-container container3">
										<div class="circle1"></div>
										<div class="circle2"></div>
										<div class="circle3"></div>
										<div class="circle4"></div>
									</div>
								</div>
							</div>
							<div class="popup-cover">
								<a href="#">
									<img src="img/map-card.jpg" alt="popup cover" />
								</a>
							</div>
							<div class="popup-body">
								<h2><a href="#">Penthouse bar</a></h2>
								<p>Manhattan 125 off 55</p>

								<span class="price">$500</span>
								<a class="propery-page" href="#">
									<i class="fa fa-angle-right"></i>
								</a>
							</div>
						</div>

						<!-- Loader -->
						<div class="map-loader">
							<div class="spinner">
								<div class="spinner-container container1">
									<div class="circle1"></div>
									<div class="circle2"></div>
									<div class="circle3"></div>
									<div class="circle4"></div>
								</div>
								<div class="spinner-container container2">
									<div class="circle1"></div>
									<div class="circle2"></div>
									<div class="circle3"></div>
									<div class="circle4"></div>
								</div>
								<div class="spinner-container container3">
									<div class="circle1"></div>
									<div class="circle2"></div>
									<div class="circle3"></div>
									<div class="circle4"></div>
								</div>
							</div>
						</div>

						<!-- Map Canvas -->
						<div class="map" id="map-canvas"></div>
					</div>
				</div>
			</section>

			<!-- Hot Offer Section -->
			<section class="hot-offer">
				<div class="container">
					<div class="row">
						<div class="col-sm-6">
							<div class="caption">
								<h2><i class="icon icon-home4"></i> <span>Hot Offer</span></h2>
							</div>
						</div>

						<div class="col-sm-18">
							<div class="hot-offer-slider">
								<p>
									<a href="single-full-width.html">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis viverra venenatis nisl, et venenatis nulla tincidunt non. Nulla sed dui est. Viverra venenatis nisl, et venenatis nulla tincidunt non.</a>
								</p>
							</div>
						</div>
					</div>
				</div>
			</section>

			<!-- Listing Section -->
			<section class="listing-section">
				<div class="container">
					<div class="section-header">
						<h1>Recent Listed</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam nec viverra erat. Aenean elit tellus mattis quis maximus et malesuada congue velit</p>
					</div>
				</div>

				<div class="listing-items">
					<div class="row">
					<?php
					$recent_properties=Property::fetch(4,Property::$tableName.'.id DESC');
					foreach($recent_properties as $recent_property){
						$pix=$recent_property->get_picture('listing');
						$recent_property->get_detail('property_non_boolean');
						echo"
						<div class=\"col-xs-12 col-md-8 col-lg-6\">
							<div class=\"listing-item\">
								<div class=\"item-cover type-1\">
									<div class=\"cover\">
										<p>$recent_property->detail</p>

										<a href=\"".$recent_property->link()."\">
											<i class=\"icon\"></i>
										</a>
									</div>
									<img src=\"$pix\" alt=\"item cover\" />
								</div>

								<div class=\"item-body\">
									<div class=\"block services\">
										<p class=\"caption\">Services</p>
										<ul>";
										foreach ($recent_property->property_non_boolean as $prop) {
											echo "<li class=\"".$prop['code_name']."\">".$prop['screen_name'].": <span>".$prop['value_held']."</span></li>
											";
										}

									echo "
										</ul>
									</div>

									<div class=\"block location-info\">
										<div class=\"location\">
											<h3>
												<a href=\"".$recent_property->link()."\">$recent_property->name</a>
											</h3>
											<p>".$recent_property->code_name()."</p>
										</div>

										<div class=\"price\">
											<p>".$recent_property->price()." <span>".$recent_property->transaction()."</span></p>
										</div>
									</div>
								</div>
							</div>
						</div>";
					}
					?>
				
					
					</div>
				</div>
			</section>

			<!-- Most viewed Section -->
			<section class="most-viewed-section">
				<div class="container">
					<div class="section-header">
						<h1>Most viewed</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam nec viverra erat. Aenean elit tellus mattis quis maximus et malesuada congue velit</p>
					</div>

					<ul class="most-viewed-carousel most-viewed-items">
					<?php
					$most_viewed=Property::fetch(4,'views DESC');
					$count=0;
					
					foreach($most_viewed as $high_view){
						$pix=$high_view->get_picture('most_viewed');
						$high_view->get_detail('property_non_boolean');
						$most_viewed_total=count($most_viewed);
						$count++;
						if(!is_even($count))echo "
						<li class=\"item\">";
						echo "
							<div class=\"most-viewed-item\">
								<div class=\"item-cover\">
									<div class=\"cover\">
										<div class=\"text\">
											<a href=\"".$high_view->link()."\">Info</a>
											<p>$high_view->detail</p>
										</div>
									</div>
									<img src=\"$pix\" alt=\"$high_view->name item cover\" />
								</div>

								<div class=\"item-body\">
									<ul class=\"services\">";
									foreach($high_view->property_non_boolean as $non_bool){
										echo "<li><p class=\"".$non_bool['code_name']."\">".$non_bool['screen_name'].": <span>".$non_bool['value_held']."</span></p></li>" ;
									}
										echo "</ul>

									<div class=\"location\">
										<h3>
											<a href=\"".$high_view->link()."\">".$high_view->name."</a>
										</h3>
										<p>".$high_view->code_name()."</p>

										<span class=\"price\">".$high_view->price()."</span>
									</div>
								</div>
							</div>";
							if(is_even($count) || $count=($most_viewed_total-1))echo "</li>";

								
					}
						

?>
					</ul>
				</div>
			</section>

			<!-- Agents Section -->
			<section class="agents-section">
				<div class="container">
					<div class="section-header">
						<h1>Our agents</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam nec viverra erat. Aenean elit tellus mattis quis maximus et malesuada congue velit</p>
					</div>

					<div class="row">
						<div class="col-md-10">
							<div class="agents-container">
								<ul class="agents-carousel">
								<?php
								$agents=Agent::fetch(5,'views');
								$last=count($agents);
								//pre_format($agents);
								$count=0;
								foreach($agents as $listed_agent){
									if($agents[$last-1]==$listed_agent){
										$featured=$listed_agent;
										break;
									}
									$pix=$listed_agent->get_picture('list');
									if(is_even($count)) echo "<li class=\"item\">";
									echo "
									<div class=\"agent\">
											<div class=\"image\">
												<a href=\"".$listed_agent->link()."\">
													<img src=\"$pix\" alt=\"".$listed_agent->name(). " agent photo\" />
												</a>
											</div>

											<h3><a href=\"".$listed_agent->link()."\">".$listed_agent->name()."</a></h3>
											<p class=\"position\">".$listed_agent->position()."</p>

											<ul class=\"social-block\">";
											echo $listed_agent->show_social('<li>');
											echo "
												</ul>

											<p>$listed_agent->about</p>
										</div>";
										if(!is_even($count) || $count==($last-2)) echo "</li>";
									$count++;
								}


								?>
									
								</ul>
							</div>
						</div>

						<div class="col-md-14">
						<?php
						$pix=$featured->get_picture('featured');
						echo "
						<div class=\"agent featured-agent\">
								<div class=\"row\">
									<div class=\"col-sm-10\">
										<div class=\"image\">
											<a href=\"". $featured->link()."\">
												<img src=\"$pix\" alt=\"".$featured->name()." featured agent photo\" />
											</a>
										</div>
										<h3><a href=\"".$featured->link()."\">".$featured->name()."</a></h3>
										<p class=\"position\">".$featured->position()."</p>

										<ul class=\"social-block\">";
										echo $featured->show_social('<li>');
										echo "</ul>
									</div>

									<div class=\"col-sm-14\">
										<div class=\"featured-agent-info\">
											<p>$featured->about</p>
							
										</div>
									</div>
								</div>
							</div>";

						?>
							
						</div>
					</div>
				</div>
			</section>

			<!-- Featured Blogposts -->
			<section class="featured-bloposts-section">
				<div class="bg-wrapper">
					<div class="container">
						<div class="section-header">
							<h1>From Blog</h1>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam nec viverra erat. Aenean elit tellus mattis quis maximus et malesuada congue velit</p>
						</div>

						<div class="row row-fit-10">
							<div class="col-md-12">
								<div class="blog-post sticky">
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
										<h2 class="post-title"><a href="blogpost.html">Blogpost 1</a></h2>

										<p>Duis vel eros mi. Nunc eu sem dolor. Nulla venenatis, augue at rhoncus tincidunt, nisi dolor fringilla nibh, sed tristicu.</p>

										<div class="post-meta">
											<ul class="meta">
												<li class="date">11.3</li>
												<li class="comments">&#40;2&#41;</li>
											</ul>

											<a class="post-link" href="blogpost.html">Read More</a>
										</div>
									</div>
								</div>
							</div>

							<div class="col-md-12">
								<div class="blog-post">
									<div class="post-body">
										<div class="blog-post-meta">
											<div class="post-cover">
												<a href="blogpost.html">
													<img src="img/featured-post-2.jpg" alt="featured blogpost cover" />
												</a>
											</div>

											<div class="post-author">
												<div class="image">
													<img src="img/blog-author-2.jpg" alt="blog author" />
												</div>

												<p>Andrew Doe</p>
											</div>
										</div>

										<h2 class="post-title"><a href="blogpost.html">Blogpost 2</a></h2>

										<p>Duis vel eros mi. Nunc eu sem dolor. Nulla venenatis, augue at rhoncus tincidunt, nisi dolor fringilla nibh, sed tristicu.</p>

										<div class="post-meta">
											<ul class="meta">
												<li class="date">11.3</li>
												<li class="comments">&#40;2&#41;</li>
											</ul>

											<a class="post-link" href="blogpost.html">Read More</a>
										</div>
									</div>
								</div>
							</div>

							<div class="col-md-12">
								<div class="blog-post">
									<div class="post-body">
										<div class="blog-post-meta">
											<div class="post-cover">
												<a href="blogpost.html">
													<img src="img/featured-post-3.jpg" alt="featured blogpost cover" />
												</a>
											</div>

											<div class="post-author">
												<div class="image">
													<img src="img/blog-author-3.jpg" alt="blog author" />
												</div>

												<p>Roberta Doe</p>
											</div>
										</div>

										<h2 class="post-title"><a href="blogpost.html">Blogpost 3</a></h2>

										<p>Duis vel eros mi. Nunc eu sem dolor. Nulla venenatis, augue at rhoncus tincidunt, nisi dolor fringilla nibh, sed tristicu.</p>

										<div class="post-meta">
											<ul class="meta">
												<li class="date">11.3</li>
												<li class="comments">&#40;2&#41;</li>
											</ul>

											<a class="post-link" href="blogpost.html">Read More</a>
										</div>
									</div>
								</div>
							</div>

							<div class="col-md-12">
								<div class="blog-post">
									<div class="post-body">
										<div class="blog-post-meta">
											<div class="post-cover">
												<a href="blogpost.html">
													<img src="img/featured-post-4.jpg" alt="featured blogpost cover" />
												</a>
											</div>

											<div class="post-author">
												<div class="image">
													<img src="img/blog-author-4.jpg" alt="blog author" />
												</div>

												<p>Anastasia Doe</p>
											</div>
										</div>

										<h2 class="post-title"><a href="blogpost.html">Blogpost 4</a></h2>

										<p>Duis vel eros mi. Nunc eu sem dolor. Nulla venenatis, augue at rhoncus tincidunt, nisi dolor fringilla nibh, sed tristicu.</p>

										<div class="post-meta">
											<ul class="meta">
												<li class="date">11.3</li>
												<li class="comments">&#40;2&#41;</li>
											</ul>

											<a class="post-link" href="blogpost.html">Read More</a>
										</div>
									</div>
								</div>
							</div>
						</div>

						<a class="button theme-button-2" href="blog.php">Go to blog</a>
					</div>
				</div>
			</section>
		</div>

	<?php
	require_once 'parts/footer.php';