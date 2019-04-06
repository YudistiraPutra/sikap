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


	public function insertpenduduk()
	{
		
	}

}

/* End of file Admin_model.php */
/* Location: ./application/models/Admin_model.php */