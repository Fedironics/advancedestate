<?php
function pre_format($object){
	echo "<pre>";
	print_r($object);
	echo "</pre>";
}
$characters="a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z,1,2,3,4,5,6,7,8,9,0";
$char_array=  explode(',', $characters);



/**
* @param <int> $length the length of the random string
 * @return <string> it returns a random string for useage in session and stuff
 */
function random_string($length=10) {
	global $char_array;
	$random_string = '';
	$upper_limit=  count($char_array)-1;
	do {
		$rand_key=  rand(0, $upper_limit);
		$random_string.=$char_array[$rand_key];
		$length--;
	}
	while($length>0);
	return $random_string;
}
function redirect_to($location=''){
	if(empty($location)){
		$location=$_SERVER['PHP_SELF'];
	}
	header("location:$location");
	exit();
}
function validator($email,$type){
	global $session;
	if($type=='e')
		    {
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			return true;
		}
		else{
			$session->message("That is not a valid email");
			return false;
		}
	}
	
}

function humanTiming ($eventTime){
	$totaldelay = time() - strtotime($eventTime);
	if($totaldelay <= 0)
		    {
		return '';
	}
	else
		    {
		$timesince = '';
		$first = '';
		$marker = 0;
		if($years=floor($totaldelay/31536000))
				        {
			$totaldelay = $totaldelay % 31536000;
			$plural = '';
			if ($years > 1) $plural='s';
			$interval = $years." year".$plural;
			$timesince = $timesince.$first.$interval;
			if ($marker) return $timesince;
			$marker = 1;
			$first = ", ";
		}
		if($months=floor($totaldelay/2628000))
				        {
			$totaldelay = $totaldelay % 2628000;
			$plural = '';
			if ($months > 1) $plural='s';
			$interval = $months." month".$plural;
			$timesince = $timesince.$first.$interval;
			if ($marker) return $timesince;
			$marker = 1;
			$first = ", ";
		}
		if($days=floor($totaldelay/86400))
				        {
			$totaldelay = $totaldelay % 86400;
			$plural = '';
			if ($days > 1) $plural='s';
			$interval = $days." day".$plural;
			$timesince = $timesince.$first.$interval;
			if ($marker) return $timesince;
			$marker = 1;
			$first = ", ";
		}
		if ($marker) return $timesince;
		if($hours=floor($totaldelay/3600))
				        {
			$totaldelay = $totaldelay % 3600;
			$plural = '';
			if ($hours > 1) $plural='s';
			$interval = $hours." hour".$plural;
			$timesince = $timesince.$first.$interval;
			if ($marker) return $timesince;
			$marker = 1;
			$first = ", ";
			
		}
		if($minutes=floor($totaldelay/60))
				        {
			$totaldelay = $totaldelay % 60;
			$plural = '';
			if ($minutes > 1) $plural='s';
			$interval = $minutes." minute".$plural;
			$timesince = $timesince.$first.$interval;
			if ($marker) return $timesince;
			$first = ", ";
		}
		if($seconds=floor($totaldelay/1))
				        {
			$totaldelay = $totaldelay % 1;
			$plural = '';
			if ($seconds > 1) $plural='s';
			$interval = $seconds." second".$plural;
			$timesince = $timesince.$first.$interval;
		}
		$timesince.=" ago";
		return $timesince;
		
	}
	
}
function fetch_array($data){
	if($data->num_rows==0){
		return false;
	}
	else{
		$results=[];
		while($data_array=$data->fetch_array()){
			$results[]=$data_array;
		}
		return $results;
	}
}

function mysql_time(){
	$mytime= date_create();
	return date_format($mytime,"Y-m-d H:i:s");
}
function is_even($num){
	return $num % 2 == 0;
}
