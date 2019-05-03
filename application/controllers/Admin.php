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
		$data = [
			// 'username'= $session_data'username',
			// 'level'= $session_data'level',
			'sidebar' => 'admin/sidebar',
			'content' => 'admin/dashboard',
			'menu'	=> 'dashboard',
			'title' => 'dashboard',
		];
		$this->load->view('Admin/template', $data);
	}

	public function kecamatan()
	{
		//dashboard kecamatan
		$this->load->model([
			
			'Admin_model' => 'kecamatan',
			
		]);
		$kecamatan = $this->Admin_model->getAll();
		$data = [
			// 'username'= $session_data'username',
			// 'level'= $session_data'level',
			'sidebar' => 'admin/sidebar',
			'content' => 'admin/kecamatan',
			'menu'	=> 'kebutuhanpangan',
			'title' => 'Data kecamatan',
			'kecamatan' => $kecamatan,
		];
		$this->load->view('Admin/template',$data);
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

        $data = [
			// 'username'= $session_data'username',
			// 'level'= $session_data'level',
			'sidebar' => 'admin/sidebar',
			'content' => 'admin/form_kecamatan',
			'menu'	=> 'kebutuhanpangan',
			'title' => 'Data kecamatan',
			'kecamatan' => $kecamatan,
		];

        $this->load->view('Admin/template',$data);
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
		$this->load->model([
			
			'Admin_model' => 'penduduk',
			
		]);
		//dashboard penduduk
		$penduduk = $this->Admin_model->getpenduduk();
		$data = [
			// 'username'= $session_data'username',
			// 'level'= $session_data'level',
			'sidebar' => 'admin/sidebar',
			'content' => 'admin/penduduk',
			'menu'	=> 'kebutuhanpangan',
			'title' => 'Data penduduk',
			'penduduk' => $penduduk,
		];
		$this->load->view('Admin/template',$data);
	}

	public function tambahpenduduk()
	{
		$this->load->helper('url','form');
		$this->load->library('form_validation');

		$this->load->model('Admin_model');
		$kecamatan = $this->Admin_model->getAll();
		$data = [
			// 'username'= $session_data'username',
			// 'level'= $session_data'level',
			'sidebar' => 'admin/sidebar',
			'content' => 'admin/form_penduduk',
			'menu'	=> 'kebutuhanpangan',
			'title' => 'Data penduduk',
			'kecamatan' => $kecamatan,
		];
		$this->form_validation->set_rules('pend_jml','Jumlah Penduduk','required');
		$this->form_validation->set_rules('pend_thn','Tahun Data','required');
		$this->form_validation->set_rules('pend_kec_id','Nama Kecamatan','required');

		if($this->form_validation->run() == False)
		{
			$this->load->view('Admin/template',$data);
		}
		else
		{
			$this->Admin_model->savependuduk();
			$penduduk = $this->Admin_model->getAllpenduduk();
			$data = [
			// 'username'= $session_data'username',
			// 'level'= $session_data'level',
			'sidebar' => 'admin/sidebar',
			'content' => 'admin/form_penduduk',
			'menu'	=> 'kebutuhanpangan',
			'title' => 'Data penduduk',
			'penduduk' => $penduduk,
		];
			$this->session->set_flashdata('flash','disimpan');
			$this->load->view('Admin/template',$data);
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
			$penduduk = $this->Admin_model->getpendudukbyid($id);
			$data = [
			// 'username'= $session_data'username',
			// 'level'= $session_data'level',
			'sidebar' => 'admin/sidebar',
			'content' => 'admin/edit_penduduk',
			'menu'	=> 'kebutuhanpangan',
			'title' => 'Data penduduk',
			'penduduk' => $penduduk,
		];
			$this->load->view('Admin/template',$data);
		}
		else
		{
			$this->Admin_model->editdatapenduduk($id);
			$this->session->set_flashdata('flash','diupdate');
			$data = [
			// 'username'= $session_data'username',
			// 'level'= $session_data'level',
			'sidebar' => 'admin/sidebar',
			'content' => 'admin/penduduk',
			'menu'	=> 'kebutuhanpangan',
			'title' => 'Data penduduk',
			
		];
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
		$komoditi = $this->Admin_model->getkomoditipertanian();
		$data = [
			// 'username'= $session_data'username',
			// 'level'= $session_data'level',
			'sidebar' => 'admin/sidebar',
			'content' => 'admin/list_komoditi_pertanian',
			'menu'	=> 'pertanian',
			'title' => 'komoditas pertanian',
			'komoditi' => $komoditi,
			'header' => 'admin/header',
			'footer' => 'admin/footer',
		];
		$this->load->view('Admin/template',$data);
	}

	public function konsumsi_pertanian()
	{
		$this->load->model('Admin_model');
		$konsumsi = $this->Admin_model->getkonsumsipertanian();
		$data = [
			// 'username'= $session_data'username',
			// 'level'= $session_data'level',
			'sidebar' => 'admin/sidebar',
			'content' => 'admin/konsumsi_pertanian',
			'menu'	=> 'pertanian',
			'title' => 'konsumsi pertanian',
			'konsumsi' => $konsumsi,
			'header' => 'admin/header',
			'footer' => 'admin/footer',

		];
		$this->load->view('Admin/template',$data);
	}

	public function tambah_konsumsi_pertanian()
	{
		$this->load->helper('url','form');
		$this->load->library('form_validation');

		$this->load->model('Admin_model');
		$kecamatan = $this->Admin_model->getAll();
		$komoditi = $this->Admin_model->getkomoditipertanian();
		$data = [
			// 'username'= $session_data'username',
			// 'level'= $session_data'level',
			'sidebar' => 'admin/sidebar',
			'content' => 'admin/form_konsumsi_pertanian',
			'menu'	=> 'pertanian',
			'title' => 'tambah data konsumsi pertanian',
			'komoditi' => $komoditi,
		];
		

		$this->form_validation->set_rules('kons_kec_id','Nama Kecamatan','required');
		$this->form_validation->set_rules('kons_det_kmd_id','Jenis Komoditi','required');
		$this->form_validation->set_rules('kons_bulan','Bulan','required');
		$this->form_validation->set_rules('kons_thn','Tahun','required');
		$this->form_validation->set_rules('kons_jml','Jumlah Komoditi','required');
		
		
		if($this->form_validation->run() == False)
		{
			$this->load->view('Admin/template',$data);
		}
		else
		{
			$barisbaru = $this->carirowkosongkonsumsi();
			$this->Admin_model->savekonsumsi($barisbaru);
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
			$komoditi = $this->Admin_model->getkomoditipertanian();
			$kecamatan = $this->Admin_model->getAll();
			$konsumsi = $this->Admin_model->getdatakonsumsibyid($id);
			$data = [
			// 'username'= $session_data'username',
			// 'level'= $session_data'level',
			'sidebar' => 'admin/sidebar',
			'content' => 'admin/edit_komsumsi_pertanian',
			'menu'	=> 'pertanian',
			'title' => 'tambah data komsumsi pertanian',
			'komoditi' => $komoditi,
			'kecamatan' => $kecamatan,
			'konsumsi' => $konsumsi,
		];
		
			$this->load->view('Admin/template',$data);
		}
		else
		{
			$this->Admin_model->editkonsumsi($id);
			$this->session->set_flashdata('flash','diupdate');
			redirect('Admin/konsumsi_pertanian','refresh');
		}	
	}

	public function hapus_konsumsi_pertanian($id)
	{
	    $this->load->model('Admin_model');
	    $this->Admin_model->hapusdatakonsumsi($id);       
	    $this->session->set_flashdata('flash','dihapus');
	    redirect('Admin/konsumsi_pertanian','refresh');
	}

	//mulai halaman data komoditas pertanian
	public function data_komoditas_pertanian()
	{
		$this->load->model('Admin_model');
		$komoditas = $this->Admin_model->getdatakomoditaspertanian();
		$data = [
			// 'username'= $session_data'username',
			// 'level'= $session_data'level',
			'sidebar' => 'admin/sidebar',
			'content' => 'admin/data_komoditas_pertanian',
			'menu'	=> 'pertanian',
			'title' => 'Data komoditas pertanian',
			'komoditas' => $komoditas,
		];
		$this->load->view('Admin/template',$data);
	}

	public function tambah_komoditas_pertanian()
	{
		$this->load->helper('url','form');
		$this->load->library('form_validation');

		$this->load->model('Admin_model');
		$kecamatan = $this->Admin_model->getAll();
		$komoditas = $this->Admin_model->getdatakomoditaspertanian();
		$data = [
			// 'username'= $session_data'username',
			// 'level'= $session_data'level',
			'sidebar' => 'admin/sidebar',
			'content' => 'admin/data_komoditas_pertanian',
			'menu'	=> 'pertanian',
			'title' => 'tambah data komoditas pertanian',
			'komoditas' => $komoditas,
			'kecamatan' => $kecamatan,
		];	


		// $this->form_validation->set_rules('det_kem_id','Nama Komoditi','required');
		// $this->form_validation->set_rules('kec_id','Nama Kecamatan','required');
		$this->form_validation->set_rules('tanam','Jumlah Tanam','required');
		$this->form_validation->set_rules('panen','Jumlah Panen','required');
		$this->form_validation->set_rules('provitas','Jumlah Provitas','required');
		$this->form_validation->set_rules('produksi','Jumlah Produksi','required');
		$this->form_validation->set_rules('bulan','Nama Bulan','required');
		$this->form_validation->set_rules('tahun','Nama Tahun','required');
		
		if($this->form_validation->run() == False)
		{
			$this->load->view('Admin/template',$data);
		}
		else
		{
			$barisbaru = $this->carirowkosongkomoditas();
			$this->Admin_model->savekomoditas($barisbaru);
			$this->session->set_flashdata('flash','disimpan');
			$this->data_komoditas_pertanian();
		}	      
	}

	//fungsi cari row kosong pada konsumsi
	public function carirowkosongkomoditas()
	{
		$this->load->model('Admin_model');
		
		$i = 1;
		$x = 1;
		
		while($x != 0)
		{
			$data = $this->Admin_model->newrowkomoditas($i);
			$x = count($data);
			$i++;
		}

		$i = $i - 1;
		return $i;
	}

	function kebutuhanpertanian(){
		$this->load->model("Admin_model");
        $data['tahun']=$this->Admin_model->get_tahun();
        $this->load->view('Admin/KebutuhanPertanian',$data);
    }
 
    function get_jumlahpenduduk(){
		$this->load->model("Admin_model");
        $id=$this->input->post('id');
        $data=$this->Admin_model->get_jumlah($id);
        echo json_encode($data);
    }
	
}

/* End of file Diskehan.php */
/* Location: ./application/controllers/Diskehan.php */