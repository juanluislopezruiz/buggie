<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

	public function index()
	{
		
	}

	public function AJAX_CambiarTema()
	{
		$tema = $this->input->post('tema');
		$datos_session = array(
								'tema' => strtolower($tema)
								);
		$this->session->set_userdata($datos_session);
		echo base_url('assets/bootstrap/'.strtolower($tema).'/bootstrap.css');
	}


	public function AJAX_Resolver()
	{
		$this->load->model('Debugger_model');
		$item = $this->input->post('item');
		$categoria = substr($item,0,1);
		$id = substr($item,2);
		//
		$this->db->where('id',$id);
		$this->db->update('errores',array('estado'=>0));
		$json = array(
					'tipo' => 'b',
					'lista_bugs' => $this->Debugger_model->GEN_ListaBugs(),
					'lista_optimizaciones' => $this->Debugger_model->GEN_ListaOptimizaciones(),
					'lista_mejoras' => $this->Debugger_model->GEN_ListaMejoras()
					);
		echo json_encode($json);

	}
}
