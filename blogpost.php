<?php
require_once("includes/initialize.php");



$blogpost = Blog::find_by_id($_GET['page']);
$author= User::find_by_id($blogpost->author_id);
$author_pix= $author->get_picture('author_small');
$blog_pix = $blogpost->get_picture('full_cover');


require_once("parts/header.php");
?>
<!--  Blog Section -->
<section class="blog-section">
  <div class="row">
    <div class="col-lg-16 col-md-17 blog-content-wrapper">
      <div class="blog-content">
        <div class="single-blogpost post-with-image">
          <!-- Post Meta -->
          <div class="post-meta">
            <h2 class="post-title"><?php echo $blogpost->title ; ?></h2>

            <ul class="meta">
              <li class="date"><?php echo $blogpost->time(); ?></li>
              <li class="comments">&#40;<?php echo $blogpost->count_comments(); ?>&#41;</li>
            </ul>
          </div>

          <!-- Post Cover -->
          <div class="post-cover">
            <img src="<?php echo $blog_pix; ?>" alt="post cover" />
          </div>

          <!-- Post Body -->
          <div class="post-body">
            <?php echo $blogpost->body ; ?>
            <!-- Tags -->
            <div class="tags">
              <!--please add tags futhermore -->
              <p>Tags: <a href="#">Realtor</a>, <a href="#">Home</a>, <a href="#">beautifull</a>, <a href="#">popular</a></p>
            </div>

            <!-- Social Block -->
            <div class="share-block">
              <ul>
                <li>
                  <a href="#"><i class="fa fa-pinterest"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fa fa-instagram"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fa fa-facebook"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fa fa-twitter"></i></a>
                </li>
              </ul>
            </div>

            <!-- Author -->
            <div class="post-author">
              <h4>About author</h4>
              <div class="author">
                <img src="img/blog-author-3.jpg" alt="author avatar" />
                <p><?php echo $author->name(); ?></p>
              </div>

              <p><?php echo $author->details(); ?></p>
            </div>
          </div>
        </div>

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
              $comments=Comment::find_on('Blog',$blogpost->id);
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
                <input type="hidden" name="item_type" value="Blog" />
                <input type="hidden" name="item_id" value="<?php echo $blogpost->id;?>" />
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
    </div>

    <?php
    _sidebar(' sidebar-wrapper');
    ?>			</div>
  </section>
</div>

<?php
require_once('parts/footer.php');
?>
