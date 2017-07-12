<?php
require_once("../includes/initialize.php");
if(empty($_POST))
finish("no data posted");
foreach($_POST as $param=>$value){
    $_POST[$param]=$database->escape_value($value);
}
if(!empty($_POST['action']) && $_POST['action']=='comment'){
Comment::make($_POST['item_type'],$_POST['item_id'],$_POST['name'],$_POST['comment'],$_POST['email']);
}
if(!empty($_POST['action']) && $_POST['action']=='contact_agent'){
    /*here write the code for sending email message to the agent */
    echo "writing code for emailing the agent and stuff like that";
    
}