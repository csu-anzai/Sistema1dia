<?php

class ConexionBD{
	private $host="localhost";
	private $usuario="root";
	private $clave="";
	private $db="db_presupuesto";

	public $conexion;
	public function __construct(){
		$this->conexion=new mysqli($this->host,$this->usuario,$this->clave,$this->db) or die(mysql_error());
		$this->conexion->set_charset("utf8");
	}

	//Insertar :v
	public function insertar($tabla,$campos,$datos){
		$resultado=$this->conexion->query("Insert into $tabla($campos)values($datos)")or die($this->conexion->error);
		if($resultado)
			return true;
		return false;
	}	
	//borrar :v
	public function borrar($tabla,$condicion){
		$resultado=$this->conexion->query("Delete from $tabla where $condicion")or die($this->conexion->error);
		if($resultado)
			return true;
		return false;
	}

	//actualizar :v
	public function actualizar($tabla,$campos,$condicion){
		$resultado=$this->conexion->query("Update $tabla set $campos where $condicion")or die($this->conexion->error);
		if($resultado)
			return true;
		return false;
	}

	//buscar :v
	public function buscar($tabla,$condicion){
		$resultado=$this->conexion->query("select * from $tabla where $condicion")or die($this->conexion->error);
		if($resultado)
			return $resultado->fetch_all(MYSQLI_ASSOC);
		return false;
	}
	public function validar2($condicion){
		$resultado=$this->conexion->query("select usuario.id_usuario, usuario.usuario, usuario.contraseña, tipousuario.nombre,tipousuario.id , empleado.nombres,empleado.id_empleado,empleado.estado FROM (usuario inner join tipousuario on usuario.tipousuario_id = tipousuario.id) inner join empleado on usuario.empleado_id_empleado= empleado.id_empleado where $condicion")or die($this->conexion->error);
		if($resultado)
			return $resultado->fetch_all(MYSQLI_ASSOC);
		return false;
	}
}

?>