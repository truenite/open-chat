<?php
if(isset($_POST['checarUsuario'])){
	$usuario = $_POST['checarUsuario'];
	require("coneccion.php");
	$query="SELECT COUNT(*) AS numero FROM usuarios WHERE usuario = '".$usuario."';";
	$resultado=mysql_query($query);
	if(!$resultado){
		exit("Ha ocurrido un error ".mysql_error());
	}
	if( mysql_result($resultado,0) == 0){
		echo "noUsado";
	}
	else{
		echo "Usado";
	}
	mysql_close($db);
}

if(isset($_POST['usuario']) && isset($_POST['pass']) && isset($_POST['mail']) ){	
	$usr = htmlspecialchars($_POST['usuario'], ENT_QUOTES);
	$pass = md5($_POST['pass']);
	$mail = htmlspecialchars($_POST['mail'], ENT_QUOTES);
	$fecha =date('Y-n-j G:i:s');
	$query="INSERT INTO usuarios VALUES('".$usr."','".$pass."','".$mail."',0,'".$fecha."');";
	require("coneccion.php");
	$resultado = mysql_query($query);
	if(!$resultado){
		exit("Ha ocurrido un error; ".mysql_error());	
	}
	else{
		mysql_close($db);
		
		echo "Registro completado serás redireccionado<br />Si no heres redireccionado has <a href='index.php'>click aquí</a>";
		echo("<META HTTP-EQUIV='Refresh' CONTENT='10; URL=index.php'>");
	}
}
?>