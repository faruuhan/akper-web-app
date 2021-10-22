<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kps_m extends CI_Model {
  var $table ="kps_header";
  var $tblKpsDetail ="kps_detail";
  var $tblMatkul ="matkul";
  var $tblMhs ="mahasiswa";
  
  public function add($data){
		$this->db->insert($this->table,$data);
  }
  
  public function addBatch($data){
		$this->db->insert_batch($this->tblKpsDetail,$data);
	}
	
	public function edit($data,$where){
	  $this->db->where($where);
	  $this->db->update($this->table, $data);
	}
	
	public function getjoin($filter = array()){
	  $this->db->select('*')
      ->from($this->table)
      ->join($this->tblKpsDetail, 'kps_header.no_kps = kps_detail.no_kps')
      ->join($this->tblMatkul, 'kps_detail.kd_matkul = matkul.kd_matkul')
      ->join($this->tblMhs, 'kps_header.nim = mahasiswa.nim');
	    if(count($filter)>0)
	        $this->db->where($filter);
	    $res = $this->db->get();
	    return $res->result();
  }

  public function get($filter = array()){
	  $this->db->select('*')
			->from($this->table)
			->join($this->tblMhs, 'mahasiswa.nim = kps_header.nim');
	    if(count($filter)>0)
	        $this->db->where($filter);
	    $res = $this->db->get();
	    return $res->result();
	}
	
	public function delete($where){
	  $this->db->delete($this->tblKpsDetail,$where);
	}
}