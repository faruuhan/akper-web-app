<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

  public function __construct(){
    parent::__construct();
    if($this->session->userdata('username')==''){
        redirect('login/logout');
    }
    $this->load->model('mahasiswa_m');
    $this->load->helper('string');
    $this->load->library('form_validation');
  }

  public function index(){
    $data['title_tab'] = 'Tambah Mahasiswa';
    $data['title_form'] = 'Form Mahasiswa';
    $data['page'] = 'mhs/form_add';
    $this->load->view('main', $data);
  }

  public function daftar(){
    $data['title_tab'] = 'Daftar Mahasiswa';
    $data['title_form'] = 'List Mahasiswa';
    $data['list_mahasiswa'] = $this->mahasiswa_m->get();
    $data['page'] = 'mhs/list_mhs';
    $this->load->view('main', $data);
  }

  public function edit(){
    $data['title_tab'] = 'Edit Mahasiswa';
    $data['title_form'] = 'Form Mahasiswa';

    if($this->uri->segment(3) != null){
      $query = $this->mahasiswa_m->get(
        array('nim' => $this->uri->segment(3))
      );
      if(count($query) > 0 ){
        $data['mhs'] = $query;
        $data['page'] = 'mhs/form_edit';
        $this->load->view('main', $data);
      }else{
        $this->session->set_flashdata('warning', 'Data yang dipilih tidak ditemukan');
        redirect('mahasiswa/daftar');
      }
    }else{
      $this->session->set_flashdata('warning', 'Tidak ada data yang dipilih');
      redirect('mahasiswa/daftar');
    }
  }

  public function simpan(){
    $nim = $this->input->post('nim');
    $page = $this->input->post('page');
    $mhs = array(
      'nim' => $this->input->post('nim'),
      'nama_mahasiswa' => $this->input->post('nama_mahasiswa'),
      'jenis_kelamin' => $this->input->post('jenis_kelamin'),
      'angkatan_tahun' => $this->input->post('angkatan_tahun'),
      'tgl_lahir' => $this->input->post('tgl_lahir'),
      'semester' => $this->input->post('semester')
    );

    if($page == null or $page == 'index'){
      $query = $this->mahasiswa_m->get(
        array('nim' => $nim)
      );
      if(count($query) > 0 ){
        $this->session->set_flashdata('warning', 'Data tidak berhasil disimpan, NIM yang dimasukan sudah terdaftar');
        redirect('mahasiswa/daftar');
      }else{
        $this->mahasiswa_m->add($mhs);
        $this->session->set_flashdata('success', 'Data berhasil disimpan');
        redirect('mahasiswa/daftar');
      }
    }else{
      //echo "<pre>";print_r($mhs);"</pre>";
      $this->mahasiswa_m->edit($mhs, 
        array('nim' => $nim)
      );
      $this->session->set_flashdata('success', 'Data berhasil diubah');
      redirect('mahasiswa/daftar');
    }
  }

  public function hapus(){
    if($this->uri->segment(3) != null){
      $query = $this->mahasiswa_m->get(
        array('nim' => $this->uri->segment(3))
      );
      if(count($query) > 0 ){
        $this->mahasiswa_m->delete(
          array('nim' => $this->uri->segment(3))
        );
        $this->session->set_flashdata('success', 'Data telah dihapus');
        redirect('mahasiswa/daftar');
      }else{
        $this->session->set_flashdata('warning', 'Data yang dipilih tidak ditemukan');
        redirect('mahasiswa/daftar');
      }
    }else{
      $this->session->set_flashdata('warning', 'Tidak ada data yang dipilih');
      redirect('mahasiswa/daftar');
    }
  }
}