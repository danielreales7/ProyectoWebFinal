<?php
session_start();
//Conectamos con la base de datos
$link=mysql_connect("localhost","root","gigoreales");
mysql_select_db("proyecto",$link);

//Comprobación de los datos
$sentencia="SELECT nombre_usuario FROM formulario WHERE nombre_usuario= '".$_POST["login"]."' and password= '".$_POST["password"]."'";
$result=mysql_query($sentencia);
$num=mysql_num_rows($result);
if($num==0)
echo ("<script language=\"javascript\">alert('Los datos no son validos');document.location.href=\"iniciar-sesion.html\";</script>");
else{
	//Registramos en sesión la variable $id_cliente
	$_SESSION["nombre_usuario"]=$_POST["login"];
	echo("<html>
	<body>
	<table width=\"500\" align=\"center\">
	<tr>
    	<td align=\"center\"><br/><br/>Validaci&oacute;n de Usuario<br/></td>
    </tr>
    <tr>
    	<td align=\"center\">Bienvenido, <B>".$_SESSION["nombre_usuario"]."</B><BR /></td>
		<td align=\"center\"><a href=\"cerrarsesion.php\">Cerrar Sesi&oacute;n</a></td>
    </tr>
    <tr>
	</table>
	</body>
	</html>
	");
}
?>