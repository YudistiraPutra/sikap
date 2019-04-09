<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	private $_table = "kecamatan";

    public $kec_id;
    public $kec_nama;

    public function rules()
    {
        return [
            ['field' => 'kec_id',
            'label' => 'kec_id',
            'rules' => 'required'],

            ['field' => 'kec_nama',
            'label' => 'kec_nama',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function save()
    {
        $post = $this->input->post();
        $this->kec_id = $post["kec_id"];
        $this->kec_nama = $post["kec_nama"];
        $this->db->insert($this->_table, $this);
    }


    public function delete($id)
    {
        return $this->db->delete($this->_table, array("kec_id" => $id));
    }

    public function getAllpenduduk()
    {
    	$query = $this->db->query("Select * FROM data_penduduk as p INNER JOIN kecamatan as k ON p.pend_kec_id = k.kec_id");
		return $query->result();
    }

    public function getpendudukbyid($id)
    {
        $query = $this->db->query("Select * FROM data_penduduk as p INNER JOIN kecamatan as k ON p.pend_kec_id=k.kec_id WHERE pend_id = ".$id);
        return $query->result();
    }

    public function savependuduk()
    {
       $data = array(
                   'pend_jml' => $this->input->post('pend_jml'),
                   'pend_thn' => $this->input->post('pend_thn'),
                   'pend_kec_id' => $this->input->post('pend_kec_id')
                );
       $this->db->insert('data_penduduk', $data);
    }

    public function editdatapenduduk($id)
    {
        $data = array(
            'pend_jml' => $this->input->post('pend_jml'),
            'pend_thn' => $this->input->post('pend_thn'),
        );
    
        $this->db->where('pend_id', $id);
        $this->db->update('data_penduduk', $data);
    }

    public function hapusdatapenduduk($id)
    {
        $this->db->where('pend_id', $id);
        $this->db->delete('data_penduduk');
    }
}

/* End of file Admin_model.php */
/* Location: ./application/models/Admin_model.php */