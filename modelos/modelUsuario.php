
<html>
<head>
	<meta charset="UTF-8">
</head> 

<?php
require_once("core/modeloBD.php");

class modelUsuario extends ModeloBD
{
	private $idusuario;
	private $nombre;
	private $apellidoPaterno;
	private $apellidoMaterno;
	private $nacionalidad;
	private $sexo;
	private $correo;
	private $clave;

	/*
	function __construct()
	{
		$this->db_name = "socialnetwork";
	}
	*/

	//Nuestro método GET sera para obtener todos los datos de cierto usuario en especifico, 
	//esto sera a través de su identificador (id), el cual lo pasaremos por el parámetro del método.
	public function get($idUsuario = '')
	{
		if($idUsuario != '')
		{
			$this->query="
			SELECT * FROM usuario
			WHERE idUsuario = '$idUsuario'";
			$this->get_results_from_query();
		}

		if(count($this->rows) == 1)
		{
			foreach ($this->rows[0] as $campo => $valor) 
			{
				$this->$campo = $valor;
			}
			$this->mensaje = "Se encontró usuario";
		}
		else
		{
			$this->mensaje = "No se encontró usuario";
		}
	}

	//Este método recibirá como parámetro un arreglo que contendrá todo los datos 
	//que necesitamos para agregarlos a la Base de Datos.
	public function set($usuario_data = array())
	{
		if(array_key_exists('correo', $usuario_data))
		{
			foreach ($usuario_data as $campo => $valor) 
			{
				$campo = $valor;
			}
			$this->query = "
			SELECT * FROM usuario
			WHERE correo='$correo'
			";
			$this->get_results_from_query();
			if(count($this->rows)==1)
			{
				$this->mensaje = "Usuario existente";
			}
			else
			{
				unset($this->rows);
				$this->query = "
				INSERT INTO usuario(idusuario,nombre,apellidoPaterno,apellidoMaterno,nacionalidad,correo,clave)
				VALUES('$idusuario','$nombre','$apellidoPaterno','$apellidoMaterno','$nacionalidad','$correo','$clave')
				";
				$this->execute_single_query();
				$this->mensaje = "Usuario creado";
			}
		}
		else
		{
			$this->mensaje = "Error";
		}
	}

	//Este método editara un registro de nuestra Base de Datos utilizando su identificador.
	public function edit($usuario_data = array())
	{
		if(array_key_exists('idusuario', $usuario_data))
		{
			foreach ($usuario_data as $campo => $valor) 
			{
				$campo = $valor;
			}
			$this->query = "
			UPDATE usuario
			SET 
			nombre = '$nombre',
			apellidoPaterno = '$apellidoPaterno',
			apellidoMaterno = '$apellidoMaterno',
			nacionalidad = '$nacionalidad',
			correo = '$correo',
			clave = '$clave'
			WHERE idusuario = '$idusuario'
			";
			$this->execute_single_query();
			$this->mensaje = "Se actualizó usuario";
		}
		else
		{
			$this->mensaje = "Error";
		}
	}

	//El método hará algo simple, eliminar el usuario de la Base de Datos.
	public function delete($idUsuario = '')
	{
		if($idUsuario != '')
		{
			$this->query = "
			DELETE FROM usuario
			WHERE idusuario = '$idUsuario'
			";
			$this->execute_single_query();
			$this->mensaje = "Se eliminó el usuario";
		}
		else
		{
			$this->mensaje = "Error";
		}
	}

	//Creamos un método que se llame init. 
	//El cual se encargara de buscar el usuario con su correo y clave en los parametros, 
	//si lo encuentra, generara una sesión tomando su identificador.
	public function init($correo = '', $clave = '')
	{
		if($correo != '' && $clave != '')
		{
			$this->query = "
				SELECT * FROM usuario
				WHERE correo = '$correo' AND clave = '$clave'
			";
			$this->get_results_from_query();

			if(count($this->rows)==1)
			{
				foreach ($this->rows[0] as $campo => $valor) 
				{
					$this->$campo = $valor;
				}
				$_SESSION['usuario'] = $this->idusuario;
				$this->mensaje = "Sesión estable";
			}
			else
			{
				$this->mensaje = "Error de sesión";
			}
		}
		else
		{
			$this->mensaje = "Error de datos";
		}
	}

	public function getIdUsuario()
	{
		return $this->idusuario;
	}

	public function getNombre()
	{
		return $this->nombre;
	}

	public function getApellidoPaterno()
	{
		return $this->apellidoPaterno;
	}

	public function getApellidoMaterno()
	{
		return $this->apellidoMaterno;
	}

	public function getNacionalidad()
	{
		return $this->nacionalidad;
	}

	public function getSexo()
	{
		return $this->sexo;
	}

	public function getCorreo()
	{
		return $this->correo;
	}

	public function getClave()
	{
		return $this->clave;
	}
}
?>
</html>