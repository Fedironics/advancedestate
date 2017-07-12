<?php 
require_once("../includes/initialize.php");
pre_format($_POST);
function finish($message){
	global $session;
	echo $message;
//	$session->message($message);
//	pre_format($session->message());
//	redirect_to("../");
}
if(!isset($_POST['post'])){
	finish($e[2]." post");
}

//for logging in
if($_POST['post']=='Login'){
	if(empty($_POST['email']) || empty($_POST['password']))
	finish("Please Input A Userid Or Password To Login");
	$result=User::authenticate($_POST['email'],$_POST['password']);
	if($result){
		if(!empty($_POST['remember'])){
			$session->login($result,true);
		}
		else{
			$session->login($result);
		}
	}
}
//for registration
elseif($_POST['post']=='Register'){
if(!isset($_POST['password']) || !isset($_POST['password1']) || !isset($_POST['email']) || !isset($_POST['first_name']) || !isset($_POST['last_name']))
finish($e[6]);
	if($_POST['password']!=$_POST['password1'])
	   finish("Passwords ".$e[3]);

$registered=User::make($_POST['first_name'],$_POST['last_name'],$_POST['email'],$_POST['password']);
	$result=User::authenticate($_POST['email'],$_POST['password']);
	if($result){
		if(!empty($_POST['remember'])){
			$session->login($result,true);
		}
		else{
			$session->login($result);
		}
	}
	
	
}

pre_format($result);
pre_format($session->message());
$session->logged();





























































































