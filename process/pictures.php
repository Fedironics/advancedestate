<?php
require_once("../includes/initialize.php");

$agent=User::find_by_id(1);
$agent->set_picture('file');
//pre_format($file);


