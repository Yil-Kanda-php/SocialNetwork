<html>
 <head>
  <meta charset="UTF-8">
</head> 

<?php

	require_once("modelos/modelUsuario.php");

	$usuario = new modelUsuario();

	$usuario_data = array(
		'idusuario' => '',
		'nombre' => 'Mario',
		'apellidoPaterno' => 'Aquino',
		'nacionalidad' => 'México',
		'correo' => 'daniel@blogspot.com',
		'clave' => 'abcd3fgh1jklmn0pqr5tuvwxyz'
		);

	$usuario->set($usuario_data);

	print $usuario->mensaje;

?>
</html>