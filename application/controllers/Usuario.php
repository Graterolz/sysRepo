<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model(SYS_MODEL);
		$this->load->model(USUARIO_MODEL);
		$this->load->model(CODIGO_MODEL);
		$this->load->helper(SYS_HELPER);
	}

	// Index
	function index(){
		if(!$this->session->userdata(IDUSU_SESSION)){
			redirect(USUARIO_LOGIN, 'refresh');
		}

		$idusu = $this->session->userdata(IDUSU_SESSION);
		$this->get($idusu);
	}

	// Obtener informacion de usuario
	function get($idusu = NULL){
		if(!$this->session->userdata(IDUSU_SESSION)){
			redirect(USUARIO_LOGIN, 'refresh');
		}
		if($idusu == NULL){
			redirect(USUARIO_CONTROLLER, 'refresh');
		}		
		if(!$this->Usuario_model->get($idusu)){
			redirect(USUARIO_CONTROLLER, 'refresh');
		}
		$data['usuario'] = $this->Usuario_model->get($idusu);
		$data['codigo'] = $this->Sys_model->getCodigosByUsuario($idusu);
		$data['usuario_rules'] = $this->Usuario_model->usuario_rules;
		$data['codigo_rules'] = $this->Codigo_model->codigo_rules;
		$data['generos'] = $this->Sys_model->generos;
		$data['nacionalidad'] = $this->Sys_model->nacionalidad;

		$this->load->view(HEADER);
		$this->load->view(MENU);
		$this->load->view(GET_USUARIO,$data);
		$this->load->view(FOOTER);
	}

	//
	function edit($idusu){
		if(!$this->session->userdata(IDUSU_SESSION)){
			redirect(USUARIO_LOGIN, 'refresh');
		}
		if($idusu == NULL){
			redirect(USUARIO_CONTROLLER, 'refresh');
		}
		if(!$this->Usuario_model->get($idusu)){
			redirect(USUARIO_CONTROLLER, 'refresh');
		}

		$rules = $this->Usuario_model->usuario_rules;
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$data = array(
				CEDULA => $this->input->post(CEDULA),
				NOMBRE => $this->input->post(NOMBRE),
				APELLIDO => $this->input->post(APELLIDO),
				GENERO => $this->input->post(GENERO),
				FECHA_NACIMIENTO => $this->input->post(FECHA_NACIMIENTO),
				NACIONALIDAD => $this->input->post(NACIONALIDAD),
				DIRECCION => $this->input->post(DIRECCION),
				TELEFONO => $this->input->post(TELEFONO),
				EMAIL => $this->input->post(EMAIL)
			);
			$this->Usuario_model->edit($idusu,$data);
			redirect(USUARIO_CONTROLLER, 'refresh');
		}		

		$data['usuario'] = $this->Usuario_model->get($idusu);
		$data['usuario_rules'] = $rules;
		$data['form_attributes'] = $this->Sys_model->form_attributes;
		$data['generos'] = $this->Sys_model->generos;
		$data['nacionalidad'] = $this->Sys_model->nacionalidad;

		$this->load->view(HEADER);
		$this->load->view(MENU);
		$this->load->view(EDIT_USUARIO,$data);
		$this->load->view(FOOTER);
	}

	// Login
	function login(){
		if($this->input->post(USER) && $this->input->post(PASS)){
			$data = array(
				USER => $this->input->post(USER),
				PASS => $this->input->post(PASS)
			);
			if($this->Usuario_model->login($data)){
				$data['info'] = $this->Usuario_model->login($data);
				$datasession  = array(
					IDUSU_SESSION => $data['info']->result()[0]->idusu,
					IDROL_SESSION => $data['info']->result()[0]->idrol
				);
				$this->session->set_userdata($datasession);
			}
		}
		if($this->session->userdata(IDUSU_SESSION)){
			redirect(USUARIO_CONTROLLER, 'refresh');
		}
		
		$data['form_attributes'] = $this->Sys_model->form_attributes;

		$this->load->view(HEADER);
		$this->load->view(GET_LOGIN,$data);
		$this->load->view(FOOTER);
	}

	// Logout
	function logout(){
		$this->session->sess_destroy();
		redirect(USUARIO_CONTROLLER, 'refresh');
	}

	// Register
	function register(){
		if($this->session->userdata(IDUSU_SESSION)){
			redirect(USUARIO_CONTROLLER, 'refresh');
		}

		$data['message'] = NULL;
		$rules = $this->Usuario_model->usuario_register_rules;
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			if(!$this->Sys_model->getUserName($this->input->post(USER))){
				$data['message'] = 'Nombre de usuario no es valido.';
			}else{
				if($this->input->post(PASS) == $this->input->post(PASS2)){
					$data = array(
						IDROL => USR,
						CEDULA => $this->input->post(CEDULA),
						NOMBRE => $this->input->post(NOMBRE),
						APELLIDO => $this->input->post(APELLIDO),
						GENERO => $this->input->post(GENERO),
						FECHA_NACIMIENTO => $this->input->post(FECHA_NACIMIENTO),
						NACIONALIDAD => $this->input->post(NACIONALIDAD),
						DIRECCION => $this->input->post(DIRECCION),
						TELEFONO => $this->input->post(TELEFONO),
						EMAIL => $this->input->post(EMAIL),
						USER => $this->input->post(USER),
						PASS => $this->input->post(PASS)
					);
					$this->Usuario_model->add($data);
					unset($data);
					//
					$data = array(
						USER => $this->input->post(USER),
						PASS => $this->input->post(PASS)
					);
					if($this->Usuario_model->login($data)){
						$data['info'] = $this->Usuario_model->login($data);
						$datasession  = array(
							IDUSU_SESSION => $data['info']->result()[0]->idusu,
							IDROL_SESSION => $data['info']->result()[0]->idrol
						);
						$this->session->set_userdata($datasession);
					}
					if($this->session->userdata(IDUSU_SESSION)){
						redirect(USUARIO_CONTROLLER, 'refresh');
					}
				}else{
					$data['message'] = 'Contraseñas incorrectas';
				}				
			}
		}

		$data['usuario_rules'] = $rules;
		$data['form_attributes'] = $this->Sys_model->form_attributes;
		$data['generos'] = $this->Sys_model->generos;
		$data['nacionalidad'] = $this->Sys_model->nacionalidad;

		$this->load->view(HEADER);
		$this->load->view(GET_REGISTER,$data);
		$this->load->view(FOOTER);
	}

	// Reports
	function reports(){
		if(!$this->session->userdata(IDUSU_SESSION)){
			redirect(USUARIO_LOGIN, 'refresh');
		}

		$data['report_usuario'] = $this->Sys_model->getReportUsuarios();
		$data['report_vistas'] = $this->Sys_model->getReportVistas();		
		$data['report_descargas'] = $this->Sys_model->getReportDescargas();
		$data['report_ejecuciones'] = $this->Sys_model->getReportEjecuciones();


		$data['estado_codigo_edicion'] = $this->Sys_model->getCodigoByEstado(ESTADO_CODIGO_EDICION);
		$data['estado_codigo_enviado'] = $this->Sys_model->getCodigoByEstado(ESTADO_CODIGO_ENVIADO);
		$data['estado_codigo_aprobado'] = $this->Sys_model->getCodigoByEstado(ESTADO_CODIGO_APROBADO);

		$data['report_rules'] = $this->Usuario_model->report_rules;

		$this->load->view(HEADER);
		$this->load->view(MENU);
		$this->load->view(REPORT_USUARIO,$data);
		$this->load->view(FOOTER);
	}
}