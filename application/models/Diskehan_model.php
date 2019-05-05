<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diskehan_model extends CI_Model {

    public function getkecamatan()
    {
    	$query = $this->db->query("Select * FROM kecamatan");
		return $query->result();
    }

    public function savekecamatan()
    {
       $data = array(
                   'kec_id' => $this->input->post('kec_id'),
                   'kec_nama' => $this->input->post('kec_nama')
                );
       $this->db->insert('kecamatan', $data);
    }

    public function deletekecamatan($id)
    {
        $this->db->where('kec_id', $id);
        $this->db->delete('kecamatan');
    }

    public function getpenduduk()
    {
    	$query = $this->db->query("Select * FROM data_penduduk as dp inner join kecamatan as k on k.kec_id=dp.pend_kec_id");
		return $query->result();
    }

    public function getpendudukbyid($id)
    {
        $query = $this->db->query("Select * FROM data_penduduk as p INNER JOIN kecamatan as k ON p.pend_kec_id=k.kec_id WHERE pend_id = ".$id);
        return $query->result();
    }

    public function newrowpenduduk($i)
    {
        $query = $this->db->query("Select pend_id FROM data_penduduk WHERE pend_id =".$i);
        return $query->result();
    }

    public function savependuduk($id)
    {
       $data = array(
                   'pend_id' => $id,
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

    public function getkomoditibyid($id)
    {
    	$query = $this->db->query("SELECT d.det_kmd_id,d.det_kmd_nama FROM `komoditas` as k inner join detil_komoditas as d on d.komoditas_kmd_id = k.kmd_id where k.kategori_kat_id =".$id);
		return $query->result();
    }

    public function getkonsumsibyid($id)
    {
    	$query = $this->db->query("SELECT dk.kons_id, dk.kons_jml, dk.kons_bulan, dk.kons_thn, kec.kec_nama, d.det_kmd_nama FROM data_konsumsi as dk inner join detil_komoditas as d on dk.kons_det_kmd_id = d.det_kmd_id inner join komoditas as k on k.kmd_id = d.komoditas_kmd_id inner join kecamatan as kec on dk.kons_kec_id=kec.kec_id where k.kategori_kat_id =".$id);
		return $query->result();
    }

    public function newrowkonsumsi($i)
    {
        $query = $this->db->query("Select kons_id FROM data_konsumsi WHERE kons_id =".$i);
        return $query->result();
    }

    public function savekonsumsi($id)
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

    public function editkonsumsi($id)
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

    public function hapusdatakonsumsi($id)
    {
        $this->db->where('kons_id', $id);
        $this->db->delete('data_konsumsi');
    }

    public function getdatakonsumsibyid($id)
    {
        $query = $this->db->query("SELECT dk.kons_id, dk.kons_jml, dk.kons_bulan,dk.kons_thn, dk.kons_kec_id, dk.kons_det_kmd_id, k.kec_nama, dko.det_kmd_nama FROM data_konsumsi as dk inner join kecamatan as k on k.kec_id = dk.kons_kec_id inner join detil_komoditas as dko on dko.det_kmd_id= dk.kons_det_kmd_id where dk.kons_id =".$id);
		return $query->result();
    }

    public function getdatakomoditasbyid($id)
    {
    	$query = $this->db->query("SELECT dko.det_kmd_nama, kec.kec_nama, dk.tanam, dk.panen, dk.provitas, dk.produksi, dk.bulan, dk.tahun, dk.ketersediaan FROM data_komoditas as dk inner join detil_komoditas as dko on dk.det_kmd_id = dko.det_kmd_id inner join komoditas as k on dko.komoditas_kmd_id=k.kmd_id INNER join kategori as ka on k.kategori_kat_id=ka.kat_id inner join kecamatan as kec on kec.kec_id = dk.kec_id where k.kategori_kat_id =".$id);
		return $query->result();
    }

    public function savekomoditas($id)
    {
       $data = array(
                   'id' => $id,              
                   'det_kmd_id' => $this->input->post('det_kmd_id'),
                   'kec_id' => $this->input->post('kec_id'),
                   'tanam' => $this->input->post('tanam'),
                   'panen' => $this->input->post('panen'),
                   'provitas' => $this->input->post('provitas'),
                   'produksi' => $this->input->post('produksi'),
                   'bulan' => $this->input->post('bulan'),
                   'tahun' => $this->input->post('tahun'),
                   'ketersediaan' => $this->input->post('ketersediaan')
                );
       $this->db->insert('data_komoditas', $data);
    }

    public function hapusdatakomoditas($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('data_komoditas');
    }

    //model rekap
    public function ajax_rekap_pertanian($tahun){
        $hasil=$this->db->query("SELECT de.det_kmd_nama, SUM(dk.tanam) as tanam, SUM(dk.panen) as panen, SUM(dk.provitas) as provitas, sum(dk.produksi) as produksi, sum(dk.ketersediaan) as ketersediaan, sum(dk.surplus) as surplus, sum(dk.psb) as psb FROM data_komoditas as dk inner join detil_komoditas as de on de.det_kmd_id=dk.det_kmd_id inner join komoditas as k on k.kmd_id=de.komoditas_kmd_id where dk.tahun = '$tahun' AND k.kategori_kat_id = 1 GROUP BY dk.det_kmd_id");
		return $hasil->result();
    }
}