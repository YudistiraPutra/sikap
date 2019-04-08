<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grafik extends CI_Controller {

	public function index()
	{
		$this->load->view('Grafik/dashboard');
	}

}

/* End of file Grafik.php */
/* Location: ./application/controllers/Grafik.php */