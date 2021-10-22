<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matkul extends CI_Controller {

  public function __construct(){
    parent::__construct();
    if($this->session->userdata('username')==''){
        redirect('login/logout');
    }
    $this->load->model('matkul_m');
    $this->load->helper('string');
    $this->load->library('form_validation');
  }

  public function index(){
    $this->daftar();
  }

  public function daftar(){
    $data['title_tab'] = 'Daftar Matakuliah';
    $data['title_form'] = 'List Matakuliah';
    $data['list_matkul'] = $this->matkul_m->get();
    $data['page'] = 'matkul/list_matkul';
    $this->load->view('main', $data);
  }

  public function simpan(){
    $kd_matkul = $this->input->post('kd_matkul');
    $matkul = $this->input->post();

    if($kd_matkul == null){
      $query = $this->matkul_m->get(
        array('kd_matkul' => $kd_matkul)
      );
      if(count($query) == 0 ){
        $matkul['kd_matkul'] = 'MK'.random_string('numeric', 3);
        $this->matkul_m->add($matkul);
        $this->session->set_flashdata('success', 'Data berhasil disimpan');
        redirect('matkul/daftar');
      }else{
        $this->session->set_flashdata('warning', 'Data tidak berhasil disimpan, kode matkul yang dimasukan sudah terdaftar');
        redirect('matkul/daftar');
      }
    }else{
      //echo "<pre>";print_r($matkul);"</pre>";
      $this->matkul_m->edit($matkul, 
        array('kd_matkul' => $kd_matkul)
      );
      $this->session->set_flashdata('success', 'Data berhasil diubah');
      redirect('matkul/daftar');
    }
  }

  public function hapus(){
    if($this->uri->segment(3) != null){
      $query = $this->matkul_m->get(
        array('kd_matkul' => $this->uri->segment(3))
      );
      if(count($query) > 0 ){
        $this->matkul_m->delete(
          array('kd_matkul' => $this->uri->segment(3))
        );
        $this->session->set_flashdata('success', 'Data telah dihapus');
        redirect('matkul/daftar');
      }else{
        $this->session->set_flashdata('warning', 'Data yang dipilih tidak ditemukan');
        redirect('matkul/daftar');
      }
    }else{
      $this->session->set_flashdata('warning', 'Tidak ada data yang dipilih');
      redirect('matkul/daftar');
    }
  }
}