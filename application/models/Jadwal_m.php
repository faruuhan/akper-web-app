<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_m extends CI_Model {
  var $table ="jadwal";
  var $tblMatkul ="matkul";
  var $tblDosen ="dosen";
  
  public function add($data){
		$this->db->insert($this->table,$data);
	}
	
	public function edit($data,$where){
	  $this->db->where($where);
	  $this->db->update($this->table, $data);
	}
	
	public function get($filter = array()){
	  $this->db->select('*')
      ->from($this->table)
      ->join($this->tblMatkul, 'matkul.kd_matkul = jadwal.kd_matkul')
      ->join($this->tblDosen, 'dosen.nidn = jadwal.nidn');
	    if(count($filter)>0)
	        $this->db->where($filter);
	    $res = $this->db->get();
	    return $res->result();
	}

	public function get_cetak($filter = array()){
		$this->db->distinct();
		$this->db->select('semester, tahun_akademik')
      ->from($this->table);
	    if(count($filter)>0)
	        $this->db->where($filter);
	    $res = $this->db->get();
	    return $res->result();
	}
	
	public function delete($where){
	  $this->db->delete($this->table,$where);
	}
}