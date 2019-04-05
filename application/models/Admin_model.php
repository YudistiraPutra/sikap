<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function insertkecamatan()
	{
		$object = array('kec_id' => $this->input->post('idkecamatan'), 'kec_nama'=> $this->input->post('namakecamatan'));
		$this->db->insert('kecamatan',$object);
	}

	public function getkecamatan()
	{
		$query = $this->db->query("SELECT * FROM kecamatan");
		return $query->result();
	}

	public function insertpenduduk()
	{
		
	}	

}

/* End of file Admin_model.php */
/* Location: ./application/models/Admin_model.php */