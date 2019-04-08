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
	public function pangan_perikan_peternak()
	{
		$this->load->view('Grafik/pangan-perikan-peternak');
	}
	public function peramalan()
	{
		$this->load->view('Grafik/data-peramalan');
	}

}

/* End of file Grafik.php */
/* Location: ./application/controllers/Grafik.php */