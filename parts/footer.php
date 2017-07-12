
		<!-- Footer -->
		<footer>
			<div class="container">
				<div class="footer-widgets">
					<div class="row">
						<div class="col-md-9">
							<div class="footer-widget widget_info">
								<div class="widget-body">
									<img src="img/logo.png" alt="realtor logo" />

									<p><?php echo $content->about ; ?></p>

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
								<?php
								$most_viewed=Property::fetch(4,'views');
								foreach($most_viewed as $trending_property) {
									$pix=$trending_property->get_picture('sidebar_popular');
									echo "				
									<div class=\"most-viewed-property\">";
									if(!empty($trending_property->pix)){
										echo "<div class=\"image\">
											<a href=\"".$trending_property->link()."\">
												<img src=\"".$pix."\" alt=\"most viewed\" />
											</a>
										</div>";
										}
										echo "<h2><a href=\"".$trending_property->link()."\">".$trending_property->name()."</a></h2>
										<p class=\"price\">".$trending_property->price()."</p>
										<ul class=\"rating\">".
										$trending_property->displayed_rating('<li>')."
										</ul>
									</div>
";
								}
								?>
						
								</div>
							</div>
						</div>

						<div class="col-md-6">
							<div class="footer-widget widget_contact">
								<h4 class="widget-title">Contact info</h4>

								<div class="widget-body">
									<ul class="contact-info">
									<?php
									echo "<li class=\"phone\">";
										
									echo 	"<p>$content->phone</p>";
									echo "	</li>
										<li class=\"mail\">
											<p><a href=\"mailto:$content->email\">$content->email</a></p>
										</li>
										<li class=\"location\">
											<p>$content->address</p>
										</li>
										" ?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="copyrigts">
					<p>&copy Copyrights <?php echo date('Y') ; ?>. Designed by <a href="https://www.horizondesigners.com/" target="blank">Horizon Designers</a></p>
				</div>
			</div>
		</footer>
	</div>

	<!-- Scripts -->
	<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAUcvZywDrn5TSC1C00n0M9JcdTnogYRFE"></script> 
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
	<script src="js/dynamic.php"></script>
	<script src="js/options.js"></script>
	<script src="js/private.js"></script>
</body>

</html>