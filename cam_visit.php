<?php

$cam_array = array("Teleconsulto fisioterapico", "Teleconsulto psicologico", "Televisita Geriatrica");
$cam_favicon = "webcam_icon.svg?v=5";

function checkVisitTypes($visit_name){
  $explod_visit = explode(" ",$visit_name);
  $explod_visit_array1 = array("Teleconsulto", "Televisita");
  $explod_visit_array2 = array("fisioterapico", "psicologico", "Geriatrica");
  if (in_array($explod_visit[0], $explod_visit_array1) && in_array($explod_visit[1], $explod_visit_array2)) {
//  if ($explod_visit[0] == "Teleconsulto" && $explod_visit[1] == "fisioterapico" || $explod_visit[0] == "Teleconsulto" && $explod_visit[1] == "psicologico" || $explod_visit[0] == "Televisita" && $explod_visit[1] == "Geriatrica") {
 echo "<img src=\"/assets/visit_icon/webcam_icon.svg?v=5\" style=\"width: 25px;margin-right: 10px;\" alt=\"\">
";
  }

  }
?>
