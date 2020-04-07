
<?php
	$a="Acciano (AQ), 67020";
	$pos = strpos($a, "(");
	echo substr($a,0,$pos-1);
	echo "<br>".substr($a,$pos+1,2);
	echo "<br>".substr($a,$pos+6,5);	
?>
