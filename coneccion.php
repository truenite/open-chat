<?php

$db=mysql_connect("localhost", "root", "");
	if(!$db){
		exit("No pude establecer la coneccion con la base de datos");
	}
	$bd=mysql_select_db("chat",$db);
	
?>