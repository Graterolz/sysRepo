<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	// Obtener informacion de usuario
	function get($idusu){
		$this->db->where(IDUSU,$idusu);
		$this->db->where(ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
		$query=$this->db->get(TABLA_USUARIO);

		if($query->num_rows()>0){
			return $query;
		}else{
			return false;
		}
	}

	// Insertar informacion de usuario
	function add($data){
		$data=array(
			IDUSU => NULL,
			IDROL => $data[IDROL],
			CEDULA => $data[CEDULA],
			NOMBRE => $data[NOMBRE],
			APELLIDO => $data[APELLIDO],
			GENERO => $data[GENERO],
			FECHA_NACIMIENTO => $data[FECHA_NACIMIENTO],
			NACIONALIDAD => $data[NACIONALIDAD],
			DIRECCION => $data[DIRECCION],
			TELEFONO => $data[TELEFONO],
			EMAIL => $data[EMAIL],
			USER => $data[USER],
			PASS => $data[PASS],
			FECHA_REGISTRO => date(FORMATO_FECHA_SAVE),
			FECHA_EDICION => date(FORMATO_FECHA_SAVE),
			ESTADO_REGISTRO => ESTADO_REGISTRO_ACTIVO
		);		
		$query=$this->db->insert(TABLA_USUARIO,$data);
		return $query;
	}

	// Editar informacion de usuario
	function edit($idusu,$data){
		$data=array(
			CEDULA => $data[CEDULA],
			NOMBRE => $data[NOMBRE],
			APELLIDO => $data[APELLIDO],
			GENERO => $data[GENERO],
			FECHA_NACIMIENTO => $data[FECHA_NACIMIENTO],
			NACIONALIDAD => $data[NACIONALIDAD],
			DIRECCION => $data[DIRECCION],
			TELEFONO => $data[TELEFONO],
			EMAIL => $data[EMAIL],
			// USER => $data[USER],
			// PASS => $data[PASS],
			FECHA_EDICION => date(FORMATO_FECHA_SAVE)
		);
		$this->db->where(IDUSU,$idusu);
		$this->db->where(ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
		$query=$this->db->update(TABLA_USUARIO,$data);
		return $query;
	}

	// Eliminar informacion de usuario
	function del($idusu){
		$data=array(
			ESTADO_REGISTRO => ESTADO_REGISTRO_ELIMINADO
		);
		$this->db->where(IDUSU,$idusu);
		$this->db->where(ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
		$query=$this->db->update(TABLA_USUARIO,$data);
		return $query;
	}

	// Login de usuario
	function login($data){
		$this->db->where(USER,$data[USER]);
		$this->db->where(PASS,$data[PASS]);
		$this->db->where(ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
		$this->db->limit(1);
		$query=$this->db->get(TABLA_USUARIO);

		if($query->num_rows()>0){
			return $query;
		}else{
			return false;
		}
	}

	// Reglas para formularios
	public $usuario_rules = array(
		IDUSU => array(
			'label' => 'IDUSU'
		),
		CEDULA => array(
			'field' => CEDULA,
			'for' => CEDULA,
			'label' => 'Cedula',
			'rules' => 'trim|required'
		),
		NOMBRE => array(
			'field' => NOMBRE,
			'for' => NOMBRE,
			'label' => 'Nombre',
			'rules' => 'trim|required'
		),
		APELLIDO => array(
			'field' => APELLIDO,
			'for' => APELLIDO,
			'label' => 'Apellido',
			'rules' => 'trim|required'
		),
		GENERO => array(
			'field' => GENERO,
			'for' => GENERO,
			'label' => 'Genero',
			'rules' => 'trim|required'
		),
		FECHA_NACIMIENTO => array(
			'field' => FECHA_NACIMIENTO,
			'for' => FECHA_NACIMIENTO,
			'label' => 'Fecha de Nacimiento',
			'rules' => 'trim|required'
		),
		NACIONALIDAD => array(
			'field' => NACIONALIDAD,
			'for' => NACIONALIDAD,
			'label' => 'Nacionalidad',
			'rules' => 'trim|required'
		),
		DIRECCION => array(
			'field' => DIRECCION,
			'for' => DIRECCION,
			'label' => 'Direccion',
			'rules' => 'trim|required'
		),
		TELEFONO => array(
			'field' => TELEFONO,
			'for' => TELEFONO,
			'label' => 'Telefono Principal',
			'rules' => 'trim|required'
		),
		EMAIL => array(
			'field' => EMAIL,
			'for' => EMAIL,
			'label' => 'Correo Electronico',
			'rules' => 'trim|required'
		),
		USER => array(
			'field' => USER,
			'for' => USER,
			'label' => 'Usuario'
		)
	);

	//
	public $usuario_register_rules = array(
		CEDULA => array(
			'field' => CEDULA,
			'for' => CEDULA,
			'label' => 'Cedula',
			'rules' => 'trim|required'
		),
		NOMBRE => array(
			'field' => NOMBRE,
			'for' => NOMBRE,
			'label' => 'Nombre',
			'rules' => 'trim|required'
		),
		APELLIDO => array(
			'field' => APELLIDO,
			'for' => APELLIDO,
			'label' => 'Apellido',
			'rules' => 'trim|required'
		),
		GENERO => array(
			'field' => GENERO,
			'for' => GENERO,
			'label' => 'Genero',
			'rules' => 'trim|required'
		),
		FECHA_NACIMIENTO => array(
			'field' => FECHA_NACIMIENTO,
			'for' => FECHA_NACIMIENTO,
			'label' => 'Fecha de Nacimiento',
			'rules' => 'trim|required'
		),
		NACIONALIDAD => array(
			'field' => NACIONALIDAD,
			'for' => NACIONALIDAD,
			'label' => 'Nacionalidad',
			'rules' => 'trim|required'
		),
		DIRECCION => array(
			'field' => DIRECCION,
			'for' => DIRECCION,
			'label' => 'Direccion',
			'rules' => 'trim|required'
		),
		TELEFONO => array(
			'field' => TELEFONO,
			'for' => TELEFONO,
			'label' => 'Telefono Principal',
			'rules' => 'trim|required'
		),
		EMAIL => array(
			'field' => EMAIL,
			'for' => EMAIL,
			'label' => 'Correo Electronico',
			'rules' => 'trim|required'
		),
		USER => array(
			'field' => USER,
			'for' => USER,
			'label' => 'Usuario',
			'rules' => 'trim|required'
		),
		PASS => array(
			'field' => PASS,
			'for' => PASS,
			'label' => 'Contrase;a',
			'rules' => 'trim|required'
		),
		PASS2 => array(
			'field' => PASS2,
			'for' => PASS2,
			'label' => 'Repetir Contrase;a',
			'rules' => 'trim|required'
		)
	);

	public $report_rules = array(
		USER => array(
			'label' => 'Usuario'
		),
		CANTIDAD => array(
			'label' => 'Cantidad'
		),
		TITULO => array(
			'label' => 'Titulo'
		),
		VISTAS => array(
			'label' => 'Vistas'
		),
		DESCARGAS => array(
			'label' => 'Descargas'
		),
		EJECUCIONES => array(
			'label' => 'Ejecuciones'
		)
	);
}