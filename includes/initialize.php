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


define('SIMPLE_IMAGE', SITE_ROOT.DS.'includes'.DS.'simpleimage'.DS.'src'.DS.'abeautifulsite'.DS.'myimage.php');
define('FACEBOOK',SITE_ROOT.DS.'vendor'.DS.'facebook'.DS.'graph-sdk'.DS.'src'.DS.'Facebook'.DS.'autoload.php');
define('GOOGLE',SITE_ROOT.DS.'vendor'.DS.'google'.DS.'apiclient'.DS.'src'.DS.'Google'.DS.'autoload.php');
require_once SITE_ROOT.DS."includes".DS.'config.php';
require_once SITE_ROOT.DS."includes".DS.'functions.php';
require_once SITE_ROOT.DS."includes".DS.'mysqldatabase.php';
require_once SITE_ROOT.DS."includes".DS.'databasetable.php';
require_once SITE_ROOT.DS."includes".DS.'session.php';
require_once SITE_ROOT.DS."includes".DS.'file.php';
require_once SITE_ROOT.DS."includes".DS.'user.php';
require_once SITE_ROOT.DS."includes".DS.'agent.php';
require_once SITE_ROOT.DS."includes".DS.'property.php';
require_once SITE_ROOT.DS."includes".DS.'item.php';
require_once SITE_ROOT.DS."includes".DS.'comment.php';
require_once SITE_ROOT.DS."includes".DS.'blog.php';
require_once SITE_ROOT.DS."includes".DS.'pagination.php';
require_once SITE_ROOT.DS."includes".DS.'handler.php';


