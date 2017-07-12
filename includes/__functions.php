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
