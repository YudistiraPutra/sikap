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

	//fungsi cari row kosong pada konsumsi
	public function carirowkosongkonsumsi()
	{
		$this->load->model('Admin_model');
		
		$i = 1;
		$x = 1;
		
		while($x != 0)
		{
			$data = $this->Admin_model->newrowkonsumsi($i);
			$x = count($data);
			$i++;
		}

		$i = $i - 1;
		return $i;
	}

	//mulai halaman pertanian
	public function komoditas_pertanian()
	{
		$this->load->model('Admin_model');
		$data['komoditi'] = $this->Admin_model->getkomoditipertanian();
		$this->load->view('Admin/list_komoditi_pertanian',$data);
	}

	public function konsumsi_pertanian()
	{
		$this->load->model('Admin_model');
		$data['konsumsi'] = $this->Admin_model->getkonsumsipertanian();
		$this->load->view('Admin/konsumsi_pertanian',$data);
	}

	public function tambah_konsumsi_pertanian()
	{
		$this->load->helper('url','form');
		$this->load->library('form_validation');

		$this->load->model('Admin_model');
		$data['kecamatan'] = $this->Admin_model->getAll();
		$data['komoditas'] = $this->Admin_model->getkomoditipertanian();

		$this->form_validation->set_rules('kons_kec_id','Nama Kecamatan','required');
		$this->form_validation->set_rules('kons_det_kmd_id','Jenis Komoditi','required');
		$this->form_validation->set_rules('kons_bulan','Bulan','required');
		$this->form_validation->set_rules('kons_thn','Tahun','required');
		$this->form_validation->set_rules('kons_jml','Jumlah Komoditi','required');
		
		
		if($this->form_validation->run() == False)
		{
			$this->load->view('Admin/form_konsumsi_pertanian',$data);
		}
		else
		{
			$barisbaru = $this->carirowkosongkonsumsi();
			$this->Admin_model->savekonsumsipertanian($barisbaru);
			$this->session->set_flashdata('flash','disimpan');
			$this->konsumsi_pertanian();
		}	      
	}

	public function edit_konsumsi_pertanian($id)
	{
		$this->load->helper('url','form');
		$this->load->library('form_validation');

		$this->load->model('Admin_model');

		$this->form_validation->set_rules('kons_kec_id','Nama Kecamatan','required');
		$this->form_validation->set_rules('kons_det_kmd_id','Jenis Komoditi','required');
		$this->form_validation->set_rules('kons_bulan','Bulan','required');
		$this->form_validation->set_rules('kons_thn','Tahun','required');
		$this->form_validation->set_rules('kons_jml','Jumlah Komoditi','required');

		if($this->form_validation->run() == False)
		{
			$data['komoditas'] = $this->Admin_model->getkomoditipertanian();
			$data['kecamatan'] = $this->Admin_model->getAll();
			$data['konsumsi'] = $this->Admin_model->getdatakonsumsibyid($id);
			$this->load->view('Admin/edit_konsumsi_pertanian',$data);
		}
		else
		{
			$this->Admin_model->editkonsumsipertanian($id);
			$this->session->set_flashdata('flash','diupdate');
			redirect('Admin/konsumsi_pertanian','refresh');
		}	
	}

	public function hapus_konsumsi_pertanian($id)
	{
	    $this->load->model('Admin_model');
	    $this->Admin_model->hapusdatakonsumsipertanian($id);       
	    $this->session->set_flashdata('flash','dihapus');
	    redirect('Admin/konsumsi_pertanian','refresh');
	}

	//mulai halaman data komoditas pertanian
	public function data_komoditas_pertanian()
	{
		$this->load->model('Admin_model');
		$data['data_komoditas'] = $this->Admin_model->getdatakomoditaspertanian();
		$this->load->view('Admin/data_komoditas_pertanian',$data);
	}

	public function tambah_komoditas_pertanian()
	{
		$this->load->helper('url','form');
		$this->load->library('form_validation');

		$this->load->model('Admin_model');
		$data['kecamatan'] = $this->Admin_model->getAll();
		$data['komoditas'] = $this->Admin_model->getkomoditipertanian();

		$this->form_validation->set_rules('det_kem_id','Nama Komoditi','required');
		$this->form_validation->set_rules('kec_id','Nama Kecamatan','required');
		$this->form_validation->set_rules('tanam','Jumlah Tanam','required');
		$this->form_validation->set_rules('panen','Jumlah Panen','required');
		$this->form_validation->set_rules('provitas','Jumlah Provitas','required');
		$this->form_validation->set_rules('produksi','Jumlah Produksi','required');
		$this->form_validation->set_rules('ketersediaan','Jumlah Ketersediaan','required');
		$this->form_validation->set_rules('bulan','Nama Bulan','required');
		$this->form_validation->set_rules('tahun','Nama Tahun','required');
		
		if($this->form_validation->run() == False)
		{
			$this->load->view('Admin/form_komoditas_pertanian',$data);
		}
		else
		{
			$barisbaru = $this->carirowkosongkonsumsi();
			$this->Admin_model->savekonsumsipertanian($barisbaru);
			$this->session->set_flashdata('flash','disimpan');
			$this->data_komoditas_pertanian();
		}	      
	}
	
}

/* End of file Diskehan.php */
/* Location: ./application/controllers/Diskehan.php */