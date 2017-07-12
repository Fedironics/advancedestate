<?php
require_once("includes/initialize.php");
if(isset($_GET['agent'])){
	if($agent=Agent::find_by_id($_GET['agent']))
	{

	}
	else{
		redirect_to(SITE_LOC.'/agents.php');
	}
}	else{
		redirect_to(SITE_LOC.'/agents.php');
	}
require_once("parts/header.php");
$pix=$agent->get_picture('large');


 ?>		<!--  Single Agent Section -->
			<section class="single-agent">
				<div class="container">
					<div class="row">
						<div class="col-lg-16 col-md-17">
							<!-- Agent Info -->
							<div class="agent single">
								<div class="row row-fit">
									<div class="col-sm-15">									
										<div class="image">
											<img src="<?php echo $pix ; ?>" alt="agent photo" />
										</div>
									</div>

									<div class="col-sm-9">
										<div class="description">
											<h3><a href="agent.html"><?php echo "$agent->first_name $agent->last_name " ; ?></a></h3>
											<p class="position">agent</p>

											<ul class="social-block">
										<?php 
										echo $agent->show_social('<li>') ;
										?>
												</ul>

											<p><?php echo $agent->about ; ?></p>
										</div>
									</div>
								</div>
							</div>

							<!-- Agent's Properties -->
							<div class="listed-properties">
								<div class="section-header les-padding">
									<h1>Currently listed properties by <?php echo $agent->first_name ; ?></h1>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam nec viverra erat. Aenean elit tellus mattis quis maximus et malesuada congue velit</p>
								</div>

								<div class="row row-fit-10">
								<?php
								$agent_properties=$agent->get_properties(6);
								foreach($agent_properties as $agent_property){
								echo "
								<div class=\"col-sm-12 col-md-8\">
										<div class=\"agent-property\">
											<div class=\"cover\">
												<div class=\"hover\">
													<div class=\"text\">
														<a href=\"".$agent_property->link()."\">Info</a>
														<p>$agent_property->detail</p>
													</div>
												</div>

												<img src=\"".$agent_property->get_picture("agent_property")."\" alt=\"$agent_property->name list property\" />
											</div>

											<div class=\"property-body\">
												<h4><a href=\"".$agent_property->link()."\">$agent_property->name</a></h4>
												<p>LA 544</p>
												<span>".$agent_property->price()."</span>
											</div>
										</div>
									</div>"	;
								}
								?>
					
								</div>
							</div>

							<!-- Comment Form -->
							<div class="comment-form-wrapper">
								<div class="section-header small">
									<h2>Contact the agent</h2>
									<p>Our visitors decided to share the impressions of visit of this hotel</p>
								</div>

								<form class="comment-form" method="POST" action="process/respond.php">
									<div class="form-body clearfix">
										<div class="message">
											<textarea name="comment" class="js-input form-input" placeholder="Leave a comment"></textarea>
										</div>
										<?php
										if(!$session->logged()){
											echo "
												<div class=\"row row-fit\">
											<div class=\"col-sm-12\">
												<input name=\"name\" type=\"text\" class=\"js-input form-input\" placeholder=\"Enter your name\" />
											</div>
											<div class=\"col-sm-12\">
												<input name=\"email\" type=\"text\" class=\"js-input form-input\" placeholder=\"Enter your email address\" />
											</div>
										</div>";
										}
										?>
									

										<button type="submit" name="contact_agent" value="post" class="submit-button" >POST</button>
									</div>
								</form>
							</div>
						</div>

	<?php
	require_once("parts/sidebar.php");
	?>
					</div>
				</div>
			</section>
		</div>

	<?php
	require_once("parts/footer.php");
