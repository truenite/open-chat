<?php
session_start();
if($_SESSION == null || !(isset($_GET['emisor']) && isset($_GET['receptor']))){
	header('Location: index.php');	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script src="scripts/chatRefreshPrivado.js" type="text/javascript"></script>
<script src="scripts/utils.js" type="text/javascript"></script>
<title>Untitled Document</title>
<link href="style.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<?php
	if($_GET['emisor'] == $_SESSION['usuario']){
		$destinatario = $_GET['receptor'];
		echo"<input type='hidden' value='".$_SESSION['usuario']."' id='emisor'/>
			<input type='hidden' value='". $destinatario."' id='destinatario'/>";
	}
	else{
		$destinatario = $_GET['emisor'];
		echo"<input type='hidden' value='".$_SESSION['usuario']."' id='emisor'/>
			<input type='hidden' value='".$destinatario."' id='destinatario'/>";
	}
?>
<div id="centroChat" style="width:400px; height:500px;"></div>
</body>
</html>