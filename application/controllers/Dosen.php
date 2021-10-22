<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {

  public function __construct(){
    parent::__construct();
    if($this->session->userdata('username')==''){
        redirect('login/logout');
    }
    $this->load->model('dosen_m');
    $this->load->helper('string');
    $this->load->library('form_validation');
  }

  public function index(){
    $data['title_tab'] = 'Tambah Dosen';
    $data['title_form'] = 'Form Dosen';
    $data['page'] = 'dosen/form_add';
    $this->load->view('main', $data);
  }

  public function daftar(){
    $data['title_tab'] = 'Daftar Dosen';
    $data['title_form'] = 'List Dosen';
    $data['list_dosen'] = $this->dosen_m->get();
    $data['page'] = 'dosen/list_dosen';
    $this->load->view('main', $data);
  }

  public function edit(){
    $data['title_tab'] = 'Edit Dosen';
    $data['title_form'] = 'Form Dosen';

    if($this->uri->segment(3) != null){
      $query = $this->dosen_m->get(
        array('nidn' => $this->uri->segment(3))
      );
      if(count($query) > 0 ){
        $data['dosen'] = $query;
        $data['page'] = 'dosen/form_edit';
        $this->load->view('main', $data);
      }else{
        $this->session->set_flashdata('warning', 'Data yang dipilih tidak ditemukan');
        redirect('dosen/daftar');
      }
    }else{
      $this->session->set_flashdata('warning', 'Tidak ada data yang dipilih');
      redirect('dosen/daftar');
    }
  }

  public function simpan(){
    $nidn = $this->input->post('nidn');
    $page = $this->input->post('page');
    $dosen = array(
      'nidn' => $this->input->post('nidn'),
      'nama_dosen' => $this->input->post('nama_dosen'),
      'jenis_kelamin' => $this->input->post('jenis_kelamin'),
      'alamat' => $this->input->post('alamat')
    );

    if($page == null or $page == 'index'){
      $query = $this->dosen_m->get(
        array('nidn' => $nidn)
      );
      if(count($query) == 0 ){
        $this->dosen_m->add($dosen);
        $this->session->set_flashdata('success', 'Data berhasil disimpan');
        redirect('dosen/daftar');
      }else{
        $this->session->set_flashdata('warning', 'Data tidak berhasil disimpan, nidn yang dimasukan sudah terdaftar');
        redirect('dosen/daftar');
      }
    }else{
      //echo "<pre>";print_r($dosen);"</pre>";
      $this->dosen_m->edit($dosen, 
        array('nidn' => $nidn)
      );
      $this->session->set_flashdata('success', 'Data berhasil diubah');
      redirect('dosen/daftar');
    }
  }

  public function hapus(){
    if($this->uri->segment(3) != null){
      $query = $this->dosen_m->get(
        array('nidn' => $this->uri->segment(3))
      );
      if(count($query) > 0 ){
        $this->dosen_m->delete(
          array('nidn' => $this->uri->segment(3))
        );
        $this->session->set_flashdata('success', 'Data telah dihapus');
        redirect('dosen/daftar');
      }else{
        $this->session->set_flashdata('warning', 'Data yang dipilih tidak ditemukan');
        redirect('dosen/daftar');
      }
    }else{
      $this->session->set_flashdata('warning', 'Tidak ada data yang dipilih');
      redirect('dosen/daftar');
    }
  }
}