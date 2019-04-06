<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged_in')) {

			$session_data=$this->session->userdata('logged_in');
			$data['username']=$session_data['username'];
			$data['level']=$session_data['level'];
			$current_controller = $this->router->fetch_class();
			$this->load->library('Acl');
			if (! $this->acl->is_public($current_controller)){
				if (! $this->acl->is_allowed($current_controller, $data['level'])){
					//redirect('login/logout','refresh');
					echo '<script>alert("Anda tidak memiliki hak akses untuk mengakses halaman ini")</script>';
					if($session_data['level'] == 'Dinas Ketahanan Pangan'){
	                    redirect('Diskehan','refresh');
	                }	                

	                else if($session_data['level'] == 'Dinas Pertanian'){
	                    redirect('Pertanian','refresh');
	                }

	                else if($session_data['level'] == 'Dinas Perikanan'){
	                    redirect('Perikanan','refresh');
	                }

	                else if($session_data['level'] == 'Dinas Peternakan'){
	                    redirect('Peternakan','refresh');
	                }
				}
			}
		}
		else{
			redirect('Login','refresh');
		}
	}
	
	public function index()
	{
		$session_data=$this->session->userdata('logged_in');
		$data['username']=$session_data['username'];
		$data['level']=$session_data['level'];
		$this->load->view('Admin/Dashboard');
	}

	public function kecamatan()
	{
		//dashboard kecamatan
		$this->load->view('Admin/kecamatan');
	}

	public function tambahkecamatan()
	{
		$this->load->helper('url','form');
		$this->load->library('form_validation');

		//kurang rule

		$this->load->model('Admin_model');

		if($this->form_validation->run() == False)
		{
			$this->load->view('Admin/tambah_kecamatan_view');
		}
		else
		{
			$this->Admin_model->insertkecamatan();
			$this->load->view('Admin/tambah_kecamatan_sukses');
		}
	}

	public function inputpenduduk()
	{
		$this->load->helper('url','form');
		$this->load->library('form_validation');

		//kurang rule

		$this->load->model('Admin_model');
		$data['kecamatan'] = $this->Admin_model->getKecamatan();

		if($this->form_validation->run() == False)
		{
			$this->load->view('Admin/tambah_penduduk_view',$data);
		}
		else
		{
			$this->Admin_model->insertpenduduk();
			$this->load->view('Admin/tambah_kecamatan_sukses');
		}	
	}

	public function datatabelkecamatan()
	{
		//panggil model untuk json
	 	$this->load->model('Admin_model');
	 	$this->Admin_model->dtbkecamatan();
	}

	public function viewkecamatan()
	{
		//tes datatabel kecamatan yang fix
		$this->load->view('Admin/tabelkecamatan');
	}

}

/* End of file Diskehan.php */
/* Location: ./application/controllers/Diskehan.php */