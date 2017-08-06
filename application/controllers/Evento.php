<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evento extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model(SYS_MODEL);
		$this->load->model(EVENTO_MODEL);
		$this->load->helper(SYS_HELPER);
	}

	// Index
	function index(){
		if(!$this->session->userdata(IDUSU_SESSION)){
			redirect(USUARIO_LOGIN, 'refresh');
		}
		$data['evento'] = $this->Sys_model->getEventos();
		$data['evento_rules'] = $this->Evento_model->evento_rules;

		$this->load->view(HEADER);
		$this->load->view(MENU);
		$this->load->view(GET_EVENTO,$data);
		$this->load->view(FOOTER);
	}

	//
	function get($ideve = NULL){
		redirect(EVENTO_CONTROLLER, 'refresh');
	}

	//
	function add(){
		redirect(EVENTO_CONTROLLER, 'refresh');
	}

	//
	function edit($ideve = NULL){
		redirect(EVENTO_CONTROLLER, 'refresh');
	}
}