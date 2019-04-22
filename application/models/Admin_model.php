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


    public function getdatakonsumsibyid($id)
    {
        $query = $this->db->query("SELECT dk.kons_id, dk.kons_jml, dk.kons_bulan,dk.kons_thn, dk.kons_kec_id, dk.kons_det_kmd_id, k.kec_nama, dko.det_kmd_nama FROM data_konsumsi as dk inner join kecamatan as k on k.kec_id = dk.kons_kec_id inner join detil_komoditas as dko on dko.det_kmd_id= dk.kons_det_kmd_id where dk.kons_id =".$id);
		return $query->result();
    }

    //mulai model pertanian
    public function getkomoditipertanian()
    {
    	$query = $this->db->query("SELECT d.det_kmd_id,d.det_kmd_nama FROM `komoditas` as k inner join detil_komoditas as d on d.komoditas_kmd_id = k.kmd_id where k.kategori_kat_id = 1");
		return $query->result();
    }

    public function getkonsumsipertanian()
    {
    	$query = $this->db->query("SELECT dk.kons_id, dk.kons_jml, dk.kons_bulan, dk.kons_thn, kec.kec_nama, d.det_kmd_nama FROM data_konsumsi as dk inner join detil_komoditas as d on dk.kons_det_kmd_id = d.det_kmd_id inner join komoditas as k on k.kmd_id = d.komoditas_kmd_id inner join kecamatan as kec on dk.kons_kec_id=kec.kec_id where k.kategori_kat_id = 1");
		return $query->result();
    }

    public function savekonsumsipertanian($id)
    {
       $data = array(
                   'kons_id' => $id,              
                   'kons_jml' => $this->input->post('kons_jml'),
                   'kons_bulan' => $this->input->post('kons_bulan'),
                   'kons_thn' => $this->input->post('kons_thn'),
                   'kons_kec_id' => $this->input->post('kons_kec_id'),
                   'kons_det_kmd_id' => $this->input->post('kons_det_kmd_id'),
                );
       $this->db->insert('data_konsumsi', $data);
    }

    public function editkonsumsipertanian($id)
    {
        $data = array(               
            'kons_jml' => $this->input->post('kons_jml'),
            'kons_bulan' => $this->input->post('kons_bulan'),
            'kons_thn' => $this->input->post('kons_thn'),
            'kons_kec_id' => $this->input->post('kons_kec_id'),
            'kons_det_kmd_id' => $this->input->post('kons_det_kmd_id'),
         );
    
        $this->db->where('kons_id', $id);
        $this->db->update('data_konsumsi', $data);
    }

    public function hapusdatakonsumsipertanian($id)
    {
        $this->db->where('kons_id', $id);
        $this->db->delete('data_konsumsi');
    }

    public function newrowkonsumsi($i)
    {
        $query = $this->db->query("Select kons_id FROM data_konsumsi WHERE kons_id =".$i);
        return $query->result();
    }

    public function getdatakomoditaspertanian()
    {
    	$query = $this->db->query("SELECT dko.det_kmd_nama, kec.kec_nama, dk.tanam, dk.panen, dk.provitas, dk.produksi, dk.bulan, dk.tahun, dk.ketersediaan FROM data_komoditas as dk inner join detil_komoditas as dko on dk.det_kmd_id = dko.det_kmd_id inner join komoditas as k on dko.komoditas_kmd_id=k.kmd_id INNER join kategori as ka on k.kategori_kat_id=ka.kat_id inner join kecamatan as kec on kec.kec_id = dk.kec_id where k.kategori_kat_id = 1");
		return $query->result();
    }
}

/* End of file Admin_model.php */
/* Location: ./application/models/Admin_model.php */