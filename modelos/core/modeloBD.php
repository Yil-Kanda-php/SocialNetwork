<?php
	abstract class ModeloBD
	{
		//La clase consiste en atributos; los atributos estáticos son los que nos permitirá acceder la configuración
		//de nuestra base de datos.
		private static $db_host="localhost";
		private static $db_user="root";
		private static $db_password="toor";
		//Los atributos protegidos se encargaran de guardar el proceso dentro de la clase, como por ejemplo el atributo query
		//lo usaremos para generar las peticiones SQL, la row guardara todos los datos que se obtengan de la petición (query).
		protected $db_name="socialnetwork";
		protected $query;
		protected $rows=array();
		private $conexion;
		public $mensaje="Conexión realizada con éxito";

		public function __construct()
		{
        	parent::__construct();
    	}
		//Los métodos abstractos get, set, edit y delete serán agregados obligatoriamente en cualquier clase que se herede de ella,
		//usando la palabra reservada extends. Si estos métodos no son agregados a la clase hija, marcara un error.
		abstract protected function get();
		abstract protected function set();
		abstract protected function edit();
		abstract protected function delete();

		//Este método se encargara de abrir la conexión usando dichos atributos estáticos.
		public function open_connection()
		{
			$this->conexion = new mysqli(self::$db_host,self::$db_user,self::$db_password, $this->db_name);
		}

		//Cerrara la conexión.
		public function close_connection()
		{
			$this->conexion->close();
		}

		//Método que permitirá hacer las peticiones simples, las que no es necesario obtener datos.
		protected function execute_single_quey()
		{
			$this->open_connection();
			$this->conexion->query($this->query);
			$this->close_connection();
		}

		//Este método nos generara un arreglo con dichos datos, listos para mostrar.
		protected function get_result_from_query()
		{
			$this->open_connection();
			$result = $this->conexion->query($this->query);
			while($this->rows[] = $result->fetch_assoc());
			$result->close();
			$this->close_connection();
			array_pop($this->rows);
		}
	}

?>
