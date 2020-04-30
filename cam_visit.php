<?php

$cam_array = array("Teleconsulto fisioterapico", "Teleconsulto psicologico");
$cam_favicon = "webcam_icon.svg?v=4";

function checkVisitTypes($visit_name){
  $explod_visit = explode(" ",$visit_name);
  if ($explod_visit[0] == "Teleconsulto" && $explod_visit[1] == "fisioterapico" || $explod_visit[0] == "Teleconsulto" && $explod_visit[1] == "psicologico") {
 echo "<img src=\"/assets/visit_icon/webcam_icon.svg?v=4\" style=\"width: 25px;margin-right: 10px;\" alt=\"\">
";
  }

  }
?>
