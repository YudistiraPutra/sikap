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

	public function dtbkecamatan()
	{
      $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));


      $query = $this->db->get("kecamatan");


      $data = [];


      foreach($query->result() as $r) {
           $data[] = array(
                $r->kec_id,
                $r->kec_nama
           );
      }


      $result = array(
               "draw" => $draw,
                 "recordsTotal" => $query->num_rows(),
                 "recordsFiltered" => $query->num_rows(),
                 "data" => $data
            );


      echo json_encode($result);
      exit();
	}	

}

/* End of file Admin_model.php */
/* Location: ./application/models/Admin_model.php */