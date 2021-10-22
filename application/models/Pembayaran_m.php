<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran_m extends CI_Model {
  var $table ="pembayaran";
  var $tblMhs ="mahasiswa";
  
  public function add($data){
		$this->db->insert($this->table,$data);
	}
	
	public function edit($data,$where){
	  $this->db->where($where);
	  $this->db->update($this->table, $data);
	}
	
	public function get($filter = array()){
	  $this->db->select('pembayaran.kode_pembayaran, pembayaran.no_kps, pembayaran.nim, mahasiswa.nama_mahasiswa, pembayaran.semester, pembayaran.tahun_akademik, pembayaran.tanggal, pembayaran.jumlah_disetor')
      ->from($this->table)
      ->join($this->tblMhs, 'mahasiswa.nim = pembayaran.nim');
	    if(count($filter)>0)
	        $this->db->where($filter);
	    $res = $this->db->get();
	    return $res->result();
	}

	public function get_cetak($filter = array()){
		$this->db->select('pembayaran.kode_pembayaran, pembayaran.nim, mahasiswa.nama_mahasiswa, pembayaran.semester, pembayaran.tahun_akademik, pembayaran.tanggal, pembayaran.sumbangan_pendidikan, pembayaran.biaya_kuliah_semester, pembayaran.biaya_seragam_perlengkapan, pembayaran.biaya_pengenalan_akademik, pembayaran.biaya_capping_day, pembayaran.biaya_kkn, pembayaran.biaya_ujian_akhir, pembayaran.biaya_wisuda, pembayaran.biaya_ikm, pembayaran.biaya_formulir, pembayaran.biaya_test_kesehatan, pembayaran.biaya_lain, pembayaran.jumlah_disetor')
			->from($this->table)
			->join($this->tblMhs, 'mahasiswa.nim = pembayaran.nim');
	    if(count($filter)>0)
	        $this->db->where($filter);
	    $res = $this->db->get();
	    return $res->result();
	}
	
	public function delete($where){
	  $this->db->delete($this->table,$where);
	}
}