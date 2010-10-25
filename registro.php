<?php
session_start();
if($_SESSION != null){
	header('Location: chatroom.php');	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
<script src="scripts/vregistro.js" type="text/javascript"></script>
<script src="scripts/utils.js" type="text/javascript"></script>
<link href="style.css" rel="stylesheet" type="text/css"/>	
</head>

<body>
<form action="registrar.php" method="post">
<table align="center" cellpadding="5">
	<tr>
    	<td colspan="2" align="center">
        	<label>Registrate.</label>
		</td>
	</tr>
    <tr>
    	<td>
			<label>Usuario:*</label></td>
        <td>
        	<input type="text" name="usuario" id="usuario"/>
		</td>
    </tr>
    <tr>
    	<td>
			<label>Password:*</label>
        </td>
        <td colspan="2">
        	<input type="password" name="pass" id="pass"/>
		</td>
    </tr>
    <tr>
    	<td>
			<label>Repite tu password:*</label></td>
        <td>
        	<input type="password" id="repass"/>
		</td>
    </tr>
    <tr>
    	<td>
			<label>E-mail:*</label></td>
        <td>
        	<input type="text" name="mail" id="mail"/>
		</td>
    </tr>
    <tr>
    	<td>
			<label>Repite tu E-mail:*</label></td>
        <td>
        	<input type="text" name="repmail" id="repmail"/>
		</td>
    </tr>
    <tr align="center">
    	<td colspan="2" align="right">
        	<input type="submit" value="Registrarse" id="registrar"/>
		</td>
    </tr>
</table>
</form>
</body>
</html>
