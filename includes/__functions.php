<?php
function _editable($name){
  echo "
    <div class=\"section-header\">
      <h1>";
      $recent= Editable::name($name);
      echo ucwords($recent->screen);

       echo "</h1>
      <p>";
      echo  $recent->contained ;
      echo "</p>
    </div>
";
}
function _sidebar($def="col-lg-7 col-lg-offset-1"){
 require_once(__DIR__. "..".DS."parts".DS."sidebar.php");
}
