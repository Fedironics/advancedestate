<?php
require_once "includes/initialize.php";
require_once "parts/header.php";
$page = new pagination(8,Blog::last_count());
?>

<!--  Blog Section -->
<section class="blog-section">
	<div class="row">
		<div class="col-lg-16 col-md-17 blog-content-wrapper">
			<div class="blog-content">
				<div class="row row-fit-10">
					<?php
					$blogposts = Blog::select($page->limit());
					foreach ($blogposts as $blogpost) :
						$author= User::find_by_id($blogpost->author_id);
						$author_pix= $author->get_picture('author_small');
						$blog_pix = $blogpost->get_picture('featured_post');
						?>



						<div class="col-md-12">
							<div class="blog-post sticky post-with-image">
								<div class="post-body">
									<div class="blog-post-meta">
										<div class="post-cover">
											<a href="<?php echo $blogpost->link(); ?>">
												<img src="<?php echo $blog_pix;?>" alt="featured blogpost cover" />
											</a>
										</div>

										<div class="post-author">
											<div class="image">
												<img src="<?php echo $author_pix; ?>" alt="<?php echo $author->name(); ?> blog author" />
											</div>

											<p><?php echo $author->name(); ?></p>
										</div>
									</div>
									<h2 class="post-title"><a href="<?php echo $blogpost->link(); ?>"><?php echo ucwords($blogpost->title) ; ?></a></h2>

									<p><?php echo $blogpost->body ; ?> </p>

									<div class="post-meta">
										<ul class="meta">
											<li class="date"><?php echo $blogpost->time() ; ?></li>
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
				<?php
				echo $page->show_next();
				?>
			</div>
		</div>

	<?php
	_sidebar('sidebar-wrapper');
	 ?></div>
</section>
</div>

<?php
require_once("parts/footer.php");
