<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Codigo_model extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	// Obtener informacion de codigo
	function get($idcod){
		$this->db->where(IDCOD,$idcod);
		$this->db->where(ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
		$query=$this->db->get(TABLA_CODIGO);

		if($query->num_rows()>0){
			return $query;
		}else{
			return false;
		}
	}

	// Insertar informacion de codigo
	function add($data){
		$data=array(
			IDCOD => NULL,
			IDCODORI => NULL,
			IDUSU => $data[IDUSU],
			TITULO => $data[TITULO],
			DESCRIPCION => $data[DESCRIPCION],
			LENGUAJE => $data[LENGUAJE],
			CODIGO => $data[CODIGO],
			VISTAS => 0,
			DESCARGAS => 0,
			EJECUCIONES => 0,
			ESTADO_CODIGO => ESTADO_CODIGO_EDICION,
			FECHA_REGISTRO => date(FORMATO_FECHA_SAVE),
			FECHA_EDICION => date(FORMATO_FECHA_SAVE),
			ESTADO_REGISTRO => ESTADO_REGISTRO_ACTIVO
		);
		$query=$this->db->insert(TABLA_CODIGO,$data);
		return $query;
	}

	// Editar informacion de codigo
	function edit($idcod,$data){
		$data=array(
			TITULO => $data[TITULO],
			DESCRIPCION => $data[DESCRIPCION],
			LENGUAJE => $data[LENGUAJE],
			CODIGO => $data[CODIGO],
			FECHA_EDICION => date(FORMATO_FECHA_SAVE)
		);
		$this->db->where(IDCOD,$idcod);
		$this->db->where(ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
		$query=$this->db->update(TABLA_CODIGO,$data);
		return $query;
	}

	// Eliminar informacion de codigo
	function del($idcod){
		$data=array(
			ESTADO_REGISTRO => ESTADO_REGISTRO_ELIMINADO
		);
		$this->db->where(IDCOD,$idcod);
		$this->db->where(ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
		$query=$this->db->update(TABLA_CODIGO,$data);
		return $query;
	}

	//
	function send($idcod){
		$data=array(
			ESTADO_CODIGO => ESTADO_CODIGO_ENVIADO
		);
		$this->db->where(IDCOD,$idcod);
		$this->db->where(ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
		$query=$this->db->update(TABLA_CODIGO,$data);
		return $query;
	}
	//
	function aprob($idcod){
		$data=array(
			ESTADO_CODIGO => ESTADO_CODIGO_APROBADO
		);
		$this->db->where(IDCOD,$idcod);
		$this->db->where(ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
		$query=$this->db->update(TABLA_CODIGO,$data);
		return $query;
	}

	//
	function noaprob($idcod){
		$data=array(
			ESTADO_CODIGO => ESTADO_CODIGO_EDICION
		);
		$this->db->where(IDCOD,$idcod);
		$this->db->where(ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
		$query=$this->db->update(TABLA_CODIGO,$data);
		return $query;
	}

	//
	function addVistas($idcod){
		$this->db->where(IDCOD,$idcod);
		$this->db->where(ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
		$query=$this->db->get(TABLA_CODIGO);

		if($query->num_rows()>0){
			$data=array(
				VISTAS => ($query->row()->vistas+1)
			);
			$this->db->where(IDCOD,$idcod);
			$this->db->where(ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
			$query=$this->db->update(TABLA_CODIGO,$data);
		}else{
			return false;
		}
	}

	//
	function addDescargas($idcod){
		$this->db->where(IDCOD,$idcod);
		$this->db->where(ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
		$query=$this->db->get(TABLA_CODIGO);

		if($query->num_rows()>0){
			$data=array(
				DESCARGAS => ($query->row()->descargas+1)
			);
			$this->db->where(IDCOD,$idcod);
			$this->db->where(ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
			$query=$this->db->update(TABLA_CODIGO,$data);
		}else{
			return false;
		}
	}

	//
	function addEjecuciones($idcod){
		$this->db->where(IDCOD,$idcod);
		$this->db->where(ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
		$query=$this->db->get(TABLA_CODIGO);

		if($query->num_rows()>0){
			$data=array(
				EJECUCIONES => ($query->row()->ejecuciones+1)
			);
			$this->db->where(IDCOD,$idcod);
			$this->db->where(ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
			$query=$this->db->update(TABLA_CODIGO,$data);
		}else{
			return false;
		}
	}

	// Reglas para formularios
	public $codigo_rules = array(
		IDCOD => array(
			'label' => '#'
		),
		IDCODORI => array(
			'label' => 'IDCODORI'
		),
		IDUSU => array(
			'label' => '#'
		),
		TITULO => array(
			'field' => TITULO,
			'for' => TITULO,
			'label' => 'Titulo',
			'rules' => 'trim|required'
		),
		DESCRIPCION => array(
			'field' => DESCRIPCION,
			'for' => DESCRIPCION,
			'label' => 'Descripcion',
			'rules' => 'trim|required'
		),
		LENGUAJE => array(
			'field' => LENGUAJE,
			'for' => LENGUAJE,
			'label' => 'Lenguaje',
			'rules' => 'trim|required'
		),
		CODIGO => array(
			'field' => CODIGO,
			'for' => CODIGO,
			'label' => 'Codigo fuente',
			'rules' => 'trim|required'
		),
		VISTAS => array(
			'field' => VISTAS,
			'for' => VISTAS,
			'label' => 'Vistas'
		),
		DESCARGAS => array(
			'field' => DESCARGAS,
			'for' => DESCARGAS,
			'label' => 'Descargas'
		),
		EJECUCIONES => array(
			'field' => EJECUCIONES,
			'for' => EJECUCIONES,
			'label' => 'Ejecuciones'
		),
		FECHA_REGISTRO => array(
			'field' => FECHA_REGISTRO,
			'for' => FECHA_REGISTRO,
			'label' => 'Fecha de Registro'
		)
	);
}