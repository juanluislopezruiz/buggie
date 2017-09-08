<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$data['tab_activa'] = $this->input->get('t');
		if(trim($data['tab_activa']) == '')
		{
			$data['tab_activa'] = 1;
		}

		$data['lista_bugs']=$this->debugger_model->GEN_ListaBugs();
		$data['lista_mejoras']=$this->debugger_model->GEN_ListaMejoras();
		$data['lista_optimizaciones']=$this->debugger_model->GEN_ListaOptimizaciones();
		$data['historial']=$this->debugger_model->GEN_Historial();

		$data['badge_bugs']=$this->debugger_model->GEN_BadgeBugs();
		$data['badge_mejoras']=$this->debugger_model->GEN_BadgeMejoras();
		$data['badge_optimizaciones']=$this->debugger_model->GEN_Badgeoptimizaciones();

		$this->load->view('header_view');
		$this->load->view('navbar_view');
		$this->load->view('home_view',$data);
		$this->load->view('footer_view');
	}

	public function reportar_bug()
	{
		$titulo= $this->input->post('txttitulo');
		$descripcion= $this->input->post('txtdescripcion');
		$this->debugger_model->SAVE($titulo,$descripcion,'b');
		redirect('home?t=1');
	}

	public function reportar_mejora()
	{
		$titulo= $this->input->post('txttitulo');
		$descripcion= $this->input->post('txtdescripcion');
		$this->debugger_model->SAVE($titulo,$descripcion,'m');
		redirect('home?t=2');
	}

	public function reportar_optimizacion()
	{
		$titulo= $this->input->post('txttitulo');
		$descripcion= $this->input->post('txtdescripcion');
		$this->debugger_model->SAVE($titulo,$descripcion,'o');
		redirect('home?t=3');
	}
}
