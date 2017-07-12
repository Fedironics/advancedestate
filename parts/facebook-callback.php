<?php
$async=false;
if(!empty($_GET['async'])){
    $async=true;
}
require_once '../includes/initialize.php';
require_once '../includes/facebook.php';

if($async){
$helper = $fb->getJavaScriptHelper();
echo "using javascript yes";
}
else {
    $helper = $fb->getRedirectLoginHelper();
    echo " using php";
}
try {
  $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

if (isset($accessToken)) {
  // Logged in!
//get long lived access token
$oAuth2Client = $fb->getOAuth2Client();
  if (! $accessToken->isLongLived()) {
  // Exchanges a short-lived access token for a long-lived one
  try {
    $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
  } catch (Facebook\Exceptions\FacebookSDKException $e) {
    echo "<p>Error getting long-lived access token: " . $helper->getMessage() . "</p>\n\n";
    exit;
  }

}


  $_SESSION['facebook_access_token'] = (string) $accessToken;
$fb->setDefaultAccessToken((string) $accessToken);

try {
  $response = $fb->get('/me?fields=id,name,email,link,about,picture.width(700),first_name,last_name');
 } catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}
pre_format($response);
$facebook_user=$response->getDecodedBody();
$first_name=$facebook_user['first_name'];
$last_name=$facebook_user['last_name'];
$email=$facebook_user['email'];
$link=$facebook_user['link'];
$picture=$facebook_user['picture']['data']['url'];
$fbid=$facebook_user['id'];
$password=random_string(8);

$result=User::social_authenticate($email,$fbid);
if($result){
	$session->login($result);
}
else {
	
	$registered=User::make($first_name,$last_name,$email,$password);
  $registered->set_facebook($fbid,$accessToken,$link,$picture);
}

  // Now you can redirect to another page and use the
  // access token from $_SESSION['facebook_access_token']
}
