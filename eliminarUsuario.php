<?php
	
	require_once("modelos/modelUsuario.php");

	$usuario = new modelUsuario();

	$usuario->delete(2);

	print $usuario->mensaje;

?>