<?php 
	$myfile = fopen("log/crontab.txt", "w") or die("Unable to open file!");
	$txt = date('Y-m-d H:i:s')."\n";
	fwrite($myfile, $txt);
	fclose($myfile);
?>