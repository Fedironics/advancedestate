<?php
$type=empty($_GET['type'])?1:$_GET['type'];
$table=empty($_GET['dataTable'])?'':$_GET['dataTable'];
$limit=empty($_GET['limit'])?1:$_GET['limit'];
$where=empty($_GET['where'])?'':$_GET['where'];
require_once '../includes/initialize.php';
$results=DatabaseTable::get_table($table,$limit,$where);
echo json_encode($results);