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

		$this->load->model("Admin_model");
        $this->load->library('form_validation');
        $this->load->library('session');
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
		$data['kecamatan'] = $this->Admin_model->getAll();
		$this->load->view('Admin/kecamatan',$data);
	}

	public function tambahkecamatan()
	{
		$kecamatan = $this->Admin_model;
        $validation = $this->form_validation;
        $validation->set_rules($kecamatan->rules());

        if ($validation->run()) 
        {
            $kecamatan->save();
            $this->session->set_flashdata('flash','disimpan');
            redirect('Admin/kecamatan','refresh');
        }

        $this->load->view("admin/form_kecamatan");
	}

	public function hapuskecamatan($id)
	{       
	    if ($this->Admin_model->delete($id)) 
	    {
	    	$this->session->set_flashdata('flash','dihapus');
	        redirect('Admin/kecamatan','refresh');
	    }
	}

	public function penduduk()
	{
		//dashboard penduduk
		$data['penduduk'] = $this->Admin_model->getAllpenduduk();
		$this->load->view('Admin/penduduk',$data);
	}

	public function tambahpenduduk()
	{
		$model = $this->Admin_model;
        $validation = $this->form_validation;
        $data['kecamatan'] = $model->getAll();

        if ($validation->run()) 
        {
            $model->savependuduk();
            $this->session->set_flashdata('flash','disimpan');
            redirect('Admin/penduduk','refresh');
        }

        $this->load->view("admin/form_penduduk",$data);
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

	public function viewkecamatan()
	{
		//tes datatabel kecamatan yang fix
		$this->load->view('Admin/tabelkecamatan');
	}

}

/* End of file Diskehan.php */
/* Location: ./application/controllers/Diskehan.php */