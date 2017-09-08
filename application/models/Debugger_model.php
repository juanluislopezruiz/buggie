<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Debugger_model extends CI_Model 
{

	public function SAVE($titulo,$descripcion,$tipo)
	{
		$write_data= array(
							'titulo' => $titulo,
							'descripcion' => $descripcion,
							'fecha'=>date('Y-m-d',time()),
							'hora'=>date('H:i',time()),
							'estado'=>0,
							'tipo'=>$tipo
							);
		$this->db->insert('errores',$write_data);
	}

	public function GEN_ListaBugs()
	{
		$html='';
		$this->db->order_by('fecha','asc');
		$this->db->order_by('hora','asc');
		$this->db->where('tipo','b');
		$this->db->where('estado',0);
		$consulta = $this->db->get('errores');
		$html.='<div class="row" id="lista_bugs">
					<div class="col-xs-12">';
		if($consulta->num_rows() >0)
		{
			foreach($consulta->result() as $row)
			{
				$html.='
					<div class="row">
						<div class="col-xs-12">
							<h4 data-toggle="collapse" data-target="#b'.dechex($row->id).'" class="pseudo-link">'.nl2br(htmlspecialchars($row->titulo)).'<span class="fa fa-chevron-down pull-right"></span></h4>
							<small><i>Reportado el '.$row->fecha.' a las '.$row->hora.'</i> <strong><span class="pull-right">#'.dechex($row->id).'</span></strong></small>
						</div>
						<div class="col-xs-12 collapse mt-10" id="b'.dechex($row->id).'">
							'.$this->BBCode(nl2br(htmlspecialchars($row->descripcion))).'
							<hr>
							<button type="button" id="b-'.$row->id.'" class="btn-solve btn btn-primary pull-right mt-10">Solucionado</button>
						</div>
					</div>
					<hr>';
			}
		}
			$html.='</div>
				</div>';
		return $html;
	}

	public function GEN_ListaOptimizaciones()
	{
		$html='';
		$this->db->order_by('fecha','asc');
		$this->db->order_by('hora','asc');
		$this->db->where('tipo','o');
		$this->db->where('estado',0);
		$consulta = $this->db->get('errores');
		if($consulta->num_rows() >0)
		{
			$html='';
			foreach($consulta->result() as $row)
			{
				$html.='
					<div class="row">
						<div class="col-xs-12">
							<h4 data-toggle="collapse" data-target="#o'.dechex($row->id).'" class="pseudo-link">'.nl2br(htmlspecialchars($row->titulo)).'<span class="fa fa-chevron-down pull-right"></span></h4>
							<small><i>Reportado el '.$row->fecha.' a las '.$row->hora.'</i> <strong><span class="pull-right">#'.dechex($row->id).'</span></strong></small>
						</div>
						<div class="col-xs-12 collapse mt-10" id="o'.dechex($row->id).'">
							'.$this->BBCode(nl2br(htmlspecialchars($row->descripcion))).'
							<hr>
							<button type="button" id="o-'.$row->id.'" class="btn-solve btn btn-primary pull-right mt-10">Solucionado</button>
						</div>
					</div>
					<hr>';
			}
		}
		return $html;	
	}

	public function GEN_ListaMejoras()
	{
		$html='';
		$this->db->order_by('fecha','asc');
		$this->db->order_by('hora','asc');
		$this->db->where('tipo','m');
		$this->db->where('estado',0);
		$consulta = $this->db->get('errores');
		if($consulta->num_rows() >0)
		{
			foreach($consulta->result() as $row)
			{
				$html.='
					<div class="row">
						<div class="col-xs-12">
							<h4 data-toggle="collapse" data-target="#m'.dechex($row->id).'" class="pseudo-link">'.nl2br(htmlspecialchars($row->titulo)).'<span class="fa fa-chevron-down pull-right"></span></h4>
							<small><i>Reportado el '.$row->fecha.' a las '.$row->hora.'</i> <strong><span class="pull-right">#'.dechex($row->id).'</span></strong></small>
						</div>
						<div class="col-xs-12 collapse mt-10" id="m'.dechex($row->id).'">
							'.$this->BBCode(nl2br(htmlspecialchars($row->descripcion))).'
							<hr>
							<button type="button" id="m-'.$row->id.'" class="btn-solve btn btn-primary pull-right mt-10">Solucionado</button>
						</div>
					</div>
					<hr>';
			}
		}
		return $html;
	}

	public function GEN_BadgeBugs()
	{	
		$this->db->where('tipo','b');
		$this->db->where('estado',0);
		$consulta = $this->db->get('errores');
		$html='';
		if($consulta->num_rows() >0)
		{
			$html.='<span class="badge">'.$consulta->num_rows().'</span>';
		}
		return $html;
	}

	public function GEN_BadgeMejoras()
	{
		$this->db->where('tipo','m');
		$this->db->where('estado',0);
		$consulta = $this->db->get('errores');
		$html='';
		if($consulta->num_rows() >0)
		{
			$html.='<span class="badge">'.$consulta->num_rows().'</span>';
		}
		return $html;
	}

	public function GEN_BadgeOptimizaciones()
	{
		$this->db->where('tipo','o');
		$this->db->where('estado',0);
		$consulta = $this->db->get('errores');
		$html='';
		if($consulta->num_rows() >0)
		{
			$html.='<span class="badge">'.$consulta->num_rows().'</span>';
		}
		return $html;
	}


	public function GEN_Historial()
	{
		$this->db->where('estado',1);
		$this->db->order_by('fecha','asc');
		$this->db->order_by('hora','asc');
		$consulta = $this->db->get('errores');
		if($consulta->num_rows() >0)
		{
			$html='';
			foreach($consulta->result() as $row)
			{
				$html.='
					<div class="row">
						<div class="col-xs-12">
							<h4 data-toggle="collapse" data-target="#h'.dechex($row->id).'" class="pseudo-link">'.nl2br(htmlspecialchars($row->titulo)).'<span class="fa fa-chevron-down pull-right"></span></h4>
							<small><i>Reportado el '.$row->fecha.' a las '.$row->hora.'</i> <strong><span class="pull-right">#'.dechex($row->id).'</span></strong></small>
						</div>
						<div class="col-xs-12 collapse mt-10" id="h'.dechex($row->id).'">
							'.$this->BBCode(nl2br(htmlspecialchars($row->descripcion))).'
							<hr>
						</div>
					</div>
					<hr>';
			}
		return $html;
		}
	}

	public function BBCode($texto)
	{
		$texto = str_replace('[code]', '<small>Código:</small><code style="display:block;color:#000;background-color:#eee">', $texto);
		$texto = str_replace('[/code]', '</code>', $texto);
		$texto = str_replace('<br>','', $texto);
		return $texto;
	}
}
