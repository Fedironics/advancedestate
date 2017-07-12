<?php
$online = $_SERVER['HTTP_HOST']!='localhost' ;
$online?define('MYSQL_HOST', "us-cdbr-azure-southcentral-f.cloudapp.net"):define('MYSQL_HOST', "localhost");
$online?define('MYSQL_USER', "b31282f4f76bb0"):define('MYSQL_USER', "root");
$online?define('MYSQL_PASSWORD', "7506be08"):define('MYSQL_PASSWORD', "root");
$online?define('MYSQL_DATABASE', "reales"):define('MYSQL_DATABASE', "realestate");
