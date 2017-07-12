<?php
require_once("../includes/initialize.php");
if(isset($_POST['userid']) || isset($_POST['email'])){
    $user=User::find_by_column($_POST['userid'],'user_id');
    
}