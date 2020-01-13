<html>
 <head>
  <meta charset="UTF-8">
</head> 

<?php

	require_once("modelos/modelUsuario.php");

	$usuario = new modelUsuario();

	$usuario_data = array(
		'idusuario' => 2,
		'nombre' => 'Mario',
		'apellidoPaterno' => 'Breda',
		'nacionalidad' => 'México',
		'correo' => 'mario@blogspot.com',
		'clave' => 'abcd1234'
		);

	$usuario->edit($usuario_data);

	print $usuario->mensaje;

?>
</html>