<?php
require_once("includes/initialize.php");
if(!empty($_POST)){
	require_once 'ajax/properties.php';
}
require_once("parts/header.php");
?>
		
			<!-- Filter Section -->
			<section class="properties-filters">
				<div class="container">
					<h2 class="filters-header global-header"><a href="#"><i class="icon"></i>Filter</a></h2>

					<div class="filters-body main-body">
						<form action="?" >
						<!-- Basic Filters -->
						<div class="basic-filters">
							<div class="row">
								<div class="col-md-10 col-lg-9 col-md-offset-2 col-lg-offset-3">
									<div class="filter-block left">
										<!-- Filter Block Items -->
										<div class="filter-block-item city">
											<div class="select-box type-2">
											<input type="hidden" name="city" class="value" readonly /> 
												<input class="js-input no-select" type="text" readonly value="" placeholder="All cities" />
												<ul>
												<?php
												$states= DatabaseTable::get_table('states',100);
												foreach ($states as $key => $state) {
													echo "<li data-value=\"$state->id\">$state->name</li>";
												}

												?>
												
												</ul>
											</div>
										</div>

									   	<div class="filter-block-item price">
											<div class="price-box">
												<p class="caption"><i>Price</i> &#40;<?php echo Property::$sign;?><span class="min"></span> - $<span class="max"></span>&#41;</p>

												<div class="price-slider" data-min="<?php echo Property::convert(0);?>" data-max="<?php echo Property::convert(20000);?>" data-start="<?php echo Property::convert(0);?>" data-stop="<?php echo Property::convert(20000);?>" data-step="<?php echo Property::convert(500);?>"></div>

												<div class="price-limits clearfix">
													<span class="lower"><?php echo Property::$sign;echo Property::convert(0)?></span>
													<span class="upper"><?php echo Property::$sign;echo Property::convert(20000)?></span>
												</div>
											</div>
										</div>

										<div class="filter-block-item nr-filters">
										<?php 
										$places=DatabaseTable::get_table('property_non_boolean',4);
										foreach($places as $place){
											
											if($place->code_name=='area')continue;
											echo "
											<div class=\"nr-filter\">
												<p class=\"caption\">$place->screen_name</p>
												<div class=\"block\">
													<span class=\"action substract\">-</span>
													<input type=\"text\" name=\"$place->code_name\" class=\"nr-only\" value=\"1\" />
													<span class=\"action add\">+</span>
												</div>
											</div>";
										}										
										
										?>
										</div>
									</div>
								</div>

								<div class="col-md-10 col-lg-9">
									<div class="filter-block right">
										<!-- Filter Block Items -->
										<div class="filter-block-item type">
											<div class="select-filter">
												<label>
													<input type="radio" name="type-select" value="1" />
													<span>For rent</span>
												</label>
											</div>

											<div class="select-filter">
												<label>
													<input type="radio" name="type-select" value="2" />
													<span>For Sale</span>
												</label>
											</div>
										</div>

										<div class="filter-block-item categories">
											<div class="select-box type-2">
												<input name="category" class="value" readonly value="" type="hidden" />
												<input class="js-input no-select" type="text" readonly value="" placeholder="All categories" />
												<ul>
													<li data-value="">All categories</li>
													<li data-value="1">Apartments</li>
													<li data-value="2">Houses</li>
													<li data-value="3">Lands</li>
												</ul>
											</div>
										</div>

										<div class="filter-block-item area">
											<div class="price-box">
												<p class="caption"><i>Area</i> &#40;<span class="min"></span> - <span class="max"></span> sq ft&#41;</p>

												<div class="price-slider" data-min="0" data-max="500" data-start="0" data-stop="500" data-step="10"></div>

												<div class="price-limits clearfix">
													<span class="lower">1</span>
													<span class="upper">500</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- Advanced Filters Filters -->
						<div class="advanced-filters">
							<h2 class="filters-header"><a href="#">Advanced search <i class="icon"></i></a></h2>

							<div class="row">
								<div class="col-lg-16 col-lg-offset-4 col-md-18 col-md-offset-4">
									<div class="filters-body">
									<?php
									$advances=DatabaseTable::get_table('property_boolean',20);
									foreach($advances as $advance){
										echo "
										<div class=\"check-option\">
											<label>
												<input type=\"checkbox\" value=\"$advance->id\" name=\"$advance->code_name\" />
												<span>$advance->screen_name</span>
											</label>
										</div>";
									}
									?>


									</div>
								</div>
							</div>
						</div>

						<div class="action">
						<a href="#" class="button theme-button-2">Find property</a>
						</div>
						</form>
					</div>
				</div>
			</section>

			<!-- Properties Section -->
			<section class="properties-section">
				<div class="container">
					<div class="section-filter clearfix">
						<!-- Grid type -->
						<div class="grid-type">
							<span class="option option-grid">Grid</span>
							<div class="type-slider option-grid left">
								<span></span>
							</div>
							<span class="option option-list">List</span>
						</div>

						<!-- Sorting Options -->
						<div class="sorting-options">
							<div class="select-box type-2">
								<input class="js-input no-select" type="text" readonly value="" placeholder="Sort by" />
								<ul>
									<li>Price</li>
									<li>Area</li>
								</ul>
							</div>
						</div>
					</div>

					<div class="row row-fit-10 loader-container">
						<div class="main-loader properties-loader">
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

						<div class="ajax-target">
                        <?php
                        
                    $properties=Property::fetch(1);
                    
					foreach($properties as $property){					
                        $property->get_details();
						$property->get_picture();
							echo "						
						<div class=\"col-md-8 col-sm-12\">
								<div class=\"most-viewed-item\">
									<div class=\"item-cover\">
										<div class=\"cover\">
											<div class=\"text\">
												<a href=\"".$property->link()."\">Info</a>
												<p>$property->detail</p>
											</div>
										</div>
										<img src=\"".$property->pix->most_viewed."\" alt=\"item cover\" />
									</div>

									<div class=\"item-body\">
										<ul class=\"services\">";
										foreach($property->property_non_boolean as $non_bool) {
											echo "
											<li><p class=\"".$non_bool['code_name']."\">".$non_bool['screen_name']." <span>".$non_bool['value_held']."</span></p></li>
								";
										}
										echo "
										</ul>

										<div class=\"location\">
											<h3>
												<a href=\"".$property->link().".\">$property->name</a>
											</h3>
											<p>".$property->code_name()."</p>

											<span class=\"price\">".$property->price()."</span>
										</div>
									</div>
								</div>
							</div>
";
					}
                    ?>
						</div>
					</div>

					<?php
					$pagin= new Pagination(1,2);
					echo $pagin->show_next();
					?>

					<!-- Pagination -->
					<ul class="page-numbers">
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
			</section>
		</div>
<?php
require_once("parts/footer.php");