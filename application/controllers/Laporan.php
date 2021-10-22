<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

  public function __construct(){
    parent::__construct();
    if($this->session->userdata('username')==''){
        redirect('login/logout');
    }
    $this->load->model('pembayaran_m');
    $this->load->model('mahasiswa_m');
    $this->load->model('jadwal_m');
    $this->load->model('kps_m');
    $this->load->library('mypdf');
  }
  
  public function index(){
    $this->daftar();
  }

  public function no_permission(){
    $data['title_tab'] = 'So Sorry!!';
    $data['mhs'] = $this->mahasiswa_m->get(
      array('nim' => $this->session->userdata('userAlias'))
    );
    $data['page'] = 'no_permission';
    $this->load->view('main', $data);
  }

  public function daftar(){
    $data['title_tab'] = 'Laporan Kartu Program Studi';
    $data['title_form'] = 'Laporan Kartu Program Studi';
    $data['list_kps'] = $this->kps_m->get();
    $data['page'] = 'laporan/list_laporan';
    $this->load->view('main', $data);
  }

  public function cetak_kps(){
    if($this->uri->segment(3) != null){
      $query = $this->kps_m->getjoin(
      array('kps_header.no_kps' => $this->uri->segment(3))
      );
      if(count($query) > 0 ){
        $data['kps'] = $query; 
        $html = $this->load->view('kps/cetak', $data, true);
        $this->mypdf->pdfgenerate($html, 'KPS-', 'A4', 'potrait');
      }else{
        $this->session->set_flashdata('warning', 'Data yang dipilih tidak ditemukan');
        redirect('laporan/list_laporan');
      }
    }else{
      $this->session->set_flashdata('warning', 'Tidak ada data yang dipilih');
      redirect('laporan/list_laporan');
    }
  }
}