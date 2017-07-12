<?php
defined('DS')?null:define('DS', '/');
defined('SITE_ROOT')?null: define('SITE_ROOT',$_SERVER['DOCUMENT_ROOT']);
$domain=$_SERVER['HTTP_HOST'];
$domain.='http://'.$domain;

define('SITE_LOC', $domain);
$e=[];
$e[]="Error";
$e[1]="Cannot Be Empty";
$e[2]="Invalid";
$e[3]="Do Not Match";
$e[4]= "Already Exists";
$e[5]= "Fill All Input Fields";


define('SIMPLE_IMAGE', __DIR__.DS.'includes'.DS.'simpleimage'.DS.'src'.DS.'abeautifulsite'.DS.'myimage.php');
define('FACEBOOK',__DIR__.DS.'vendor'.DS.'facebook'.DS.'graph-sdk'.DS.'src'.DS.'Facebook'.DS.'autoload.php');
define('GOOGLE',__DIR__.DS.'vendor'.DS.'google'.DS.'apiclient'.DS.'src'.DS.'Google'.DS.'autoload.php');
require_once __DIR__.DS.'config.php';
require_once __DIR__.DS.'functions.php';
require_once __DIR__.DS.'mysqldatabase.php';
require_once __DIR__.DS.'databasetable.php';
require_once __DIR__.DS.'editable.php';
require_once __DIR__.DS.'session.php';
require_once __DIR__.DS.'file.php';
require_once __DIR__.DS.'user.php';
require_once __DIR__.DS.'agent.php';
require_once __DIR__.DS.'property.php';
require_once __DIR__.DS.'item.php';
require_once __DIR__.DS.'comment.php';
require_once __DIR__.DS.'blog.php';
require_once __DIR__.DS.'pagination.php';
require_once __DIR__.DS.'handler.php';
require_once __DIR__.DS.'__functions.php';
