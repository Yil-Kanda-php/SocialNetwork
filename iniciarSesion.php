<html>
 <head>
  <meta charset="UTF-8">
</head> 

<?php

	require_once("modelos/modelUsuario.php");

	$usuario = new modelUsuario();

	$usuario->init('daniel@blogspot.com','abcd1234');

	print $usuario->mensaje;
	print "</br>";
	print "Sesión: ".$_SESSION['usuario'];

?>
</html>