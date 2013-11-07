<?php
	session_start();
?>
<html>
<head>
	<META http-equiv="REFRESH" content="4;URL=index.html"> 
</head>
<body>
<h2 align="center">Hasta pronto, <?php echo $_SESSION["nombre_usuario"] ?></h2>
<?
  session_destroy(); 
  exit;
?>
</body>
</html>
