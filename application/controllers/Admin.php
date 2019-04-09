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

	//mulai bawah sini form mulai ada rule dan fix

	public function penduduk()
	{
		//dashboard penduduk
		$data['penduduk'] = $this->Admin_model->getAllpenduduk();
		$this->load->view('Admin/penduduk',$data);
	}

	public function tambahpenduduk()
	{
		$this->load->helper('url','form');
		$this->load->library('form_validation');

		$this->load->model('Admin_model');
		$data['kecamatan'] = $this->Admin_model->getAll();

		$this->form_validation->set_rules('pend_jml','Jumlah Penduduk','required');
		$this->form_validation->set_rules('pend_thn','Tahun Data','required');
		$this->form_validation->set_rules('pend_kec_id','Nama Kecamatan','required');

		if($this->form_validation->run() == False)
		{
			$this->load->view('Admin/form_penduduk',$data);
		}
		else
		{
			$this->Admin_model->savependuduk();
			$data['penduduk'] = $this->Admin_model->getAllpenduduk();
			$this->session->set_flashdata('flash','disimpan');
			$this->load->view('Admin/penduduk',$data);
		}	
        
	}

	public function editdatapenduduk($id)
	{
		$this->load->helper('url','form');
		$this->load->library('form_validation');

		$this->load->model('Admin_model');

		$this->form_validation->set_rules('pend_jml','Jumlah Penduduk','required');
		$this->form_validation->set_rules('pend_thn','Tahun Data','required');

		if($this->form_validation->run() == False)
		{
			$data['penduduk'] = $this->Admin_model->getpendudukbyid($id);
			$this->load->view('Admin/edit_penduduk',$data);
		}
		else
		{
			$this->Admin_model->editdatapenduduk($id);
			$this->session->set_flashdata('flash','diupdate');
			redirect('Admin/penduduk','refresh');
			
			
		}	
        
	}

	public function hapusdatapenduduk($id)
	{
	    $this->load->model('Admin_model');
	    $this->Admin_model->hapusdatapenduduk($id);       
	    $this->session->set_flashdata('flash','dihapus');
	    redirect('Admin/penduduk','refresh');
	}

	public function viewkecamatan()
	{
		//tes datatabel kecamatan yang fix
		$this->load->view('Admin/tabelkecamatan');
	}

}

/* End of file Diskehan.php */
/* Location: ./application/controllers/Diskehan.php */