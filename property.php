<?php
require_once("includes/initialize.php");
if(!empty($_POST['rating'])){
	require_once 'ajax/rater.php';
}
require_once("parts/header.php");
$property=Property::find_by_id($_GET['property']);
$property->get_details();
$property->get_picture('',20);
?>
<!-- Single Property Container -->
<section class="single-property-container">
	<div class="container">
		<div class="section-header no-icon">
			<h1><?php echo $property->name; ?></h1>
			<p><?php echo $property->detail; ?></p>
			<?php
			if($session->logged()){
				echo "
				<p class=\"text-info\"> Rate : 0%</p>
				<div class=\"rating-box\" id=\"rater\">
				<i data-held=\"1\" class=\"fa fa-star-o\"></i>
				<i data-held=\"2\" class=\"fa fa-star-o\"></i>
				<i data-held=\"3\" class=\"fa fa-star-o\"></i>
				<i data-held=\"4\" class=\"fa fa-star-o\"></i>
				<i data-held=\"5\" class=\"fa fa-star-o\"></i>
				</div>";
			}
			?>
		</div>

		<div class="row main-wrapper">
			<div class="col-md-17 col-xs-24 col">
				<div class="main-info">
					<div class="row">
						<div class="col-sm-15">
							<div class="item-cover">
								<div class="cover-photos">
									<ul class="slides">
										<?php
										foreach($property->pix as $picture){
											echo "	<li>
											<a href=\"$picture->item_cover\" data-lightbox=\"Properties\">
											<i class=\"icon\"></i>
											</a>
											<img src=\"$picture->item_cover\" alt=\"$property->name cover\" />
											</li>
											";
										}
										?>

									</ul>
								</div>

								<div class="thumbnail-carousel">
									<ul class="slides">
										<?php
										$count=0;
										foreach($property->pix as $picture){

											echo "	<li><a data-slide-index=\"$count\" href=\"#\"><img src=\"$picture->item_cover\" alt=\"$property->name cover\" /></a></li>
											";
											$count++;
										}
										?>

									</ul>
								</div>
							</div>

							<?php
							if($property->get_picture('',1,'id',"type='video'",true)){
								//test the video link later
								echo "
								<div class=\"featured-video\">
								<div class=\"cover visible\">
								<button class=\"start-media\">
								<i class=\"fa fa-play\"></i>
								</button>
								</div>
								<div class=\"embed-responsive embed-responsive-4by3\">
								<iframe src=\"https://player.vimeo.com/video/50457458?title=0&amp;byline=0&amp;portrait=0\" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
									</div>
									</div>
									";
								}
								?>

								<!-- Comments Area -->
								<div class="comments-area">
									<div class="section-header small">
										<h2>Review</h2>
										<p>our visitors decided to share the impressions of visit of this hotel</p>
									</div>

									<!-- Comments List -->
									<div class="commments-wrapper">
										<ul class="comments-list">
											<?php
											$comments=Comment::find_on('Property',$property->id);
											foreach($comments as $comment){
												echo "
												<li class=\"comment\">
												<div class=\"user\">
												<img src=\"".$comment->pix()."\" alt=\"$comment->name avatar\" />
												</div>

												<div class=\"comment-body\">
												<div class=\"message\">
												<p>$comment->comment</p>
												</div>

												<div class=\"comment-info\">
												<p class=\"author\">$comment->name</p>
												<p class=\"date\">".$comment->age()."</p>
												<a href=\"#\" class=\"reply-link\">Reply</a>
												</div>
												</div>
												</li>";
											}
											?>
										</ul>
									</div>

									<!-- Response Form -->
									<form class="comment-form" action="process/respond.php" method="post">
										<div class="form-body clearfix">
											<div class="message">
												<input type="hidden" name="item_type" value="Property" />
												<input type="hidden" name="item_id" value="<?php echo $property->id;?>" />
												<textarea class="js-input form-input" name="comment" placeholder="Leave a comment"></textarea>
											</div>
											<?php
											if(!$session->logged()){
												echo "
												<div class=\"row row-fit\">
												<div class=\"col-sm-12\">
												<input type=\"text\" name=\"name\" class=\"js-input form-input\" placeholder=\"Enter your name\" />
												</div>
												<div class=\"col-sm-12\">
												<input type=\"text\" name=\"email\" class=\"js-input form-input\" placeholder=\"Enter your email address\" />
												</div>
												</div>
												";

											}
											?>
											<button type="submit" value="comment" name="action" class="submit-button" >POST</button>
										</div>
									</form>
								</div>
							</div>

							<div class="col-sm-9">
								<div class="property-description-box">
									<div class="property-description">
										<div class="rating-box">
											<?php
											echo $property->displayed_rating();
											?>
										</div>

										<h4><?php echo $property->name; ?></h4>
										<p class="address"><?php echo $property->code_name(); ?></p>

										<div class="services">
											<p class="caption">Services</p>
											<ul>
												<?php
												foreach($property->property_non_boolean as $non_bool) {
													echo "
													<li><p class=\"".$non_bool['code_name']."\">".$non_bool['screen_name']." <span>".$non_bool['value_held']."</span></p></li>
													";
												}
												;?>		</ul>
											</div>

											<div class="price">
												<p>$<?php echo $property->price ;?> <span><?php echo $property->transaction(); ?></span></p>
											</div>
										</div>
									</div>

									<div class="text-description">
										<div class="section-header small">
											<h2>Description</h2>
										</div>

										<p><?php echo $property->detail ; ?></p>

										<div class="features">
											<h4>Features</h4>
											<p>additional services</p>
											<div class="accordion-group">

												<?php
												foreach($property->additional() as $additional){
													echo "
													<div class=\"accordion\">
													<h4 class=\"heading\">".$additional['title']."</h4>
													<div class=\"body\">
													<p>".$additional['body']."</p>
													</div>
													</div>
													";

												}
												;
												?>
											</div>
										</div>

										<p>Duis vel eros mi. Nunc eu sem dolor. Nulla venenatis, augue at rhoncus tincidunt, nisi dolor fringilla nibh, sed tristique quam leo vel arcu. Sed ultricies, odio vel aliquet ultricies, turpis ipsum ultrices massa, vitae pulvinar nibh erat</p>
									</div>

									<div class="widget_latest_listing">
										<p class="heading">Similar properties</p>

										<ul class="listing-items row row-fit-10">
											<?php
											$similar=$property->fetch_similar(6);
											foreach($similar as $similar_property){
												$similar_property->get_picture();
												echo "
												<li class=\"item col-xs-8\">
												<div class=\"image\">
												<a href=\"".$similar_property->link()."\">
												<img src=\"".$similar_property->pix->sidebar_listing."\" alt=\"$similar_property->name image\" />
												</a>
												</div>

												<h5 class=\"title\">
												<a href=\"".$similar_property->link()."\">$similar_property->name</a>
												</h5>
												<p class=\"address\">LA 544</p>
												<span class=\"price\">\$$similar_property->price</span>
												</li>
												";
											}
											?>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-7 col-xs-24 col">
						<div class="row">
							<div class="col-sm-12 col-md-24">
								<div class="map-info">
									<div class="map-canvas">
										<div id="map-canvas" data-property-id="<?php echo $property->id ; ?>"></div>
									</div>
								</div>
							</div>

							<div class="col-sm-12 col-md-24">
								<div class="property-agent">
									<div class="agent">
										<h2 class="caption">Contact the agent</h2>
										<p class="position">agent</p>
										<?php
										$agent=Agent::find_by_id($property->agent_id);
										$pix=$agent->get_picture('list');

										echo "
										<div class=\"image\">
										<a href=\"".$agent->link()."\">
										<img src=\"".$pix."\" alt=\"".$agent->name()." agent photo\" />
										</a>
										</div>
										";


										echo "<h3><a href=\"".$agent->link()."\">".$agent->name()."</a></h3>";
										?>



										<ul class="social-block">
											<?php
											echo $agent->show_social('<li>');
											?>
										</ul>

										<form class="simple-form" action="process/respond.php" method="post">
											<?php
											if(!$session->logged()){
												echo "
												<input type=\"text\" name=\"name\" class=\"js-input\" placeholder=\"Full name\" />
												<input type=\"text\" name=\"email\" class=\"js-input\" placeholder=\"Email\" />
												";
											}
											?>
											<input type="text" name="subject" class="js-input" placeholder="Subject" />
											<textarea class="js-input" name="message" placeholder="Message"></textarea>
											<button type="submit" name="action" value="contact_agent" class="submit-btn">Write</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

	<?php
	require_once("parts/footer.php");
