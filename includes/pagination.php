<?php
class Pagination{
    public $page;
    public $per_page;
    public $total_count;
    
    function __construct($per_page=3,$total_count=0) {
        global $current;
        if(isset($_GET['page'])){$this->page=$_GET['page'];}
        else{$this->page=1;}
        $this->per_page=(int)$per_page;
        $this->total_count=(int)$total_count;
        $this->prev=  $this->page-1;
        $this->next=  $this->page+1;
        $this->url=$current;
    }
    public function page_count(){
        return ceil($this->total_count/$this->per_page);
    
}
public function offset(){
    return ($this->page-1)*$this->per_page;
}
public function next(){
    return $this->page+1;
}
public function prev() {
    return $this->page-1;
}
public function has_next() {
    return $this->next<=$this->page_count() ? true : false;
}
public function has_prev() {
    return $this->prev>=1 ? true : false;
}
public function show_next($no=3){
$navigation="";
    
    
    
    
 $navigation.= "<ul class=\"page-numbers\">";
  if($this->has_prev()){
    $navigation.= "<li><a class=\"next page-numbers\" href=\"$this->url&page=$this->prev\"><i class=\"fa fa-long-arrow-left\"></i></a></li>";
                  }
    
for($i= ( $this->page-$no);$i<=($this->page+$no);$i++){
      $curr_page=$i;
       if($curr_page==$this->page){
    $navigation.= "	<li class='active' ><a class=\"page-numbers current\">$this->page</a></li> ";

           continue;
    }
if($curr_page<=$this->page_count() && $curr_page>=1){
    $navigation.= "<li><a class=\"page-numbers\" href=\"$this->url&page=$curr_page\">$curr_page</a></li>";
}
}
if($this->has_next()){
    $navigation.=  "<li><a class=\"next page-numbers\" href=\"$this->url&page=$this->next\"><i class=\"fa fa-long-arrow-right\"></i></a></li>";
     }

$navigation.= "</ul>";
   return $navigation;
}




}