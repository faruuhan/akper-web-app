<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_m extends CI_Model {
	var $table ="users";
	
	public function add($data){
		$this->db->insert($this->table,$data);
	}
	
	public function edit($data,$where){
	  $this->db->where($where);
	  $this->db->update($this->table, $data);
	}
	
	public function get($filter = array()){
		$this->db->select('*')
			->from($this->table);
		
		if(count($filter)>0)
			$this->db->where($filter);
		
		$res = $this->db->get();
		
		return $res->result();
		
	}
}	
	