<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evento_model extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	// Obtener informacion de evento
	function get($ideve){
		$this->db->where(IDEVE,$ideve);
		$this->db->where(ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
		$query=$this->db->get(TABLA_EVENTO);

		if($query->num_rows()>0){
			return $query;
		}else{
			return false;
		}
	}

	// Insertar informacion de evento
	function add($data){
		$data=array(
			IDEVE => NULL,
			IDUSU => $data[IDUSU],
			IDCOD => $data[IDCOD],
			IDCODORI => $data[IDCODORI],
			ACCION => ACCION_CODIGO_NUEVO,
			FECHA_REGISTRO => date(FORMATO_FECHA_SAVE),
			FECHA_EDICION => date(FORMATO_FECHA_SAVE),
			ESTADO_REGISTRO => ESTADO_REGISTRO_ACTIVO
		);
		$query=$this->db->insert(TABLA_EVENTO,$data);
		return $query;
	}

	// Editar informacion de evento
	function edit($ideve,$data){
		$data=array(
			ACCION => $data[ACCION],
			FECHA_EDICION => date(FORMATO_FECHA_SAVE)
		);
		$this->db->where(IDEVE,$ideve);
		$this->db->where(ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
		$query=$this->db->update(TABLA_EVENTO,$data);
		return $query;
	}

	// Eliminar informacion de evento
	function del($ideve){
		$data=array(
			ESTADO_REGISTRO => ESTADO_REGISTRO_ELIMINADO
		);
		$this->db->where(IDEVE,$ideve);
		$this->db->where(ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
		$query=$this->db->update(TABLA_EVENTO,$data);
		return $query;
	}

	// Reglas para formularios
	public $evento_rules = array(
		IDEVE => array(
			'label' => '#'
		),
		DESCRIPCION => array(
			'label' => 'Descripcion'
		)
	);
}