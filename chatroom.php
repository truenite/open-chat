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
<title>Super Chat!¡!¡! </title>
</head>
<FRAMESET rows="80%,20%" border="NO"> @SupressWarnings 	
  <FRAMESET cols="80%,20%" border="NO">
      <FRAME src="chatframe.php" name="frame1"/>
      <FRAME src="userFrame.php" name="frame2"/>
  </FRAMESET>
  <FRAME src="enviartextos.php" name="frame3"/>
  <FRAME name="frame4"/>
</FRAMESET>
<body>
</body>
</html>
