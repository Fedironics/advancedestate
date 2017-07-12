<?php
if($session->logged()){
	$rate_max=5;
	$rel_class='Property';
	$rel_id=(int)$_GET['property'];
	$user_id=(int)$session->get_user_id();
	$rating=(int)$_POST['rating'];
	if($database->query("SELECT id FROM ratings WHERE rel_class='$rel_class' AND rel_id='$rel_id' AND user_id='$user_id'")->num_rows<1 && $rating<=$rate_max){
		$sql="INSERT INTO ratings (user_id,rel_class,rel_id,rating) VALUES ($user_id,'$rel_class',$rel_id,$rating)";
		$database->query($sql);
		echo "$rel_class rated $rating stars";
	}
	elseif ($rating<=$rate_max) {
		$sql="UPDATE ratings SET rating=$rating WHERE rel_class='$rel_class' AND rel_id='$rel_id' AND user_id='$user_id'";
		$database->query($sql);
		echo "$rel_class re-rated $rating stars";
	}
	else {
		echo "invalid rating";
	}
}
else {
	echo 'user not logged in';
}

die();
