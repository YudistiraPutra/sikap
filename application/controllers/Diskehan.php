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

	public function penduduk_search(){
		$kecamatan = $this->Diskehan_model->getkecamatan();
		$data = [
			// 'username'= $session_data'username',
			// 'level'= $session_data'level',
			'sidebar' => 'Diskehan/sidebar',
			'content' => 'Diskehan/search_penduduk',
			'menu'	=> 'Data Penduduk',
			'title' => 'Data jumlah penduduk',
			'kecamatan' => $kecamatan,
			'footer' => 'Diskehan/footer',
		];
		$this->load->view('Diskehan/template',$data);
	}

	public function get_search_penduduk(){
		$kec=$this->input->post('kec');
		$data=$this->Diskehan_model->ajax_search_penduduk($kec);
		echo json_encode($data);
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

	public function konsumsi_pertanian_search(){
		$kecamatan = $this->Diskehan_model->getkecamatan();
		$komoditi = $this->Diskehan_model->getkomoditibyid(1);
		$data = [
			// 'username'= $session_data'username',
			// 'level'= $session_data'level',
			'sidebar' => 'Diskehan/sidebar',
			'content' => 'Diskehan/search_konsumsi_pertanian',
			'menu'	=> 'Data Penduduk',
			'title' => 'Data jumlah penduduk',
			'kecamatan' => $kecamatan,
			'komoditi' => $komoditi,
			'footer' => 'Diskehan/footer',
		];
		$this->load->view('Diskehan/template',$data);
	}

	public function get_search_konsumsi(){
		$kec_id=$this->input->post('kec_id');
		$kom_id=$this->input->post('kom_id');
		$tahun=$this->input->post('tahun');
		$data=$this->Diskehan_model->ajax_search_konsumsi($kec_id, $kom_id, $tahun);
		echo json_encode($data);
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
			$komoditas = $this->Diskehan_model->getkomoditibyid(1);
			$kecamatan = $this->Diskehan_model->getkecamatan();
			$konsumsi = $this->Diskehan_model->getdatakonsumsibyid($id);
			$data = [
			// 'username'= $session_data'username',
			// 'level'= $session_data'level',
			'sidebar' => 'Diskehan/sidebar',
			'content' => 'Diskehan/edit_konsumsi_pertanian',
			'menu'	=> 'Data Pertanian',
			'title' => 'Data konsumsi Pertanian',
			'komoditas' => $komoditas,
			'kecamatan' => $kecamatan,
			'konsumsi' => $konsumsi,
			'footer' => 'Diskehan/footer',

		];
		$this->load->view('Diskehan/template',$data);
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

	public function komoditas_pertanian_search(){
		$kecamatan = $this->Diskehan_model->getkecamatan();
		$komoditi = $this->Diskehan_model->getkomoditibyid(1);
		$data = [
			// 'username'= $session_data'username',
			// 'level'= $session_data'level',
			'sidebar' => 'Diskehan/sidebar',
			'content' => 'Diskehan/search_komoditas_pertanian',
			'menu'	=> 'Data Penduduk',
			'title' => 'Data jumlah penduduk',
			'kecamatan' => $kecamatan,
			'komoditi' => $komoditi,
			'footer' => 'Diskehan/footer',
		];
		$this->load->view('Diskehan/template',$data);
	}

	public function get_search_komoditas(){
		$kec_id=$this->input->post('kec_id');
		$kom_id=$this->input->post('kom_id');
		$tahun=$this->input->post('tahun');
		$data=$this->Diskehan_model->ajax_search_komoditas($kec_id, $kom_id, $tahun);
		echo json_encode($data);
	}

	//mulai rekap-rekap

	function rekap_pertanian(){
		$listtahun = date("Y");
		$data = [
			// 'username'= $session_data'username',
			// 'level'= $session_data'level',
			'sidebar' => 'Diskehan/sidebar',
			'content' => 'Diskehan/Rekap_pertanian',
			'menu'	=> 'Data Pertanian',
			'title' => 'Data komoditas Pertanian',
			'listtahun' => $listtahun,
			'footer' => 'Diskehan/footer',

		];
		$this->load->view('Diskehan/template',$data);
	}

	function get_rekap_pertanian(){
		$tahun=$this->input->post('tahun');
		$data=$this->Diskehan_model->ajax_rekap_pertanian($tahun);
		echo json_encode($data);
	}

	function get_rekap_penduduk(){
		$tahun=$this->input->post('tahun');
		$data=$this->Diskehan_model->ajax_rekap_penduduk($tahun);
		echo json_encode($data);
	}

	// mulai grafik pertanian
	function grafik_pertanian(){
		$data =  $this->Diskehan_model->grafik_pertanian(2018,1,'JANUARI')->result();
		$x['listtahun'] = date("Y");
		$x['namakecamatan'] = $this->Diskehan_model->getkecamatan();
		$x['datasurplus'] = json_encode($data);
		var_dump($data);
		// $this->load->view('Diskehan/Grafik_pertanian',$x);
	}

	// function grafik_pertanian(){
	// 	$data =  $this->Diskehan_model->grafik_pertanian(2018,1,'JANUARI')->result();
	// 	$x['listtahun'] = date("Y");
	// 	$x['namakecamatan'] = $this->Diskehan_model->getkecamatan();
	// 	$x['datasurplus'] = json_encode($data);
	// 	$data1 = [
	// 		// 'username'= $session_data'username',
	// 		// 'level'= $session_data'level',
	// 		'sidebar' => 'Diskehan/sidebar',
	// 		'content' => 'Diskehan/Grafik_pertanian',
	// 		'menu'	=> 'Data Pertanian',
	// 		'title' => 'grafik pertanian',
	// 		'footer' => 'Diskehan/footer',

	// 	];
	// 	$this->load->view('Diskehan/template',$x && $data1);
	// }

	function get_grafik_pertanian(){
		$thn= 2018;
		$data=$this->Diskehan_model->grafik_pertanian($thn,1,'JANUARI');
		echo json_encode($data);
	}

	//mulai peternakan
	public function komoditas_peternakan()
	{
		$komoditi = $this->Diskehan_model->getkomoditibyid(2);
			$data = [
			// 'username'= $session_data'username',
			// 'level'= $session_data'level',
			'sidebar' => 'Diskehan/sidebar',
			'content' => 'Diskehan/list_komoditi_peternakan',
			'menu'	=> 'Data Peternakan',
			'title' => 'Komoditas Peternakan',
			'komoditi' => $komoditi,
			'footer' => 'Diskehan/footer',
			
		];
			$this->load->view('Diskehan/template',$data);
	}

	public function konsumsi_peternakan()
	{
		$konsumsi = $this->Diskehan_model->getkonsumsibyid(2);
		$data = [
			// 'username'= $session_data'username',
			// 'level'= $session_data'level',
			'sidebar' => 'Diskehan/sidebar',
			'content' => 'Diskehan/konsumsi_peternakan',
			'menu'	=> 'Data Peternakan',
			'title' => 'Data konsumsi Peternakan',
			'konsumsi' => $konsumsi,
			'footer' => 'Diskehan/footer',

		];
		$this->load->view('Diskehan/template',$data);
	}

	public function tambah_konsumsi_peternakan()
	{
		$kategori = $this->Diskehan_model->get_kategori_peternakan();

		$this->form_validation->set_rules('kons_det_kmd_id','Nama Komoditi','required',array('required' => '%s tidak boleh kosong.'));
		$this->form_validation->set_rules('kons_bulan','Bulan','required',array('required' => '%s tidak boleh kosong.'));
		$this->form_validation->set_rules('kons_thn','Tahun','required',array('required' => '%s tidak boleh kosong.'));
		$this->form_validation->set_rules('kons_jml','Jumlah Konsumsi','required',array('required' => '%s tidak boleh kosong.'));
		
		if($this->form_validation->run() == False)
		{
			$data = [
			// 'username'= $session_data'username',
			// 'level'= $session_data'level',
			'sidebar' => 'Diskehan/sidebar',
			'content' => 'Diskehan/form_konsumsi_peternakan',
			'menu'	=> 'Data Peternakan',
			'title' => 'Tambah Data konsumsi Peternakan',
			'kategori' => $kategori,
			'footer' => 'Diskehan/footer',

		];
		$this->load->view('Diskehan/template',$data);
		}
		else
		{
			$barisbaru = $this->carirowkosongkonsumsi();
			$this->Diskehan_model->savekonsumsipeternakan($barisbaru);
			$this->session->set_flashdata('flash','disimpan');
			$this->konsumsi_peternakan();
		}	      
	}

	public function get_subkategori_peternakan(){
		$id=$this->input->post('id');
		$data=$this->Diskehan_model->ajax_komoditi_peternakan($id);
		echo json_encode($data);
	}

	public function edit_konsumsi_peternakan($id)
	{
		$this->form_validation->set_rules('kons_det_kmd_id','Nama Komoditi','required',array('required' => '%s tidak boleh kosong.'));
		$this->form_validation->set_rules('kons_bulan','Bulan','required',array('required' => '%s tidak boleh kosong.'));
		$this->form_validation->set_rules('kons_thn','Tahun','required',array('required' => '%s tidak boleh kosong.'));
		$this->form_validation->set_rules('kons_jml','Jumlah Konsumsi','required',array('required' => '%s tidak boleh kosong.'));

		if($this->form_validation->run() == False)
		{
			$kategori = $this->Diskehan_model->get_kategori_peternakan();
			$konsumsi = $this->Diskehan_model->getdatakonsumsibyidpeternakan($id);
			$data = [
			// 'username'= $session_data'username',
			// 'level'= $session_data'level',
			'sidebar' => 'Diskehan/sidebar',
			'content' => 'Diskehan/edit_konsumsi_peternakan',
			'menu'	=> 'Data Peternakan',
			'title' => 'Data konsumsi Peternakan',
			'kategori' => $kategori,
			'konsumsi' => $konsumsi,
			'footer' => 'Diskehan/footer',

		];
			$this->load->view('Diskehan/template',$data);
		}
		else
		{
			$this->Diskehan_model->editkonsumsi($id);
			$this->session->set_flashdata('flash','diupdate');
			redirect('Diskehan/konsumsi_peternakan','refresh');
		}	
	}

	public function hapus_konsumsi_peternakan($id)
	{
	    $this->Diskehan_model->hapusdatakonsumsi($id);       
	    $this->session->set_flashdata('flash','dihapus');
	    redirect('Diskehan/konsumsi_peternakan','refresh');
	}

	public function data_komoditas_peternakan()
	{
		$data_komoditas = $this->Diskehan_model->getdatakomoditasbyid(2);
		$data = [
			// 'username'= $session_data'username',
			// 'level'= $session_data'level',
			'sidebar' => 'Diskehan/sidebar',
			'content' => 'Diskehan/data_komoditas_peternakan',
			'menu'	=> 'Data Peternakan',
			'title' => 'Data komoditas Peternakan',
			'data_komoditas' => $data_komoditas,
			'footer' => 'Diskehan/footer',

		];
		$this->load->view('Diskehan/template',$data);
	}

	public function tambah_komoditas_peternakan()
	{
		$data['kategori'] = $this->Diskehan_model->get_kategori_peternakan();

		$this->form_validation->set_rules('det_kmd_id','Jenis Komoditi','required',array('required' => '%s tidak boleh kosong.'));
		$this->form_validation->set_rules('produksi','Jumlah Produksi','required',array('required' => '%s tidak boleh kosong.'));
		$this->form_validation->set_rules('bulan','Nama Bulan','required',array('required' => '%s tidak boleh kosong.'));
		$this->form_validation->set_rules('tahun','Nama Tahun','required',array('required' => '%s tidak boleh kosong.'));
		
		if($this->form_validation->run() == False)
		{
			$this->load->view('Diskehan/form_komoditas_peternakan',$data);
		}
		else
		{
			$barisbaru = $this->carirowkosongkomoditas();
			$this->Diskehan_model->savekomoditaspeternakan($barisbaru);
			$this->session->set_flashdata('flash','disimpan');
			$this->data_komoditas_pertanian();
		}	      
	}

	public function edit_komoditas_peternakan($id)
	{
		$this->form_validation->set_rules('det_kmd_id','Jenis Komoditi','required',array('required' => '%s tidak boleh kosong.'));
		$this->form_validation->set_rules('produksi','Jumlah Produksi','required',array('required' => '%s tidak boleh kosong.'));
		$this->form_validation->set_rules('bulan','Nama Bulan','required',array('required' => '%s tidak boleh kosong.'));
		$this->form_validation->set_rules('tahun','Nama Tahun','required',array('required' => '%s tidak boleh kosong.'));

		if($this->form_validation->run() == False)
		{
			$data['kategori'] = $this->Diskehan_model->get_kategori_peternakan();
			$data['komoditas'] = $this->Diskehan_model->getdatakomoditasforupdate($id);
			$this->load->view('Diskehan/edit_konsumsi_peternakan',$data);
		}
		else
		{
			$this->Diskehan_model->editkonsumsi($id);
			$this->session->set_flashdata('flash','diupdate');
			redirect('Diskehan/konsumsi_pertanian','refresh');
		}	
	}

	//peternakan kurang hapus dan update

	//mulai perikanan
	public function komoditas_perikanan()
	{
		$komoditi = $this->Diskehan_model->getkomoditibyid(3);
			$data = [
			// 'username'= $session_data'username',
			// 'level'= $session_data'level',
			'sidebar' => 'Diskehan/sidebar',
			'content' => 'Diskehan/list_komoditi_perikanan',
			'menu'	=> 'Data Perikanan',
			'title' => 'Komoditas Perikanan',
			'komoditi' => $komoditi,
			'footer' => 'Diskehan/footer',
			
		];
		$this->load->view('Diskehan/template',$data);
	}

  public function konsumsi_perikanan()
	{
		$konsumsi = $this->Diskehan_model->getkonsumsibyid(3);
		$data = [
			// 'username'= $session_data'username',
			// 'level'= $session_data'level',
			'sidebar' => 'Diskehan/sidebar',
			'content' => 'Diskehan/konsumsi_perikanan',
			'menu'	=> 'Data Perikanan',
			'title' => 'Data konsumsi Perikanan',
			'konsumsi' => $konsumsi,
			'footer' => 'Diskehan/footer',

		];
		$this->load->view('Diskehan/template',$data);
	}

	public function tambah_konsumsi_perikanan()
	{
		$komoditas = $this->Diskehan_model->getkomoditibyid(3);

		$this->form_validation->set_rules('kons_det_kmd_id','Nama Komoditi','required',array('required' => '%s tidak boleh kosong.'));
		$this->form_validation->set_rules('kons_bulan','Bulan','required',array('required' => '%s tidak boleh kosong.'));
		$this->form_validation->set_rules('kons_thn','Tahun','required',array('required' => '%s tidak boleh kosong.'));
		$this->form_validation->set_rules('kons_jml','Jumlah Konsumsi','required',array('required' => '%s tidak boleh kosong.'));
		
		if($this->form_validation->run() == False)
		{
			$data = [
			// 'username'= $session_data'username',
			// 'level'= $session_data'level',
			'sidebar' => 'Diskehan/sidebar',
			'content' => 'Diskehan/form_konsumsi_perikanan',
			'menu'	=> 'Data Perikanan',
			'title' => 'Tambah Data konsumsi Perikanan',
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
			$this->konsumsi_perikanan();
		}	      
	}

	public function edit_konsumsi_perikanan($id)
	{
		$this->form_validation->set_rules('kons_det_kmd_id','Jenis Komoditi','required',array('required' => '%s tidak boleh kosong.'));
		$this->form_validation->set_rules('kons_bulan','Bulan','required',array('required' => '%s tidak boleh kosong.'));
		$this->form_validation->set_rules('kons_thn','Tahun','required',array('required' => '%s tidak boleh kosong.'));
		$this->form_validation->set_rules('kons_jml','Jumlah Konsumsi','required',array('required' => '%s tidak boleh kosong.'));

		if($this->form_validation->run() == False)
		{
			$data['komoditas'] = $this->Diskehan_model->getkomoditibyid(3);
			$data['konsumsi'] = $this->Diskehan_model->getdatakonsumsibyid($id);
			$this->load->view('Diskehan/edit_konsumsi_perikanan',$data);
		}
		else
		{
			$this->Diskehan_model->editkonsumsi($id);
			$this->session->set_flashdata('flash','diupdate');
			redirect('Diskehan/konsumsi_pertanian','refresh');
		}	
	}

	public function hapus_konsumsi_perikanan($id)
	{
	    $this->Diskehan_model->hapusdatakonsumsi($id);       
	    $this->session->set_flashdata('flash','dihapus');
	    redirect('Diskehan/konsumsi_perikanan','refresh');
	}

	public function data_komoditas_perikanan()
	{
		$data_komoditas = $this->Diskehan_model->getdatakomoditasbyid(3);
		$data = [
			// 'username'= $session_data'username',
			// 'level'= $session_data'level',
			'sidebar' => 'Diskehan/sidebar',
			'content' => 'Diskehan/data_komoditas_perikanan',
			'menu'	=> 'Data Perikanan',
			'title' => 'Data komoditas Perikanan',
			'data_komoditas' => $data_komoditas,
			'footer' => 'Diskehan/footer',
		];
		$this->load->view('Diskehan/template',$data);
	}

	public function tambah_komoditas_perikanan()
	{
		$data_komoditas = $this->Diskehan_model->getkomoditibyid(3);

		$this->form_validation->set_rules('det_kmd_id','Jenis Komoditi','required',array('required' => '%s tidak boleh kosong.'));
		$this->form_validation->set_rules('produksi','Jumlah Produksi','required',array('required' => '%s tidak boleh kosong.'));
		$this->form_validation->set_rules('bulan','Nama Bulan','required',array('required' => '%s tidak boleh kosong.'));
		$this->form_validation->set_rules('tahun','Nama Tahun','required',array('required' => '%s tidak boleh kosong.'));
		
		if($this->form_validation->run() == False)
		{
			$data = [
			// 'username'= $session_data'username',
			// 'level'= $session_data'level',
			'sidebar' => 'Diskehan/sidebar',
			'content' => 'Diskehan/form_komoditas_perikanan',
			'menu'	=> 'Data Perikanan',
			'title' => 'Data komoditas Perikanan',
			'data_komoditas' => $data_komoditas,
			'footer' => 'Diskehan/footer',
		];
		$this->load->view('Diskehan/template',$data);
		}
		else
		{
			$barisbaru = $this->carirowkosongkomoditas();
			$this->Diskehan_model->savekomoditaspeternakan($barisbaru);
			$this->session->set_flashdata('flash','disimpan');
			$this->data_komoditas_pertanian();
		}	      
	}

	//print excel
	public function excel($tipe,$tahun){
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';

		//ambil tipe laporan
		if($tipe == 1){
			$namafile = "Pertanian";
		}

		$excel = new PHPExcel();

		$excel->getDefaultStyle()->getFont()->setName('Arial');
		$excel->getDefaultStyle()->getFont()->setSize(10);  
		$excel->getActiveSheet()->getDefaultColumnDimension()->setWidth(15); 

		$style_col = array(
			'alignment' => array(
			  'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
			  'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			)
		  );

		  $style_satu = array(
			'borders' => array(
			  'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
			  'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
			  'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
			  'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			));

			$style_row = array(
				'alignment' => array(
				  'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
				  'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
				),
				'borders' => array(
					'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
					'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
					'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
					'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
				  )
			  );

		$excel->getActiveSheet(0)->setTitle("Rekap");
		$excel->setActiveSheetIndex(0);

		$excel->getActiveSheet()->mergeCells('A2:K2');
		$excel->setActiveSheetIndex(0)->setCellValue('A2', "REALISASI KEBUTUHAN DAN KETERSEDIAAN PANGAN KABUPATEN MALANG");
		$excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(true);

		$excel->getActiveSheet()->mergeCells('A3:K3');
		$excel->setActiveSheetIndex(0)->setCellValue('A3', "TAHUN = $tahun");
		$excel->getActiveSheet()->getStyle('A3')->getFont()->setBold(true);

		$excel->getActiveSheet()->mergeCells('A5:A7');
		$excel->setActiveSheetIndex(0)->setCellValue('A5',"No.");
		$excel->getActiveSheet()->getStyle('A5')->getFill()
					->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
					->getStartColor()->setARGB('a7b4c9');
		$excel->getActiveSheet()->getStyle('A5:A7')->applyFromArray($style_satu);

		$excel->getActiveSheet()->mergeCells('B5:E5');
		$excel->setActiveSheetIndex(0)->setCellValue('B5',"KEBUTUHAN PANGAN");
		$excel->getActiveSheet()->getStyle('B5')->getFill()
					->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
					->getStartColor()->setARGB('a7b4c9');
		$excel->getActiveSheet()->getStyle('B5')->getFont()->setBold(true);
		$excel->getActiveSheet()->getStyle('B5:E5')->applyFromArray($style_satu);

		$excel->getActiveSheet()->mergeCells('B6:B7');
		$excel->setActiveSheetIndex(0)->setCellValue('B6',"KOMODITI");
		$excel->getActiveSheet()->getStyle('B6')->getFill()
					->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
					->getStartColor()->setARGB('e085c2');
		$excel->getActiveSheet()->getStyle('B6:B7')->applyFromArray($style_satu);

		$excel->setActiveSheetIndex(0)->setCellValue('C6',"Jml Penduduk");
		$excel->getActiveSheet()->getStyle('C6')->getFill()
					->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
					->getStartColor()->setARGB('e085c2');

		$excel->setActiveSheetIndex(0)->setCellValue('C7',"(Jiwa)");
		$excel->getActiveSheet()->getStyle('C7')->getFill()
					->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
					->getStartColor()->setARGB('e085c2');
		$excel->getActiveSheet()->getStyle('C6:C7')->applyFromArray($style_satu);

		$excel->setActiveSheetIndex(0)->setCellValue('D6',"Konsumsi");
		$excel->getActiveSheet()->getStyle('D6')->getFill()
					->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
					->getStartColor()->setARGB('e085c2');

		$excel->setActiveSheetIndex(0)->setCellValue('D7',"Kg/kap./bln");
		$excel->getActiveSheet()->getStyle('D7')->getFill()
					->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
					->getStartColor()->setARGB('e085c2');
		$excel->getActiveSheet()->getStyle('D6:D7')->applyFromArray($style_satu);

		$excel->setActiveSheetIndex(0)->setCellValue('E6',"Kebutuhan");
		$excel->getActiveSheet()->getStyle('E6')->getFill()
					->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
					->getStartColor()->setARGB('e085c2');

		$excel->setActiveSheetIndex(0)->setCellValue('E7',"(Ton)");
		$excel->getActiveSheet()->getStyle('E7')->getFill()
					->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
					->getStartColor()->setARGB('e085c2');
		$excel->getActiveSheet()->getStyle('E6:E7')->applyFromArray($style_satu);

		$excel->getActiveSheet()->mergeCells('F5:I5');
		$excel->setActiveSheetIndex(0)->setCellValue('F5',"KETERSEDIAAN PANGAN");
		$excel->getActiveSheet()->getStyle('F5')->getFont()->setBold(true);
		$excel->getActiveSheet()->getStyle('F5')->getFill()
					->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
					->getStartColor()->setARGB('ff9999');
		$excel->getActiveSheet()->getStyle('F5:I5')->applyFromArray($style_satu);

		$excel->setActiveSheetIndex(0)->setCellValue('F6',"Luas Panen");
		$excel->setActiveSheetIndex(0)->setCellValue('F7',"(Ha)");
		$excel->getActiveSheet()->getStyle('F6:F7')->getFill()
					->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
					->getStartColor()->setARGB('2eb82e');
		$excel->getActiveSheet()->getStyle('F6:F7')->applyFromArray($style_satu);

		$excel->setActiveSheetIndex(0)->setCellValue('G6',"Produktivitas");
		$excel->setActiveSheetIndex(0)->setCellValue('G7',"(Kw/ha)");
		$excel->getActiveSheet()->getStyle('G6:G7')->getFill()
					->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
					->getStartColor()->setARGB('2eb82e');
		$excel->getActiveSheet()->getStyle('G6:G7')->applyFromArray($style_satu);

		$excel->setActiveSheetIndex(0)->setCellValue('H6',"Produksi");
		$excel->setActiveSheetIndex(0)->setCellValue('H7',"(Ton)");
		$excel->getActiveSheet()->getStyle('H6:H7')->getFill()
					->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
					->getStartColor()->setARGB('2eb82e');
		$excel->getActiveSheet()->getStyle('H6:H7')->applyFromArray($style_satu);

		$excel->setActiveSheetIndex(0)->setCellValue('I6',"Ketersediaan");
		$excel->setActiveSheetIndex(0)->setCellValue('I7',"(Ton, Beras)");
		$excel->getActiveSheet()->getStyle('I6:I7')->getFill()
					->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
					->getStartColor()->setARGB('2eb82e');
		$excel->getActiveSheet()->getStyle('I6:I7')->applyFromArray($style_satu);

		$excel->getActiveSheet()->mergeCells('J5:J6');
		$excel->setActiveSheetIndex(0)->setCellValue('J5',"Surplus/Minus");
		$excel->setActiveSheetIndex(0)->setCellValue('J7',"(Ton, Beras)");
		$excel->getActiveSheet()->getStyle('J5:J7')->getFill()
					->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
					->getStartColor()->setARGB('ffff1a');
		$excel->getActiveSheet()->getStyle('J5:J7')->applyFromArray($style_satu);

		$excel->getActiveSheet()->mergeCells('K5:K6');
		$excel->setActiveSheetIndex(0)->setCellValue('K5',"PSB");
		$excel->setActiveSheetIndex(0)->setCellValue('K7',"(Ton)");
		$excel->getActiveSheet()->getStyle('K5:K7')->getFill()
					->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
					->getStartColor()->setARGB('ff8c1a');
		$excel->getActiveSheet()->getStyle('K5:K7')->applyFromArray($style_satu);

		//mulai import data
		// $siswa = $this->SiswaModel->view();
		$komoditi = $this->Diskehan_model->getkomoditibyid($tipe);

		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrow = 8; // Set baris pertama untuk isi tabel adalah baris ke 4

			foreach($komoditi as $data){ // Lakukan looping pada variabel siswa
				$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
				$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->det_kmd_nama);
				
				// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
				$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
				
				$no++; // Tambah 1 setiap kali looping
				$numrow++; // Tambah 1 setiap kali looping
			}
		
		$excel->getActiveSheet()->getStyle('A1:O50')->applyFromArray($style_col);
		

		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header("Content-Disposition: attachment; filename=$namafile.xlsx"); // Set nama file excel nya
		header('Cache-Control: max-age=0');

		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}

}

/* End of file Diskehan.php */
/* Location: ./application/controllers/Diskehan.php */