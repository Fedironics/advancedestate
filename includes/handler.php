<?php
if($session->logged())$user=User::find_by_id($session->get_user_id());
if(!empty($_POST['post'])&& $_POST['post']=='Login'){
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
    redirect_to();
}
if(isset($_GET['logout'])){
	$session->logout();
	redirect_to();
}
$current=$_SERVER['PHP_SELF'];
