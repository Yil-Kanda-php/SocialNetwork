<?php
	require_once("modelos/modelUsuario.php");
	$usuario = new modelUsuario();
	$usuario->get();
	print $usuario->mensaje;
	print "</br>";

	print $usuario->getIdUsuario();
	print "</br>";
	print $usuario->getNombre();
	print "</br>";
	print $usuario->getApellidoPaterno();
	print "</br>";
	print $usuario->getApellidoMaterno();
	print "</br>";
	print $usuario->getNacionalidad();
	print "</br>";
	print $usuario->getCorreo();
	print "</br>";
	print $usuario->getClave();
?>