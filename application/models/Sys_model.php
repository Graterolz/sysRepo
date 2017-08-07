<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sys_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public $form_attributes = array(
		'role' => 'form',
		'autocomplete' => 'off'
	);

	public $generos = array(
		'' => '(None)',
		'Masculino' => 'Masculino',
		'Femenino' => 'Femenino'
	);

	public $nacionalidad = array(
		'' => '(None)',
		'Venezolano/a' => 'Venezolano/a',
		'Extranjero/a' => 'Extranjero/a'
	);

	public $lenguaje = array(
		'' => '(None)',
		'JavaScript' => 'JavaScript'
	);

	public $template = '
<!DOCTYPE html>
<html>
	<head>
		<title>Template</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	</head>
	<body>
		<script type="text/javascript">
			//Inserte codigo aqui..
		</script>
	</body>
</html>';

	// Obtener informacion de codigos por usuario
	function getCodigosByUsuario($idusu){
		$this->db->where(IDUSU,$idusu);
		$this->db->where(ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
		$query=$this->db->get(TABLA_CODIGO);
				
		if($query->num_rows()>0){
			return $query;
		}else{
			return false;
		}
	}	

	//
	function getEventos(){
		$this->db->select(
			TABLA_EVENTO.'.'.IDEVE.','.
			TABLA_EVENTO.'.'.IDUSU.','.
			TABLA_EVENTO.'.'.IDCOD.','.
			TABLA_EVENTO.'.'.IDCODORI.','.
			TABLA_EVENTO.'.'.ACCION.','.
			TABLA_USUARIO.'.'.NOMBRE.','.
			TABLA_USUARIO.'.'.APELLIDO.','.
			TABLA_USUARIO.'.'.USER.','.
			TABLA_CODIGO.'.'.TITULO.','.
			TABLA_EVENTO.'.'.FECHA_REGISTRO
		);
		$this->db->from(TABLA_EVENTO);
		$this->db->join(
			TABLA_USUARIO,
			TABLA_USUARIO.'.'.IDUSU.'='.TABLA_EVENTO.'.'.IDUSU,
			'INNER'
		);
		$this->db->join(
			TABLA_CODIGO,
			TABLA_CODIGO.'.'.IDCOD.'='.TABLA_EVENTO.'.'.IDCOD,
			'INNER'
		);
		$this->db->where(TABLA_EVENTO.'.'.ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
		$this->db->where(TABLA_USUARIO.'.'.ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
		$this->db->where(TABLA_CODIGO.'.'.ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
		$this->db->order_by(1,'DESC');
		
		$query=$this->db->get();
		//echo $this->db->last_query();
		
		if($query->num_rows()>0){
			return $query;
		}else{
			return false;
		}
	}

	//
	function getCodigosBuzon(){
		$this->db->select(
			TABLA_CODIGO.'.'.IDCOD.','.
			TABLA_CODIGO.'.'.TITULO.','.
			TABLA_CODIGO.'.'.FECHA_REGISTRO.','.
			TABLA_USUARIO.'.'.USER
		);
		$this->db->from(TABLA_CODIGO);
		$this->db->join(
			TABLA_USUARIO,
			TABLA_USUARIO.'.'.IDUSU.'='.TABLA_CODIGO.'.'.IDUSU,
			'INNER'
		);
		$this->db->where(TABLA_CODIGO.'.'.ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
		$this->db->where(TABLA_CODIGO.'.'.ESTADO_CODIGO,ESTADO_CODIGO_ENVIADO);
		$this->db->where(TABLA_USUARIO.'.'.ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
		$this->db->order_by(1,'ASC');
		
		$query=$this->db->get();
		//echo $this->db->last_query();
		
		if($query->num_rows()>0){
			return $query;
		}else{
			return false;
		}
	}

	// Reporte de codigos por usuario
	function getReportUsuarios(){
		$this->db->select(
			'MAX('.TABLA_USUARIO.'.'.IDUSU.') AS '.IDUSU.','.
			TABLA_USUARIO.'.'.USER.','.
			'COUNT(*) AS '.CANTIDAD
		);		
		$this->db->from(TABLA_USUARIO);
		$this->db->join(
			TABLA_CODIGO,
			TABLA_USUARIO.'.'.IDUSU.'='.TABLA_CODIGO.'.'.IDUSU,
			'INNER'
		);
		$this->db->where(TABLA_CODIGO.'.'.ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
		$this->db->group_by(TABLA_USUARIO.'.'.USER);
		$this->db->order_by(3,'DESC');
		$this->db->order_by(2,'ASC');
		$this->db->limit(5);
		$query=$this->db->get();
		// echo $this->db->last_query();

		if($query->num_rows()>0){
			return $query;
		}else{
			return false;
		}
	}

	// Reporte de codigos por vistas
	function getReportVistas(){
		$this->db->select(
			TABLA_CODIGO.'.'.TITULO.','.
			TABLA_CODIGO.'.'.VISTAS
		);
		$this->db->from(TABLA_CODIGO);
		$this->db->where(TABLA_CODIGO.'.'.ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
		$this->db->order_by(2,'DESC');
		$this->db->order_by(1,'ASC');
		$this->db->limit(5);
		$query=$this->db->get();
		// echo $this->db->last_query();

		if($query->num_rows()>0){
			return $query;
		}else{
			return false;
		}		
	}

	// Reporte de codigos por descargas
	function getReportDescargas(){
		$this->db->select(
			TABLA_CODIGO.'.'.TITULO.','.
			TABLA_CODIGO.'.'.DESCARGAS
		);
		$this->db->from(TABLA_CODIGO);
		$this->db->where(TABLA_CODIGO.'.'.ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
		$this->db->order_by(2,'DESC');
		$this->db->order_by(1,'ASC');
		$this->db->limit(5);
		$query=$this->db->get();
		// echo $this->db->last_query();

		if($query->num_rows()>0){
			return $query;
		}else{
			return false;
		}
	}

	// Reporte de codigos por ejecuciones
	function getReportEjecuciones(){
		$this->db->select(
			TABLA_CODIGO.'.'.TITULO.','.
			TABLA_CODIGO.'.'.EJECUCIONES
		);
		$this->db->from(TABLA_CODIGO);
		$this->db->where(TABLA_CODIGO.'.'.ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
		$this->db->order_by(2,'DESC');
		$this->db->order_by(1,'ASC');
		$this->db->limit(5);
		$query=$this->db->get();
		// echo $this->db->last_query();

		if($query->num_rows()>0){
			return $query;
		}else{
			return false;
		}
	}

	// Obtiene cantidad de codigos por estado
	function getCodigoByEstado($estado_codigo){
		$this->db->select(
			'COUNT(*) AS '.CANTIDAD
		);
		$this->db->from(TABLA_CODIGO);
		$this->db->where(TABLA_CODIGO.'.'.ESTADO_CODIGO,$estado_codigo);
		$this->db->where(TABLA_CODIGO.'.'.ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
		$query=$this->db->get();
		// echo $this->db->last_query();

		if($query->num_rows()>0){
			return $query;
		}else{
			return false;
		}
	}

	// Obtener informacion de usuario por nombre
	function getUserName($user){
		$this->db->from(TABLA_USUARIO);
		$this->db->where(TABLA_USUARIO.'.'.USER,$user);
		$this->db->where(TABLA_USUARIO.'.'.ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
		$query=$this->db->get();
		// echo $this->db->last_query();

		if($query->num_rows()>0){
			return $query;
		}else{
			return false;
		}
	}

	//
	function searchCodigo($string){
		$this->db->from(TABLA_CODIGO);
		$this->db->like(TABLA_CODIGO.'.'.TITULO,$string);
		$this->db->where(TABLA_CODIGO.'.'.ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
		$query=$this->db->get();
		// echo $this->db->last_query();

		if($query->num_rows()>0){
			return $query;
		}else{
			return false;
		}
	}
}
