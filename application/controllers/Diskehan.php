<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diskehan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged_in')) {

			$session_data=$this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['level']=$session_data['level'];
			$current_controller = $this->router->fetch_class();
			$this->load->library('Acl');
			if (! $this->acl->is_public($current_controller)){
				if (! $this->acl->is_allowed($current_controller, $data['level'])){
					//redirect('login/logout','refresh');
					echo '<script>alert("Anda tidak memiliki hak akses untuk mengakses halaman ini")</script>';
	                if($session_data['level'] == 'Dinas Pertanian'){
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

		$this->session->set_userdata('username', $data['username']);
		$this->load->model("Diskehan_model");
        $this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('url','form');
	}

	public function Logout()
    {
        $this->session->sess_destroy();
        redirect('Welcome');
    }
	
	public function index()
	{
		// $this->load->model([
			
		// 	'Diskehan_model' => 'penduduk',
			
		// ]);
		$data = [
			// 'username'= $session_data'username',
			// 'level'= $session_data'level',
			'sidebar' => 'Diskehan/sidebar',
			'content' => 'Diskehan/Dashboard',
			'menu'	=> 'dashboard',
			'title' => 'dashboard',
			'footer'=> 'Diskehan/footer',
		];
		$this->load->view('Diskehan/template', $data);
	}

	public function kecamatan()
	{
		// $this->load->model([
			
		// 	'Diskehan_model' => 'kecamatan',
			
		// ]);

		$kecamatan = $this->Diskehan_model->getkecamatan();
		$data = [
			// 'username'= $session_data'username',
			// 'level'= $session_data'level',
			'sidebar' => 'Diskehan/sidebar',
			'content' => 'Diskehan/kecamatan',
			'menu'	=> 'Data Penduduk',
			'title' => 'Data kecamatan',
			'kecamatan' => $kecamatan,
		];
		$this->load->view('Diskehan/template',$data);
	}

	public function tambahkecamatan()
	{
		$this->form_validation->set_rules('kec_id','ID kecamatan','required',array('required' => '%s tidak boleh kosong.'));
		$this->form_validation->set_rules('kec_nama','Nama kecamatan','required',array('required' => '%s tidak boleh kosong.'));

		if($this->form_validation->run() == False)
		{
			$data = [
			// 'username'= $session_data'username',
			// 'level'= $session_data'level',
			'sidebar' => 'Diskehan/sidebar',
			'content' => 'Diskehan/form_kecamatan',
			'menu'	=> 'Data Penduduk',
			'title' => 'Tambah data kecamatan',
			'footer' => 'Diskehan/footer',
		];
			$this->load->view('Diskehan/template', $data);
		}
		else
		{
			$this->Diskehan_model->savekecamatan();
			$this->session->set_flashdata('flash','disimpan');
			redirect('Diskehan/kecamatan','refresh');
		}	
	}

	public function hapuskecamatan($id)
	{
	    $this->Diskehan_model->deletekecamatan($id);       
	    $this->session->set_flashdata('flash','dihapus');
	    redirect('Diskehan/kecamatan','refresh');
	}

	public function penduduk()
	{
		$penduduk = $this->Diskehan_model->getpenduduk();
		$data = [
			// 'username'= $session_data'username',
			// 'level'= $session_data'level',
			'sidebar' => 'Diskehan/sidebar',
			'content' => 'Diskehan/penduduk',
			'menu'	=> 'Data Penduduk',
			'title' => 'Data jumlah penduduk',
			'penduduk' => $penduduk,
			'footer' => 'Diskehan/footer',
		];
		$this->load->view('Diskehan/template',$data);
	}

	public function carirowkosongpenduduk()
	{
		$i = 1;
		$x = 1;
		
		while($x != 0)
		{
			$data = $this->Diskehan_model->newrowpenduduk($i);
			$x = count($data);
			$i++;
		}

		$i = $i - 1;
		return $i;
	}

	public function tambahpenduduk()
	{
		$kecamatan = $this->Diskehan_model->getkecamatan();

		$this->form_validation->set_rules('pend_jml','Jumlah Penduduk','required',array('required' => '%s tidak boleh kosong.'));
		$this->form_validation->set_rules('pend_thn','Tahun Data','required',array('required' => '%s tidak boleh kosong.'));
		$this->form_validation->set_rules('pend_kec_id','Nama Kecamatan','required',array('required' => '%s tidak boleh kosong.'));

		if($this->form_validation->run() == False)
		{
			$data = [
			// 'username'= $session_data'username',
			// 'level'= $session_data'level',
			'sidebar' => 'Diskehan/sidebar',
			'content' => 'Diskehan/form_penduduk',
			'menu'	=> 'Data Penduduk',
			'title' => 'Tambah Data jumlah penduduk',
			'kecamatan' => $kecamatan,
			
		];
			$this->load->view('Diskehan/template',$data);
		}
		else
		{
			$barisbaru = $this->carirowkosongpenduduk();
			$this->Diskehan_model->savependuduk($barisbaru);
			$data['penduduk'] = $this->Diskehan_model->getpenduduk();
			$this->session->set_flashdata('flash','disimpan');
			redirect('Diskehan/penduduk','refresh');
		}	
	}

	public function editdatapenduduk($id)
	{
		$this->form_validation->set_rules('pend_jml','Jumlah Penduduk','required',array('required' => '%s tidak boleh kosong.'));
		$this->form_validation->set_rules('pend_thn','Tahun Data','required',array('required' => '%s tidak boleh kosong.'));

		if($this->form_validation->run() == False)
		{
			$data['penduduk'] = $this->Diskehan_model->getpendudukbyid($id);
			$this->load->view('Diskehan/edit_penduduk',$data);
		}
		else
		{
			$this->Diskehan_model->editdatapenduduk($id);
			$this->session->set_flashdata('flash','diupdate');
			redirect('Diskehan/penduduk','refresh');	
		}	
	}

	public function hapusdatapenduduk($id)
	{
	    $this->Diskehan_model->hapusdatapenduduk($id);       
	    $this->session->set_flashdata('flash','dihapus');
	    redirect('Diskehan/penduduk','refresh');
	}

	public function komoditas_pertanian()
	{
		$komoditi = $this->Diskehan_model->getkomoditibyid(1);
			$data = [
			// 'username'= $session_data'username',
			// 'level'= $session_data'level',
			'sidebar' => 'Diskehan/sidebar',
			'content' => 'Diskehan/list_komoditi_pertanian',
			'menu'	=> 'Data Pertanian',
			'title' => 'Data Komoditas Pertanian',
			'komoditi' => $komoditi,
			'footer' => 'Diskehan/footer',
			
		];
			$this->load->view('Diskehan/template',$data);
	}

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

	public function konsumsi_pertanian()
	{
		$konsumsi = $this->Diskehan_model->getkonsumsibyid(1);
		$data = [
			// 'username'= $session_data'username',
			// 'level'= $session_data'level',
			'sidebar' => 'Diskehan/sidebar',
			'content' => 'Diskehan/konsumsi_pertanian',
			'menu'	=> 'Data Pertanian',
			'title' => 'Data konsumsi Pertanian',
			'konsumsi' => $konsumsi,
			'footer' => 'Diskehan/footer',

		];
		$this->load->view('Diskehan/template',$data);
	}

	public function tambah_konsumsi_pertanian()
	{
		$kecamatan = $this->Diskehan_model->getkecamatan();
		$komoditas = $this->Diskehan_model->getkomoditibyid(1);

		$this->form_validation->set_rules('kons_det_kmd_id','Jenis Komoditi','required',array('required' => '%s tidak boleh kosong.'));
		$this->form_validation->set_rules('kons_bulan','Bulan','required',array('required' => '%s tidak boleh kosong.'));
		$this->form_validation->set_rules('kons_thn','Tahun','required',array('required' => '%s tidak boleh kosong.'));
		$this->form_validation->set_rules('kons_kec_id','Nama Kecamatan','required',array('required' => '%s tidak boleh kosong.'));
		$this->form_validation->set_rules('kons_jml','Jumlah Konsumsi','required',array('required' => '%s tidak boleh kosong.'));
		
		if($this->form_validation->run() == False)
		{
			$data = [
			// 'username'= $session_data'username',
			// 'level'= $session_data'level',
			'sidebar' => 'Diskehan/sidebar',
			'content' => 'Diskehan/form_konsumsi_pertanian',
			'menu'	=> 'Data Pertanian',
			'title' => 'Data konsumsi Pertanian',
			'kecamatan' => $kecamatan,
			'komoditas' => $komoditas,
			'footer' => 'Diskehan/footer',

		];
		$this->load->view('Diskehan/template',$data);
		}
		else
		{
			$barisbaru = $this->carirowkosongkonsumsi();
			$this->Diskehan_model->savekonsumsi($barisbaru);
			$this->session->set_flashdata('flash','disimpan');
			$this->konsumsi_pertanian();
		}	      
	}

	public function edit_konsumsi_pertanian($id)
	{
		$this->form_validation->set_rules('kons_det_kmd_id','Jenis Komoditi','required',array('required' => '%s tidak boleh kosong.'));
		$this->form_validation->set_rules('kons_bulan','Bulan','required',array('required' => '%s tidak boleh kosong.'));
		$this->form_validation->set_rules('kons_thn','Tahun','required',array('required' => '%s tidak boleh kosong.'));
		$this->form_validation->set_rules('kons_kec_id','Nama Kecamatan','required',array('required' => '%s tidak boleh kosong.'));
		$this->form_validation->set_rules('kons_jml','Jumlah Konsumsi','required',array('required' => '%s tidak boleh kosong.'));

		if($this->form_validation->run() == False)
		{
			$data['komoditas'] = $this->Diskehan_model->getkomoditibyid(1);
			$data['kecamatan'] = $this->Diskehan_model->getkecamatan();
			$data['konsumsi'] = $this->Diskehan_model->getdatakonsumsibyid($id);
			$this->load->view('Diskehan/edit_konsumsi_pertanian',$data);
		}
		else
		{
			$this->Diskehan_model->editkonsumsi($id);
			$this->session->set_flashdata('flash','diupdate');
			redirect('Diskehan/konsumsi_pertanian','refresh');
		}	
	}

	public function hapus_konsumsi_pertanian($id)
	{
	    $this->Diskehan_model->hapusdatakonsumsi($id);       
	    $this->session->set_flashdata('flash','dihapus');
	    redirect('Diskehan/konsumsi_pertanian','refresh');
	}

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

	public function data_komoditas_pertanian()
	{
		$data_komoditas = $this->Diskehan_model->getdatakomoditasbyid(1);
		$data = [
			// 'username'= $session_data'username',
			// 'level'= $session_data'level',
			'sidebar' => 'Diskehan/sidebar',
			'content' => 'Diskehan/data_komoditas_pertanian',
			'menu'	=> 'Data Pertanian',
			'title' => 'Data komoditas Pertanian',
			'data_komoditas' => $data_komoditas,
			'footer' => 'Diskehan/footer',

		];
		$this->load->view('Diskehan/template',$data);
	}

	public function tambah_komoditas_pertanian()
	{
		$data['kecamatan'] = $this->Diskehan_model->getkecamatan();
		$data['komoditas'] = $this->Diskehan_model->getkomoditibyid(1);

		$this->form_validation->set_rules('det_kmd_id','Jenis Komoditi','required',array('required' => '%s tidak boleh kosong.'));
		$this->form_validation->set_rules('kec_id','Nama Kecamatan','required',array('required' => '%s tidak boleh kosong.'));
		$this->form_validation->set_rules('tanam','Jumlah Tanam','required',array('required' => '%s tidak boleh kosong.'));
		$this->form_validation->set_rules('panen','Jumlah Panen','required',array('required' => '%s tidak boleh kosong.'));
		$this->form_validation->set_rules('provitas','Jumlah Provitas','required',array('required' => '%s tidak boleh kosong.'));
		$this->form_validation->set_rules('produksi','Jumlah Produksi','required',array('required' => '%s tidak boleh kosong.'));
		$this->form_validation->set_rules('bulan','Nama Bulan','required',array('required' => '%s tidak boleh kosong.'));
		$this->form_validation->set_rules('tahun','Nama Tahun','required',array('required' => '%s tidak boleh kosong.'));
		
		if($this->form_validation->run() == False)
		{
			$this->load->view('Diskehan/form_komoditas_pertanian',$data);
		}
		else
		{
			$barisbaru = $this->carirowkosongkomoditas();
			$this->Diskehan_model->savekomoditas($barisbaru);
			$this->session->set_flashdata('flash','disimpan');
			$this->data_komoditas_pertanian();
		}	      
	}

	public function edit_komoditas_pertanian($id)
	{
		$this->form_validation->set_rules('det_kmd_id','Jenis Komoditi','required',array('required' => '%s tidak boleh kosong.'));
		$this->form_validation->set_rules('kec_id','Nama Kecamatan','required',array('required' => '%s tidak boleh kosong.'));
		$this->form_validation->set_rules('tanam','Jumlah Tanam','required',array('required' => '%s tidak boleh kosong.'));
		$this->form_validation->set_rules('panen','Jumlah Panen','required',array('required' => '%s tidak boleh kosong.'));
		$this->form_validation->set_rules('provitas','Jumlah Provitas','required',array('required' => '%s tidak boleh kosong.'));
		$this->form_validation->set_rules('produksi','Jumlah Produksi','required',array('required' => '%s tidak boleh kosong.'));
		$this->form_validation->set_rules('bulan','Nama Bulan','required',array('required' => '%s tidak boleh kosong.'));
		$this->form_validation->set_rules('tahun','Nama Tahun','required',array('required' => '%s tidak boleh kosong.'));

		if($this->form_validation->run() == False)
		{
			$data['komoditas'] = $this->Diskehan_model->getkomoditibyid(1);
			$data['kecamatan'] = $this->Diskehan_model->getkecamatan();
			$data['konsumsi'] = $this->Diskehan_model->getdatakomoditasbyid($id);
			$this->load->view('Diskehan/edit_konsumsi_pertanian',$data);
		}
		else
		{
			$this->Diskehan_model->editkonsumsi($id);
			$this->session->set_flashdata('flash','diupdate');
			redirect('Diskehan/konsumsi_pertanian','refresh');
		}	
	}

	public function hapus_komoditas_pertanian($id)
	{
	    $this->Diskehan_model->hapusdatakomoditas($id);       
	    $this->session->set_flashdata('flash','dihapus');
	    redirect('Diskehan/data_komoditas_pertanian','refresh');
	}

	//mulai rekap-rekap

	function rekap_pertanian(){
		$data['listtahun'] = date("Y");
		$this->load->view('Diskehan/Rekap_pertanian',$data);
	}

	function get_rekap_pertanian(){
		$tahun=$this->input->post('tahun');
		$data=$this->Diskehan_model->ajax_rekap_pertanian($tahun);
		echo json_encode($data);
	}

	//mulai grafik pertanian
	function grafik_pertanian(){
		$data =  $this->Diskehan_model->grafik_pertanian()->result();
		$x['listtahun'] = date("Y");
		$x['namakecamatan'] = $this->Diskehan_model->getkecamatan();
		$x['datasurplus'] = json_encode($data);
		$this->load->view('Diskehan/Grafik_pertanian',$x);
	}
  }

/* End of file Diskehan.php */
/* Location: ./application/controllers/Diskehan.php */