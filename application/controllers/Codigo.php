<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Codigo extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model(SYS_MODEL);
		$this->load->model(CODIGO_MODEL);
		$this->load->model(USUARIO_MODEL);
		$this->load->model(EVENTO_MODEL);
	}

	// Index
	function index(){
		if(!$this->session->userdata(IDUSU_SESSION)){
			redirect(USUARIO_LOGIN, 'refresh');
		}

		$data['codigo'] = $this->Sys_model->getCodigosBuzon();
		$data['codigo_rules'] = $this->Codigo_model->codigo_rules;
		$data['usuario_rules'] = $this->Usuario_model->usuario_rules;

		$this->load->view(HEADER);
		$this->load->view(MENU);
		$this->load->view(LIST_CODIGO_ADM,$data);
		$this->load->view(FOOTER);
	}

	// Obtener informacion de codigo
	function get($idcod = NULL){
		if(!$this->session->userdata(IDUSU_SESSION)){
			redirect(USUARIO_LOGIN, 'refresh');
		}
		if($idcod == NULL){
			redirect(USUARIO_CONTROLLER, 'refresh');
		}
		if(!$this->Codigo_model->get($idcod)){
			redirect(USUARIO_CONTROLLER, 'refresh');
		}

		$data['codigo'] = $this->Codigo_model->get($idcod);
		$data['codigo_rules'] = $this->Codigo_model->codigo_rules;
		$data['lenguaje'] = $this->Sys_model->lenguaje;

		$this->load->view(HEADER);
		$this->load->view(MENU);
		$this->load->view(GET_CODIGO,$data);
		$this->load->view(FOOTER);

		// Agrega visita
		if($this->session->userdata(IDUSU_SESSION) != $data['codigo']->row()->idusu){
			$this->Codigo_model->addVistas($idcod);
		}
	}

	//
	function add(){
		if(!$this->session->userdata(IDUSU_SESSION)){
			redirect(USUARIO_LOGIN, 'refresh');
		}

		$rules = $this->Codigo_model->codigo_rules;
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$data = array(
				IDUSU => $this->session->userdata(IDUSU_SESSION),
				TITULO => $this->input->post(TITULO),
				DESCRIPCION => $this->input->post(DESCRIPCION),
				LENGUAJE => $this->input->post(LENGUAJE),
				CODIGO => $this->input->post(CODIGO)
			);
			$this->Codigo_model->add($data);
			redirect(USUARIO_CONTROLLER, 'refresh');
		}

		$data['codigo_rules'] = $rules;
		$data['form_attributes'] = $this->Sys_model->form_attributes;
		$data['lenguaje'] = $this->Sys_model->lenguaje;
		$data['template'] = $this->Sys_model->template;
		
		$this->load->view(HEADER);
		$this->load->view(MENU);
		$this->load->view(ADD_CODIGO,$data);
		$this->load->view(FOOTER);
	}

	//
	function edit($idcod = NULL){
		if(!$this->session->userdata(IDUSU_SESSION)){
			redirect(USUARIO_LOGIN, 'refresh');
		}
		if($idcod == NULL){
			redirect(USUARIO_CONTROLLER, 'refresh');
		}
		if(!$this->Codigo_model->get($idcod)){
			redirect(USUARIO_CONTROLLER, 'refresh');
		}

		$rules = $this->Codigo_model->codigo_rules;
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$data = array(
				TITULO => $this->input->post(TITULO),
				DESCRIPCION => $this->input->post(DESCRIPCION),
				LENGUAJE => $this->input->post(LENGUAJE),
				CODIGO => $this->input->post(CODIGO)
			);
			$this->Codigo_model->edit($idcod,$data);
			redirect(USUARIO_CONTROLLER, 'refresh');
		}		

		$data['codigo'] = $this->Codigo_model->get($idcod);
		$data['codigo_rules'] = $rules;
		$data['form_attributes'] = $this->Sys_model->form_attributes;
		$data['lenguaje'] = $this->Sys_model->lenguaje;

		$this->load->view(HEADER);
		$this->load->view(MENU);
		$this->load->view(EDIT_CODIGO,$data);
		$this->load->view(FOOTER);
	}

	// Eliminar informacion de codigo
	function del($idcod = NULL){
		redirect(USUARIO_CONTROLLER, 'refresh');
		
		if(!$this->session->userdata(IDUSU_SESSION)){
			redirect(USUARIO_LOGIN, 'refresh');
		}
		if($idcod == NULL){
			redirect(USUARIO_CONTROLLER, 'refresh');
		}
		if(!$this->Codigo_model->get($idcod)){
			redirect(USUARIO_CONTROLLER, 'refresh');
		}
		$this->Codigo_model->del($idcod);
		redirect(USUARIO_CONTROLLER, 'refresh');
	}

	// Enviar codigo al buzon
	function send($idcod = NULL){
		if(!$this->session->userdata(IDUSU_SESSION)){
			redirect(USUARIO_LOGIN, 'refresh');
		}
		if($idcod == NULL){
			redirect(USUARIO_CONTROLLER, 'refresh');
		}
		if(!$this->Codigo_model->get($idcod)){
			redirect(USUARIO_CONTROLLER, 'refresh');
		}
		$this->Codigo_model->send($idcod);

		if($this->session->userdata(IDROL_SESSION) == ADM){
			$this->aprob($idcod);
		}else{
			redirect(USUARIO_CONTROLLER, 'refresh');
		}		
	}

	// Aprobar codigo del buzon
	function aprob($idcod){
		if(!$this->session->userdata(IDUSU_SESSION)){
			redirect(USUARIO_LOGIN, 'refresh');
		}
		if($idcod == NULL){
			redirect(USUARIO_CONTROLLER, 'refresh');
		}
		if(!$this->Codigo_model->get($idcod)){
			redirect(USUARIO_CONTROLLER, 'refresh');
		}
		if($this->session->userdata(IDROL_SESSION) == ADM){
			$codigo = $this->Codigo_model->get($idcod);
			$this->Codigo_model->aprob($idcod);

			$data = array(
				IDUSU => $codigo->result()[0]->idusu,
				IDCOD => $codigo->result()[0]->idcod,
				IDCODORI => $codigo->result()[0]->idcodori
			);
			$this->Evento_model->add($data);
		}

		if($this->session->userdata(IDROL_SESSION) == ADM){
			redirect(USUARIO_CONTROLLER, 'refresh');
		}else{
			redirect(CODIGO_CONTROLLER, 'refresh');
		}		
	}

	//
	function noaprob($idcod){
		if(!$this->session->userdata(IDUSU_SESSION)){
			redirect(USUARIO_LOGIN, 'refresh');
		}
		if($idcod == NULL){
			redirect(USUARIO_CONTROLLER, 'refresh');
		}
		if(!$this->Codigo_model->get($idcod)){
			redirect(USUARIO_CONTROLLER, 'refresh');
		}
		if($this->session->userdata(IDROL_SESSION) == ADM){
			$this->Codigo_model->noAprob($idcod);
		}
		redirect(CODIGO_CONTROLLER, 'refresh');
	}

	//
	function download($idcod = NULL){
		if(!$this->session->userdata(IDUSU_SESSION)){
			redirect(USUARIO_LOGIN, 'refresh');
		}
		if($idcod == NULL){
			redirect(USUARIO_CONTROLLER, 'refresh');
		}
		if(!$this->Codigo_model->get($idcod)){
			redirect(USUARIO_CONTROLLER, 'refresh');
		}

		$data['codigo'] = $this->Codigo_model->get($idcod);

		$this->load->helper('file');
		$codigo = $data['codigo']->row()->codigo;
		$url = FCPATH.'temp/file.html';

		if (write_file($url, $codigo)){
			$this->load->helper('download');

			// Agrega descarga
			if($this->session->userdata(IDUSU_SESSION) != $data['codigo']->row()->idusu){
				$this->Codigo_model->addDescargas($idcod);
			}
			force_download($url, NULL);
		}
		else {
			redirect(USUARIO_CONTROLLER, 'refresh');
		}
	}

	function execute($idcod = NULL){
		if(!$this->session->userdata(IDUSU_SESSION)){
			redirect(USUARIO_LOGIN, 'refresh');
		}
		if($idcod == NULL){
			redirect(USUARIO_CONTROLLER, 'refresh');
		}
		if(!$this->Codigo_model->get($idcod)){
			redirect(USUARIO_CONTROLLER, 'refresh');
		}

		$data['codigo'] = $this->Codigo_model->get($idcod);

		$this->load->view(HEADER);
		$this->load->view(EXE_CODIGO,$data);
		$this->load->view(FOOTER);
	}
}