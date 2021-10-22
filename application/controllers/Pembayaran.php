<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

  public function __construct(){
    parent::__construct();
    if($this->session->userdata('username')==''){
        redirect('login/logout');
    }
    $this->load->model('pembayaran_m');
    $this->load->model('mahasiswa_m');
    $this->load->helper('string');
    $this->load->library('mypdf');
  }

  public function index(){
    $data['title_tab'] = 'Pembayaran';
    $data['title_form'] = 'Form Pembayaran';
    $data['list_mhs'] = $this->mahasiswa_m->get();
    $data['page'] = 'pembayaran/form_add';
    $this->load->view('main', $data);
  }

  public function daftar(){
    $data['title_tab'] = 'Daftar Pembayaran';
    $data['title_form'] = 'List Pembayaran';
    $data['list_pembayaran'] = $this->pembayaran_m->get();
    $data['pembayaran_cetak'] = $this->pembayaran_m->get_cetak();
    $data['page'] = 'pembayaran/list_pembayaran';
    $this->load->view('main', $data);
  }

  public function edit(){
    $data['title_tab'] = 'Edit Pembayaran';
    $data['title_form'] = 'Form Pembayaran';
    $data['list_mhs'] = $this->mahasiswa_m->get();

    if($this->uri->segment(3) != null){
      $query = $this->pembayaran_m->get(
        array('kode_pembayaran' => $this->uri->segment(3))
      );
      if(count($query) > 0 ){
        $data['pembayaran'] = $query;
        $data['page'] = 'pembayaran/form_edit';
        $this->load->view('main', $data);
      }else{
        $this->session->set_flashdata('warning', 'Data yang dipilih tidak ditemukan');
        redirect('pembayaran/daftar');
      }
    }else{
      $this->session->set_flashdata('warning', 'Tidak ada data yang dipilih');
      redirect('pembayaran/daftar');
    }
  }

  public function cetak_pembayaran(){
    $tglStart = $this->input->post('tglStart');
    $tglEnd =  $this->input->post('tglEnd');
    $filter = array();

    $filter['pembayaran.tanggal >="'.$tglStart.'" and pembayaran.tanggal <="'.$tglEnd.'"'] = null;

    if($tglStart != null and $tglEnd != null){
      $query = $this->pembayaran_m->get($filter);
      if(count($query) > 0 ){
        $data['pembayaran'] = $query; 
        $html = $this->load->view('pembayaran/cetak', $data, true);
        $this->mypdf->pdfgenerate($html, 'pembayaran', 'A4', 'potrait');
      }else{
        $this->session->set_flashdata('warning', 'Data yang dipilih tidak ditemukan');
        redirect('pembayaran/daftar');
      }
    }else{
      $this->session->set_flashdata('warning', 'Tidak ada data yang dipilih');
      redirect('pembayaran/daftar');
    }
  }

  public function cetak(){
    if($this->uri->segment(3) != null){
      $query = $this->pembayaran_m->get_cetak(
        array('pembayaran.kode_pembayaran' => $this->uri->segment(3))
      );
      if(count($query) > 0 ){
        $data['pembayaran'] = $query; 
        $html = $this->load->view('pembayaran/cetak_2', $data, true);
        $this->mypdf->pdfgenerate($html, 'pembayaran', 'A4', 'potrait');
      }else{
        $this->session->set_flashdata('warning', 'Data yang dipilih tidak ditemukan');
        redirect('pembayaran/daftar');
      }
    }else{
      $this->session->set_flashdata('warning', 'Tidak ada data yang dipilih');
      redirect('pembayaran/daftar');
    }
  }

  public function simpan(){
    $kode_pembayaran = $this->input->post('kode_pembayaran');
    $pembayaran = $this->input->post();

    if($kode_pembayaran == null){
      $query = $this->pembayaran_m->get(
        array('kode_pembayaran' => $kode_pembayaran)
      );
      if(count($query) == 0 ){
        $pembayaran['kode_pembayaran'] = random_string('numeric', 5);
        $this->pembayaran_m->add($pembayaran);
        $this->session->set_flashdata('success', 'Data berhasil disimpan');
        redirect('pembayaran/daftar');
      }else{
        $this->session->set_flashdata('warning', 'Data tidak berhasil disimpan, kode pembayaran yang dimasukan sudah terdaftar');
        redirect('pembayaran/daftar');
      }
    }else{
      //echo "<pre>";print_r($pembayaran);"</pre>";
      $this->pembayaran_m->edit($pembayaran, 
        array('kode_pembayaran' => $kode_pembayaran)
      );
      $this->session->set_flashdata('success', 'Data berhasil diubah');
      redirect('pembayaran/daftar');
    }
  }

  public function hapus(){
    if($this->uri->segment(3) != null){
      $query = $this->pembayaran_m->get(
        array('kode_pembayaran' => $this->uri->segment(3))
      );
      if(count($query) > 0 ){
        $this->pembayaran_m->delete(
          array('kode_pembayaran' => $this->uri->segment(3))
        );
        $this->session->set_flashdata('success', 'Data telah dihapus');
        redirect('pembayaran/daftar');
      }else{
        $this->session->set_flashdata('warning', 'Data yang dipilih tidak ditemukan');
        redirect('pembayaran/daftar');
      }
    }else{
      $this->session->set_flashdata('warning', 'Tidak ada data yang dipilih');
      redirect('pembayaran/daftar');
    }
  }
}