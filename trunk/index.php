<?php
session_start();
if($_SESSION != null){
	header('Location: chatroom.php');	
}
if(isset($_POST['usuario']) && isset($_POST['pss'])){
	$username =  htmlspecialchars($_POST['usuario'], ENT_QUOTES);
	$pss = md5($_POST['pss']);
	require("coneccion.php");
	$query="SELECT * FROM usuarios WHERE usuario = '".$username."' and password = '".$pss."';";
	$resultado=mysql_query($query);
	if(!$resultado){
		exit("Ha ocurrido un error".mysql_error());
	}
	if(mysql_num_rows($resultado) > 0){
		$resultado = mysql_fetch_array($resultado);
			$_SESSION['usuario'] = $resultado['usuario'];
			$_SESSION['nivel'] = $resultado['admin'];
			$_SESSION['fecha'] = date('Y-n-j G:i:s');
			$_SESSION['fechaPrivado'] = date('Y-n-j G:i:s');
			header('Location: chatroom.php');			  
	}
	else{
		echo
		"<script type='text/javascript'>
        	alert('El usuario y/o password incorrecto');
        </script>";
	}
	mysql_close($db);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>	
<form action="index.php" method="post">
<table align="center">
	<tr>
    	<td>
        	<label>Username:</label></td>
		<td>
        	<input type="text" name="usuario"/>
		</td>
    </tr>
   	<tr>
    	<td>
			<label>Password:</label></td>
        <td>
        	<input type="password" name="pss"/>
		</td>
    </tr>
    <tr align="center">
        <td colspan="2">
        	<input type="submit" value="Enviar"/>
		</td>
    </tr>
    <tr align="center">
        <td colspan="2">
        	Aún no estás registrado?... 
            <br />
           <a href="registro.php">Registrate aquí!!</a>
		</td>
    </tr>
</table>
</form>        
</body>
</html>