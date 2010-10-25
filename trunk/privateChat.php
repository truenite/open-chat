<?php
session_start();
if($_SESSION == null || !(isset($_GET['emisor']) && isset($_GET['receptor']))){
	header('Location: index.php');	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>EsMiEmpresa - Soporte en vivo</title>
</head>
<?php
	if($_GET['emisor'] == $_SESSION['usuario']){
		$destinatario = $_GET['receptor'];
	}
	else{
		$destinatario = $_GET['emisor'];	
	}
?>
<FRAMESET rows="80%,20%" border="NO" style="width:100px;">
  <FRAME src="chatframeprivado.php?<?php echo "emisor=".$_SESSION['usuario']."&receptor=".$destinatario; ?>" name="frame1"/>
  <FRAME src="enviartextosprivado.php?<?php echo "emisor=".$_SESSION['usuario']."&receptor=".$destinatario; ?>" name="frame3"/>
</FRAMESET>
<body>
</body>
</html>
