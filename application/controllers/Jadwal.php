<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {

  public function __construct(){
    parent::__construct();
    if($this->session->userdata('username')==''){
        redirect('login/logout');
    }
    $this->load->model('jadwal_m');
    $this->load->model('matkul_m');
    $this->load->model('dosen_m');
    $this->load->helper('string');
    $this->load->library('mypdf');
  }

  public function index(){
    $data['title_tab'] = 'Tambah Jadwal';
    $data['title_form'] = 'Form Jadwal';
    $data['list_matkul'] = $this->matkul_m->get();
    $data['list_dosen'] = $this->dosen_m->get();
    $data['page'] = 'jadwal/form_add';
    $this->load->view('main', $data);
  }

  public function daftar(){
    $data['title_tab'] = 'Daftar Jadwal';
    $data['title_form'] = 'List Jadwal';
    $data['list_jadwal'] = $this->jadwal_m->get();
    $data['jadwal_cetak'] = $this->jadwal_m->get_cetak();
    $data['page'] = 'jadwal/list_jadwal';
    $this->load->view('main', $data);
  }

  public function edit(){
    $data['title_tab'] = 'Edit Jadwal';
    $data['title_form'] = 'Form Jadwal';
    $data['list_matkul'] = $this->matkul_m->get();
    $data['list_dosen'] = $this->dosen_m->get();

    if($this->uri->segment(3) != null){
      $query = $this->jadwal_m->get(
        array('kd_jadwal' => $this->uri->segment(3))
      );
      if(count($query) > 0 ){
        $data['jadwal'] = $query;
        $data['page'] = 'jadwal/form_edit';
        $this->load->view('main', $data);
      }else{
        $this->session->set_flashdata('warning', 'Data yang dipilih tidak ditemukan');
        redirect('jadwal/daftar');
      }
    }else{
      $this->session->set_flashdata('warning', 'Tidak ada data yang dipilih');
      redirect('jadwal/daftar');
    }
  }

  public function cetak_jadwal(){
    $semester = $this->input->post('semester');
    $tahun_akd = $this->input->post('tahun_akademik');

    if($semester != null & $tahun_akd != null){
      $query = $this->jadwal_m->get(
      array('jadwal.tahun_akademik' => $tahun_akd, 'jadwal.semester' => $semester)
      );
      if(count($query) > 0 ){
        $data['jadwal'] = $query; 
        $html = $this->load->view('jadwal/cetak', $data, true);
        $this->mypdf->pdfgenerate($html, 'Jadwal Ruangan-', 'A4', 'landscape');
      }else{
        $this->session->set_flashdata('warning', 'Data yang dipilih tidak ditemukan');
        redirect('jadwal/daftar');
      }
    }else{
      $this->session->set_flashdata('warning', 'Tidak ada data yang dipilih');
      redirect('jadwal/daftar');
    }
  }

  public function simpan(){
    $kd_jadwal = $this->input->post('kd_jadwal');
    $dosen = $this->input->post('nidn');
    $hari = $this->input->post('hari');
    $ruangan = $this->input->post('ruangan');
    $jam = $this->input->post('jam');
    $jadwal = $this->input->post();

    $val1 = $this->jadwal_m->get(
        array('jadwal.nidn' => $dosen, 'jadwal.hari' => $hari, 'jadwal.ruangan' => $ruangan, 'jam' => $jam)
    );
    $val2 = $this->jadwal_m->get(
        array('jadwal.hari' => $hari, 'jadwal.ruangan' => $ruangan, 'jadwal.jam' => $jam)
    );
    $val3 = $this->jadwal_m->get(
        array('jadwal.nidn' => $dosen, 'jadwal.hari' => $hari, 'jadwal.jam' => $jam)
    );

    $valid = $this->jadwal_m->get(
        array('jadwal.kd_jadwal' => $kd_jadwal, 'jadwal.hari' => $hari, 'jadwal.ruangan' => $ruangan, 'jadwal.jam' => $jam)
    );

    $valid2 = $this->jadwal_m->get(
        array('jadwal.kd_jadwal' => $kd_jadwal, 'jadwal.nidn' => $dosen, 'jadwal.hari' => $hari, 'jadwal.ruangan' => $ruangan, 'jadwal.jam' => $jam)
    );

    $valid3 = $this->jadwal_m->get(
        array('jadwal.kd_jadwal' => $kd_jadwal, 'jadwal.nidn' => $dosen, 'jadwal.hari' => $hari, 'jadwal.jam' => $jam)
    );

    if($kd_jadwal == null){
      $query = $this->jadwal_m->get(
        array('kd_jadwal' => $kd_jadwal)
      );
      if(count($query) == 0 ){
        if(count($val1) == 0 ){
          if(count($val2) == 0 ){
            if(count($val3) == 0 ){
              $jadwal['kd_jadwal'] = 'JD'.random_string('numeric', 3);
              $this->jadwal_m->add($jadwal);
              $this->session->set_flashdata('success', 'Data berhasil disimpan');
              redirect('jadwal/daftar');
            }
            $this->session->set_flashdata('success', 'Data berhasil diubah');
            redirect('jadwal/daftar');
          }
          $this->session->set_flashdata('warning', 'Data tidak berhasil disimpan, Ruangan sedang dipakai dijam yang sama!');
          redirect('jadwal/daftar');
        }
        $this->session->set_flashdata('warning', 'Data tidak berhasil disimpan, Data Sudah Ada!');
        redirect('jadwal/daftar');
      }else{
        $this->session->set_flashdata('warning', 'Data tidak berhasil disimpan, kode jadwal yang dimasukan sudah terdaftar');
        redirect('jadwal/daftar');
      }
    }else{
      //echo "<pre>";print_r($jadwal);"</pre>";
      if(count($valid2) != null ){
        $this->jadwal_m->edit($jadwal, 
               array('kd_jadwal' => $kd_jadwal)
          );
          $this->session->set_flashdata('success', 'Data berhasil diubah');
          redirect('jadwal/daftar');
      }
      if(count($val1) == 0 ){
        if(count($valid) != null){
          $this->jadwal_m->edit($jadwal, 
               array('kd_jadwal' => $kd_jadwal)
          );
           $this->session->set_flashdata('success', 'Data berhasil diubah');
           redirect('jadwal/daftar');
          // echo  '<pre>',print_r($valid),'</pre>';
        }else{
          if(count($val2) == 0 ){
            if(count($valid3) != null){
              $this->jadwal_m->edit($jadwal, 
                 array('kd_jadwal' => $kd_jadwal)
              );
              $this->session->set_flashdata('success', 'Data berhasil diubah');
              redirect('jadwal/daftar');
            }
             if(count($val3) == 0 ){
               $this->jadwal_m->edit($jadwal, 
                 array('kd_jadwal' => $kd_jadwal)
               );
               $this->session->set_flashdata('success', 'Data berhasil diubah');
               redirect('jadwal/daftar');
             }
            $this->session->set_flashdata('warning', 'Data tidak berhasil diubah');
            redirect('jadwal/daftar');
          }
          $this->session->set_flashdata('warning', 'Data tidak berhasil diubah, Ruangan sedang dipakai dijam yang sama!');
          redirect('jadwal/daftar');
        }
      }else{
        $this->session->set_flashdata('warning', 'Data tidak berhasil diubah, Data Sudah Ada!');
        redirect('jadwal/daftar');
      }
    }
  }

  public function hapus(){
    if($this->uri->segment(3) != null){
      $query = $this->jadwal_m->get(
        array('kd_jadwal' => $this->uri->segment(3))
      );
      if(count($query) > 0 ){
        $this->jadwal_m->delete(
          array('kd_jadwal' => $this->uri->segment(3))
        );
        $this->session->set_flashdata('success', 'Data telah dihapus');
        redirect('jadwal/daftar');
      }else{
        $this->session->set_flashdata('warning', 'Data yang dipilih tidak ditemukan');
        redirect('jadwal/daftar');
      }
    }else{
      $this->session->set_flashdata('warning', 'Tidak ada data yang dipilih');
      redirect('jadwal/daftar');
    }
  }
}