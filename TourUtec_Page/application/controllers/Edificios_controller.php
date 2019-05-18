<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Edificios_controller extends CI_Controller
{
	public function index()
	{
		$url = base_url('/Tour-Api/Edificios/listaEdificios');
		//creamos
		$ch = curl_init($url);

		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);

		$result = curl_exec($ch);

		//cerramos
		curl_close($ch);
		$data['lstEdificios'] = json_decode($result);
		$this->load->view('_layout/header');
		$this->load->view('Edificios', $data);
		$this->load->view('_Layout/footer');
	}

	public function Buscar()
	{
		$a = $this->input->post("txtAcronimo");
		$n = $this->input->post("txtNombre");
		$url = base_url('/Tour-Api/Edificios/listaEdificios_fil/?n=' . $n . '&a=' . $a);
		//creamos
		$ch = curl_init($url);

		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);

		$result = curl_exec($ch);

		//cerramos
		curl_close($ch);

		$data['lstEdificios'] = json_decode($result);
		$this->load->view('_Layout/Header_Master');
		$this->load->view('Edificios', $data);
		$this->load->view('_Layout/Footer_Master');
	}

	public function guardarDatos()
	{
		$c = $this->input->post("codedf");
		$n = $this->input->post("txtNombre");
		$o = $this->input->post("txtOrden");
		$l = $this->input->post("txtLatitud");
		$lo = $this->input->post("txtLongitud");
		$a = $this->input->post("txtAcronimo");
		$url = base_url('/Tour-Api/Edificios/guardarDatos/?c=' . $c . 'n=' . $n . '&o=' . $o . '&l=' . $l . '&lo=' . $lo . '&a=' . $a);
		//creamos nuevo recurso cURL 
		$ch = curl_init($url);

		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		// curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, array());

		$result = curl_exec($ch);

		//cerramos el Curl
		curl_close($ch);

		$id = $this->input->POST('codedf');
		if ($id > 0) {
			$do = "Modificado";
			$er = "modificar";
		} else {
			$do = "Agregado";
			$er = "agregar";
		}
		if ($result) {
			$this->session->set_flashdata('success_msg', $do . ' correctamente');
		} else {
			$this->session->set_flashdata('error_msg', 'Error al ' . $er);
		}
		header('location:' . base_url('/TourUtec_Admin/Edificios'));
	}

	public function borrarDatos($ids)
	{		
		$url = base_url('/Tour-Api/Edificios/listaEdificios_fil/?c='.$c);
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
		curl_setopt($ch, CURLOPT_POSTFIELDS, array());
		curl_setopt($ch, CURLOPT_FAILONERROR, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 90);
		$result = curl_exec($ch);
		url_close($ch);
		$ids = $this->input->post('chkBorrar');
		if (!empty($ids)) {
			$result = $this->clEdificio->borrarDatos($ids);
			if ($result) {
				$this->session->set_flashdata('success_msg', 'Los registros seleccionados se eliminaron correctamente');
			} else {
				$this->session->set_flashdata('error_msg', 'Fallo al eliminar registros');
			}
		} else {
			$this->session->set_flashdata('error_msg', 'Seleccione al menos 1 registro para eliminar');
		}
		header('location:' . base_url('/TourUtec_Admin/Edificios'));
	}
}
