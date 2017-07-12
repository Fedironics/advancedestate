<?php 
require_once("SimpleImage.php");
class EditImage extends abeautifulsite\SimpleImage{
	public function square_crop($width,$height){
		$iheight=$this->get_height();
		$iwidth=$this->get_width();
		$aspect=$width/$height;
		if($iwidth>$iheight*$aspect){
			//trim the $width
			$excess=$iwidth-$iheight*$aspect;
			$x1=round($excess/2);
			$x2=$iwidth-$x1;
			$this->crop($x1,0,$x2,$iheight);
		//	echo "($x1,0,$x2,$iheight)";			
		}
		elseif($iheight>$iwidth/$aspect){
			//trim the $height
			$excess=$iheight-$iwidth/$aspect;
			$y1=round($excess/2);
			$y2=$iheight-$y1;
			$this->crop(0,$y1,$iwidth,$y2);	
	//		echo "crop(0,$y1,$iwidth,$y2)";			
		}
		$this->fit_to_width($width);
		return $this;
		
	}
}
