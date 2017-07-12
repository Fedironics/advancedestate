<?php 
require_once("includes/content.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <title>Realtor</title>
    <meta name="description" content="Here goes description" />
    <meta name="author" content="author name" />
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon" />
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <!-- Style CSS -->
<link rel="stylesheet" href="../../../../maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" />
   <link rel="stylesheet" href="css/owl-carousel.css" />
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/lightbox.css" />
    <link rel="stylesheet" href="css/animate.css" />
    <link rel="stylesheet" href="css/bxslider.css" />
    <link rel="stylesheet" href="css/nouislider.css" />
<link rel="stylesheet" href="css/icomoon.css" /> 
<link rel="stylesheet" href="css/icomoon.css" /> 
   <link rel="stylesheet" href="css/screen.css" /> 
</head>
<body data-smooth-scroll="on" id="front-page">

<script>
  logInWithFacebook = function() {
    FB.login(function(response) {
      if (response.authResponse) {
        alert('You are logged in &amp; cookie set!');
		$.get('parts/facebook-callback.php',{'async':true},function(data){
		//	top.location.href="index.php";
			console.log(data);
			console.log(facebook_logged());
		});
      } else {
        alert('User cancelled login or did not fully authorize.');
      }
    },{scope:'public_profile,email'});
    return false;
  };
  //for finding out if a user is logged into facebook
  facebook_logged= function() {  
	  FB.getLoginStatus(function(response) {
		  console.log(response.status);
      return response.status=='not_authorized';
    });
  }
  window.fbAsyncInit = function() {
    FB.init({
      appId: '1625360497767755',
      cookie: true, // This is important, it's not enabled by default
      version: 'v2.2'
    });
  };

  (function(d, s, id){
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {return;}
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>
	<!-- Site Preloader -->
	<div class="site-preloader">
		<div class="preloader-content">
			<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100px" height="100px" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
				<g>
					<polygon fill-rule="evenodd" clip-rule="evenodd" fill="#EB2625" points="52.346,69.705 24.321,69.531 67.362,98.879 
						91.266,98.879 	"/>
					<rect x="9.856" y="44.682" fill-rule="evenodd" clip-rule="evenodd" fill="#F0494B" width="14.465" height="54.362"/>
					<path fill-rule="evenodd" clip-rule="evenodd" fill="#A31B1F" d="M47.868,1.947c21.055,0,38.123,17.068,38.123,38.123
						c0,21.055-17.068,38.123-38.123,38.123c-21.055,0-38.123-17.068-38.123-38.123C9.745,19.015,26.813,1.947,47.868,1.947
						L47.868,1.947z M47.868,16.58c-12.973,0-23.49,10.517-23.49,23.49c0,12.973,10.517,23.49,23.49,23.49
						c12.973,0,23.49-10.517,23.49-23.49C71.357,27.097,60.841,16.58,47.868,16.58z"/>
					<path fill-rule="evenodd" clip-rule="evenodd" fill="#F0494B" d="M47.535,1.166c21.055,0,38.123,17.068,38.123,38.123
						c0,21.055-17.068,38.123-38.123,38.123c-21.055,0-38.123-17.068-38.123-38.123C9.412,18.234,26.48,1.166,47.535,1.166L47.535,1.166
						z M47.535,15.799c-12.973,0-23.49,10.517-23.49,23.49c0,12.973,10.517,23.49,23.49,23.49c12.973,0,23.49-10.517,23.49-23.49
						C71.025,26.316,60.508,15.799,47.535,15.799z"/>
				</g>
			</svg>
		</div>
	</div>
	<!-- Page Wrapper -->
	<div id="page">
		<!-- Header -->
		<header>
			<!-- Navigation -->
			<nav>
				<ul>
					<li class="home current-menu-item"><a href="my-profile.php">My Profile</a></li>
					<li class="listing menu-item-has-children">
						<a href="#">Listing</a>
						<ul class="sub-menu">
							<li><a href="properties_grid.php">Grid</a></li>
							<li><a href="properties_list.html">List</a></li>
						</ul>
					</li>
					<li class="property"><a href="single-full-width.html">Property</a></li>
					<li class="agents"><a href="agents.php">Agents</a></li>
					<li class="blog"><a href="blog.html">Blog</a></li>
					<li class="error"><a href="404.html">404 Page</a></li>
				</ul>
			</nav>
			<!-- Social Block & Login -->
			<div class="right-block">
			<?php
			if($session->logged()){
				
				$pix=$user->get_picture();
	echo
						"<div class=\"account-options\">
					<div class=\"main-info\">
						<img src=\"".$user->get_picture('author')."\" alt=\"profile avatar\" />
						<span class=\"username\">".$user->name()."</span>
					</div>
					<ul class=\"list\">
						<li><a class=\"profile\" href=\"my-profile.php#profile\">My profile</a></li>
						<li><a class=\"submit-new\" href=\"my-profile.php#submit\">Submit new property</a></li>
						<li><a class=\"properties\" href=\"my-profile.php#properties\">My properties</a></li>
						<li><a class=\"exit\" href=\"index.php?logout\">Exit</a></li>
					</ul>
				</div>
";
}
?>
				<ul class="social-block">
					<li><a href="#"><i class="fa fa-facebook"></i></a></li>
					<li><a href="#"><i class="fa fa-twitter"></i></a></li>
					<li><a href="#"><i class="fa fa-instagram"></i></a></li>
					<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
				</ul>
				<?php
				if(!$session->logged()){
					echo "	<p><a class=\"login\" href=\"#\">Login</a> / <a href=\"#\" class=\"register\">Register</a></p>
			";
				}
				?>
			</div>
			<!-- Menu Toggle -->
			<span class="menu-toggle cmn-toggle-switch cmn-toggle-switch__htx">
				<span>toggle menu</span>
			</span>
			<!-- Identity image -->
			<a href="index.php" class="brand">
				<img src="img/logo.png" alt="logo" />
			</a>
		</header>
		<!-- Main Content -->
		<div class="content-wrapper">
		<?php
		if($session->logged())
		{
			echo "				
";
		}
		else{
			echo "
				<!-- Login Form -->
			<div class=\"login-form-popup\">
				<div class=\"login-form\" id=\"login-popup\">
					<div class=\"brand-wrapper\">
						<img src=\"img/brand.png\" alt=\"login brand\" />
					</div>
					<form id=\"login-form\" action=\"?\" method=\"post\">
						<input class=\"js-input\" name=\"email\" type=\"text\" placeholder=\"Email\" />
						<input class=\"js-input\" name=\"password\" type=\"password\" placeholder=\"Password\" />
						<input type=\"submit\" value=\"Login\" name=\"post\" class=\"submit-button\" />
						<div class=\"options\">
							<label>
								<input type=\"checkbox\" name=\"remember\" value=\"yes\" />
								<span>Remember me</span>
							</label>
							<a class=\"remember-password\" href=\"process/password_recovery.php\">Forgotten the password</a>
						</div>
					</form>
					<form id=\"register-form\" method=\"post\" action=\"process/accounts.php\">
						<input class=\"js-input\" name=\"first_name\" type=\"text\" placeholder=\"First Name\" />
						<input class=\"js-input\" name=\"last_name\" type=\"text\" placeholder=\"Last Name\" />
						<input class=\"js-input\" name=\"email\" type=\"text\" placeholder=\"Email\" />
						<input class=\"js-input\" name=\"password\" type=\"password\" placeholder=\"Password\" />
						<input class=\"js-input\" name=\"password1\" type=\"password\" placeholder=\"Confirm password\" />
						<input type=\"submit\" name=\"post\" value=\"Register\" class=\"submit-button\" />
					</form>
					<div class=\"sign-in-options\">
						<span>Sign in</span>
						<a class=\"facebook\" onClick=\"logInWithFacebook();return false\" href=\"parts/sandbox.php\">Facebook</a>
						<a class=\"google\" href=\"process/google.php\">Google</a>
					</div>
					<p class=\"register-link\"><i>Don't have an account?</i> <a href=\"#\" class=\"register-btn\">Register here</a></p>
				</div>
			</div>
";

		}
		?>
		