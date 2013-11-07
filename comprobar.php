<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Comprobar datos</title>
</head>

<body>
<link href="estilos.css" rel="stylesheet" type="text/css" />
<html><body>
<?php
function recoge($var)
{ 
    $tmp = (isset($_REQUEST[$var])) ? strip_tags(trim(htmlspecialchars($_REQUEST[$var]))) : '';
    if (get_magic_quotes_gpc()) {
        $tmp = stripslashes($tmp);
    }
    return $tmp;
}

$nombre = recoge('nombre');
$apellidos=recoge('apellidos');
$nombre_usuario=recoge('nombre_usuario');
$password=recoge('pass');
$email=recoge('email');

$nombreOK=false;
$apellidosOK=false;
$nombre_usuarioOK=false;
$passwordOK=false;
$emailOK=false;

/* Comprobacion de nombre */
if($nombre==""){
	print "<p>No ha escrito su nombre.</p>\n";
}elseif(strlen($nombre)<3){
	print "<p>El nombre introducido es demasiado corto.</p>\n";
}else{
	$nombreOK=true;
}

/* Comprobacion de apellidos */
if($apellidos==""){
	print "<p>No ha escrito sus apellidos.</p>\n";
}elseif(strlen($apellidos)<3){
	print "<p>Los apellidos introducidos son demasiado cortos.</p>\n";
}else{
	$apellidosOK=true;
}

/* Comprobacion de nombre_usuario */
if($nombre_usuario==""){
	print "<p>No ha escrito su nombre de usuario.</p>\n";
}elseif(strlen($nombre_usuario)<5){
	print "<p>El nombre de usuario introducido es demasiado corto.</p>\n";
}else{
	$nombre_usuarioOK=true;
}

if($password==""){
	print "<p>No ha escrito una contraseña.</p>\n";
}elseif(strlen($password)<5){
	print "<p>La contraseña es demasiado corta.</p>\n";
}else{
	$passwordOK=true;
}


/* Comprobacion de email */
if($email==""){
	$emailOK=true;
}elseif(!((substr_count($email,"@") == 1) && (substr($email,0,1) != "@") && (substr($email,strlen($email)-1,1) != "@"))){
	print "<p>La direccion de correo introducida no es valida</p>\n";
}else{
	$emailOK=true;
}

if($nombreOK && $apellidosOK && $nombre_usuarioOK && $passwordOK && $emailOK){
	print "<p>Su nombre es <strong>$nombre</strong>.</p>\n";
	print "<p>Sus apellidos son <strong>$apellidos</strong>.</p>\n";
	print "<p>Su nombre de usuario es <strong>$nombre_usuario</strong>.</p>\n";
	print "<p>Su contraseña es <strong>$password</strong>.</p>\n";
	if($email!=""){
		print "<p>Su email es <strong>$email</strong></p>\n";
	}
}

print "<p><a href=\"iniciar-sesion.html\">Volver al formulario.</a></p>\n";
?>
<?php
$conexion = mysql_connect("localhost","root","gigoreales");
mysql_select_db("proyecto",$conexion);
$sql = "INSERT INTO formulario VALUES (NULL,'$nombre','$apellidos','$nombre_usuario','$password','$email')";
$result = mysql_query( $sql );
if($result)echo "Los datos se han almacenado correctamente en la Base de Datos";
else echo "No se han podido guardar los datos";
?>
</body></html>
</body>
</html>