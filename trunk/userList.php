<?php
	session_start();   
   	$usuario = $_SESSION['usuario'];
	$fecha =date('Y-n-j G:i:s');
	require("coneccion.php");
 	$query1 = "UPDATE usuarios SET fecha = '".$fecha."' WHERE usuario =  '$usuario'";
	 mysql_query($query1) or die("Error ".mysql_error());
	$query2 = "SELECT usuario, fecha FROM usuarios";
	$resultado = mysql_query($query2) or die("Error ".mysql_error());
	mysql_close($db);

	function timeDiff($firstTime,$lastTime)
	{
	
	// convierte a timestamps de unix sirven bien por ahora
	$firstTime=strtotime($firstTime);
	$lastTime=strtotime($lastTime);
	
	// hace la resta en segundos entre los dos tiempos 
	$timeDiff=$lastTime-$firstTime;
	
	// regresa la diferencia(convertido en minutos)
	return abs($timeDiff / (60));
	}
	
	//echo timeDiff("2002-04-16 10:00:00","2002-04-16 10:56:32");
		//$resta = timeDiff($fechaA, $fechaC);
		//echo $resta;
?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="scripts/ventanas.js" type="text/javascript"></script>
</head>

<body>
	<?php 
	while($linea = mysql_fetch_array($resultado)){
  		if(timeDiff($fecha, $linea['fecha']) <= .5){             	
			$usuario =  $linea['usuario'];
			echo "<br/>";
			if($usuario != $_SESSION['usuario'])	
				echo "<a href='javascript:checarVentanaPrivada(\"$usuario\",\"".$_SESSION['usuario']."\")'>".$usuario."</a><br /><br />";
			else echo "<label>$usuario</label>";
        }      
     } ?>
</body>
</html>
