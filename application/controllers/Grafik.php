<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grafik extends CI_Controller {

	public function index()
	{
		$this->load->view('Grafik/hal-grafik');
	}

	public function pangan_pertanian()
	{
		$this->load->view('Grafik/pangan-pertanian');
	}

}

/* End of file Grafik.php */
/* Location: ./application/controllers/Grafik.php */