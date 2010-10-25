<?php
session_start();
if($_SESSION == null){
	header('Location: index.php');	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script src="scripts/utils.js" type="text/javascript"></script>
<script src="scripts/enviartextosprivado.js" type="text/javascript"></script>
<title>Untitled Document</title>
</head>

<body>
<table align="center">
    <tr>
    	<td colspan="2">
       	<form onsubmit="return enviarTexto()" method="get"><input name="oracion" id="oracion" type="text" size="30" />   
            <input type="submit" name="enviar" id="enviar" value="Enviar"/>
            <?php
				if(isset($_GET['emisor']) && isset($_GET['receptor'])){
					$destinatario = $_GET['receptor'];	
				}
				echo"<input type='hidden' value=".$_SESSION['usuario']." id='emisor' name='emisor'/>
				<input type='hidden' value=". $destinatario." id='destinatario' name='receptor'/>";
			?> 
		</form>
        </td>
	</tr>
</table>
<script type="text/javascript">
			document.getElementById("oracion").focus();
		</script>    
</body>
</html>
