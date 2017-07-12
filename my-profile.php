<?php
require_once("includes/initialize.php");
if(!$session->logged())redirect_to("index.php?login");
$user=Agent::find_by_id($session->get_user_id());
if(!empty($_POST['submit']) && $_POST['submit']=='UpdateProfile'){
foreach($_POST as $param=>$value){
    $_POST[$param]=$database->escape_value($value);
}
$user->first_name=$_POST['first_name'];
$user->last_name=$_POST['last_name'];
$user->email=$_POST['email'];
if(!empty($_POST['password'])){
	if($_POST['password']!=$_POST['password1'])
	$session->message($e[3]);
	else $user->password=$_POST['password'];
}
$user->phone=$_POST['phone'];
$user->about=$_POST['about'];
$user->set_picture($_FILES['profile_pix']);
$user->save();
redirect_to();
}
require_once("parts/header.php");
?>		
<!-- User Account Section -->
			<section class="user-account-section">
				<div class="container">
					<div class="user-account-tabs">
						<!-- Menu Controlls -->
						<ul class="heading">
							<li><a class="profile" href="#profile"><span>My Profile</span></a></li>
							<li><a class="submit" href="#submit"><span>Submit new property</span></a></li>
							<li><a class="properties" href="#properties"><span>My Properties</span></a></li>
						</ul>

						<!-- Body -->
						<div class="tabs-body">
							<div class="main-loader">
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

							<div id="profile">
								<form class="update-form" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
									<div class="row">
										<div class="col-md-11">
											<input type="text" class="js-input" value="<?php echo $user->first_name; ?>" id="firstName" name="first_name" placeholder="Enter your First Name" />
											<input type="text" class="js-input" value="<?php echo $user->last_name; ?>" id="lastName"  name="last_name" placeholder="Enter your Last Name" />
										<!--	<input type="text" class="js-input" name="user_name" placeholder="Enter your Username" /> -->
											<input type="text" class="js-input" value="<?php echo $user->email; ?>" id="email" name="email" placeholder="Enter your Email" />

											<div class="row row-fit-10">
												<div class="col-sm-12">
													<input type="text" class="js-input" id="password" name="password" placeholder="Password" />
												</div>
												<div class="col-sm-12">
													<input type="text" class="js-input" id="password1" name="password1" placeholder="Repeat the password" />
												</div>
											</div>
										</div>
										<div class="col-md-10 col-md-offset-1">
											<div class="photo-upload">
												<a href="javascript:document.getElementById('upload').click()" class="upload-btn">
													<i class="icon icon-folder4"></i>
												</a>
												<img src="img/profile-avatar.jpg" alt="user photo" />
												<br />
												<input type='file' style="display:none" name='profile_pix' id='upload' />
												<a class="upload-link" href="javascript:document.getElementById('upload').click()">Add your photo</a>
											</div>
										</div>
									</div>

									<p>Profile Information</p>
									<div class="row row-fit-10">
										<div class="col-sm-11">
											<div class="row row-fit-10">
												<div class="col-sm-12">
													<div class="social-input phone">
														<input type="text" value="<?php echo $user->phone; ?>" name="phone" class="js-input" placeholder="Phone" />
													</div>
													<div class="social-input facebook">
														<input type="text" class="js-input social facebook" placeholder="Facebook" />
													</div>
												</div>
												<div class="col-sm-12">
													<div class="social-input skype">
														<input type="text" class="js-input" placeholder="Skype" />
													</div>
													<div class="social-input twitter">
														<input type="text" class="js-input" placeholder="Twitter" />
													</div>
												</div>
											</div>
										</div>

										<div class="col-sm-13">
											<textarea class="js-input" name="about" placeholder="Other information"><?php echo $user->about; ?></textarea>
										</div>
									</div>

									<button class="update-btn" type="submit" name="submit" value="UpdateProfile" >Update your profile</button>
								</form>
							</div>

							<div id="submit">
								<form id="newProperty" class="submit-form" enctype="multipart/form-data" action="process/property.php" method="post">
									<div class="row">
										<div class="col-md-11">
											<input id="propertyTitle" type="text" name="title" class="js-input" placeholder="Title" />
											<textarea id="propertyDescription" class="js-input" name="description" placeholder="Description"></textarea>

											<div class="country-select select-box type-2">
												<input id="countries" name="country" class="js-input no-select" type="text" readonly value="" placeholder="All Countries" />
												<ul>
													<li>All Countries</li>
													<li data-value="0">Nigeria</li>
													<li data-value="1">U.S.A</li>
												
												</ul>
											</div>
											<div class="state-select select-box type-2">
												<input id="state" class="js-input no-select" name="state" type="text" readonly value="" placeholder="All States" />
												<ul id="states">
													<li value="all">All States</li>
												
												</ul>
											</div>

											<div class="city-select select-box type-2">
												<input class="js-input no-select" name="city" type="text" readonly value="" placeholder="All cities" />
												<ul id="cities">
													<li>All cities</li>												
																							
												</ul>
											</div>

											<input type="text" name="street" id="address" class="js-input" placeholder="Address (street/ house/ ap.)" />

											<div class="row row-fit-10">
												<div class="col-sm-12">
													<input id="propertyPrice" type="text" name="price" class="js-input nr-only" placeholder="Price $" />
												</div>
												<div class="col-sm-12">
													<input id="propertyArea" type="text" name="area" class="js-input nr-only" placeholder="Area (sq ft)" />
												</div>
											</div>
										</div>
										
										<div class="col-md-13 col-lg-offset-1 col-lg-12">
											<div class="photo-upload">
												<a href="javascript:document.getElementById('propertyPix').click()" class="upload-btn">
													<i class="icon icon-folder4"></i>
												</a>
												<img src="img/profile-avatar.jpg" alt="user photo" />

												<br />
												<input type="file" name="files[]" id="propertyPix" multiple style="display:none"/>
												<a class="upload-link" href="javascript:document.getElementById('propertyPix').click()">Add your photo</a>
											</div>

											<div class="location-on-map">
												<div class="map-canvas" id="location-map"></div>
											</div>
										</div>
									</div>

									<div class="row comodities">
										<div class="col-md-11">
											<div class="row">
												<div class="filters">
													<div class="col-sm-12">
														<div class="select-filter">
															<label>
																<input type="radio" value="1" name="intended" />
																<span>For rent</span>
															</label>
														</div>

														<div class="select-filter">
															<label>
																<input type="radio" value="2" name="intended" />
																<span>For Sale</span>
															</label>
														</div>			
														<div class="select-filter">
															<label>
																<input type="radio" value="3" name="intended" />
																<span>For Sale/Rent</span>
															</label>
														</div>	
													</div>
					<div class="col-sm-12">
														<div class="select-filter">
															<label>
																<input type="radio" value="1" name="category" />
																<span>House</span>
															</label>
														</div>

														<div class="select-filter">
															<label>
																<input type="radio" value="2" name="category" />
																<span>Flat/Apartment</span>
															</label>
														</div>			
														<div class="select-filter">
															<label>
																<input type="radio" value="3" name="category" />
																<span>Land</span>
															</label>
														</div>	
													</div>

													<div class="col-sm-12">
																<?php
										$numbers=DatabaseTable::get_table('property_non_boolean',15);
										foreach($numbers as $number){
											if($number->code_name=='area') continue;
											echo "
														<div class=\"nr-filter\">
															<p class=\"caption\">$number->screen_name</p>
															<div class=\"block\">
																<span class=\"action substract\">-</span>
																<input type=\"text\" name=\"$number->code_name\" class=\"nr-only\" value=\"1\" />
																<span class=\"action add\">+</span>
															</div>
														</div>";
										}

										?>
							

				</div>
												</div>
											</div>
										</div>

										<div class="col-md-13">
										<?php
										$checks=DatabaseTable::get_table('property_boolean',15);
										foreach($checks as $check){
											echo "
											<div class=\"check-option\">
												<label>
													<input type=\"checkbox\" name=\"$check->code_name\" />
													<span>$check->screen_name</span>
												</label>
											</div>";
										}

										?>


										</div>
									</div>

									<button id="addProperty" class="button theme-button-2" type="submit" value="">Submit your property</button>
								</form>
							</div>

							<div id="properties">
								<div class="row row-fit-10">
									<?php 
									$properties=$user->get_properties(8);
									foreach($properties as $property){
										$pix=$property->get_picture('my_properties');
										$property->get_detail('property_non_boolean');
													
										echo "
										<div class=\"col-lg-6 col-md-8 col-sm-12\">
										<div class=\"listing-item\">
											<div class=\"item-cover type-1\">
												<div class=\"cover\">
													<p>$property->detail</p>

													<a href=\"".$property->link()."\">
														<i class=\"icon\"></i>
													</a>
												</div>
												<img src=\"$pix\" alt=\"item cover\" />
											</div>

											<div class=\"item-body\">
												<div class=\"block services\">
													<p class=\"caption\">Services</p>
													<ul>";
													foreach($property->property_non_boolean as $has_value){
														echo "
														<li class=\"".$has_value['code_name']."\">".$has_value['screen_name'].": <span>".$has_value['value_held']."</span></li>";
													}
												echo "</ul>
												</div>

												<div class=\"block location-info\">
													<div class=\"location\">
														<h3>
															<a href=\"".$property->link()."\">$property->name</a>
														</h3>
														<p>".$property->code_name()."</p>
													</div>

													<div class=\"price\">
														<p>".$property->price()." <span>".$property->transaction()."</span></p>
													</div>
												</div>
											</div>
										</div>
									</div>";
									}
							?>		
									

								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
<?php 
require_once("parts/footer.php");
