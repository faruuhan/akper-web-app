<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kps extends CI_Controller {

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
    $data['title_tab'] = 'Kartu Program Studi';
    $data['title_form'] = 'Form Kartu Program Studi';

    $mhs = $this->mahasiswa_m->get(
          array('nim' => $this->session->userdata('userAlias'))
        );
    
    $cekPembayaran = $this->pembayaran_m->get(
      array('pembayaran.nim' => $this->session->userdata('userAlias'), 'pembayaran.semester' => $mhs['0']->semester )
    );
    
    $cekKPS = $this->kps_m->get(
      array('kps_header.nim' => $this->session->userdata('userAlias'), 'kps_header.semester' => $mhs['0']->semester )
    );
    
    
    if(count($cekPembayaran) > 0 ){
      if(count($cekKPS) == 0 ){
        $data['mhs'] = $this->mahasiswa_m->get(
          array('nim' => $this->session->userdata('userAlias'))
        );
        $mhs = $this->mahasiswa_m->get(
          array('nim' => $this->session->userdata('userAlias'))
        );
        $data['list_jadwal'] = $this->jadwal_m->get(
          array('tahun_akademik >=' => $mhs['0']->angkatan_tahun, 'semester' => $mhs['0']->semester )
        );
        $data['pembayaran'] = $this->pembayaran_m->get(
          array('pembayaran.nim' => $this->session->userdata('userAlias'))
        );
        $data['page'] = 'kps/form_add';
        $this->load->view('main', $data);
      }else{
        $this->daftar();
      }
    }else{
      $this->no_permission();
    }
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
    $data['title_tab'] = 'Daftar Kartu Program Studi';
    $data['title_form'] = 'List Kartu Program Studi';
    $data['mhs'] = $this->mahasiswa_m->get(
      array('nim' => $this->session->userdata('userAlias'))
    );
    $data['list_kps'] = $this->kps_m->get(
      array('kps_header.nim' => $this->session->userdata('userAlias'))
    );
    $data['page'] = 'kps/list_kps';
    $this->load->view('main', $data);
  }

  public function edit(){
    $data['title_tab'] = 'Edit Pembayaran';
    $data['title_form'] = 'Form Pembayaran';
    $data['mhs'] = $this->mahasiswa_m->get(
      array('nim' => $this->session->userdata('userAlias'))
    );
    $data['list_kps'] = $this->kps_m->getjoin(
      array('kps_header.nim' => $this->session->userdata('userAlias'))
    );

    if($this->uri->segment(3) != null){
      $query = $this->kps_m->get(
        array('kps_header.no_kps' => $this->uri->segment(3))
      );
      if(count($query) > 0 ){
        $data['kps'] = $query;
        $data['page'] = 'kps/form_edit';
        $this->load->view('main', $data);
      }else{
        $this->session->set_flashdata('warning', 'Data yang dipilih tidak ditemukan');
        redirect('kps/daftar');
      }
    }else{
      $this->session->set_flashdata('warning', 'Tidak ada data yang dipilih');
      redirect('kps/daftar');
    }
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
        redirect('kps/daftar');
      }
    }else{
      $this->session->set_flashdata('warning', 'Tidak ada data yang dipilih');
      redirect('kps/daftar');
    }
  }

  public function simpan(){
    $page = $this->input->post('page');
    $no_kps = $this->input->post('no_kps');
    $DataKPS = array(
      'no_kps' => $this->input->post('no_kps'),
      'nim' => $this->input->post('nim'),
      'semester' => $this->input->post('semester'),
      'tahun_akademik' => $this->input->post('tahun_akademik')
    );
    
    $kd_matkul = $this->input->post('kd_matkul');
    $kd_jadwal = $this->input->post('kd_jadwal');

    $item=array();
		for($i=0; $i<count($kd_jadwal); $i++){
			$item[$i]['no_kps'] = $no_kps;
      $item[$i]['kd_jadwal'] =$kd_jadwal[$i];
      $item[$i]['kd_matkul'] =$kd_matkul[$i];
    }
    

    if($page == null or $page == 'index'){
      $query = $this->kps_m->get(
        array('no_kps' => $no_kps)
      );
      if(count($query) == 0 ){
        $this->kps_m->add($DataKPS);
        $this->kps_m->addBatch($item);
        $this->session->set_flashdata('success', 'Data berhasil disimpan');
        redirect('kps/daftar');
      }else{
        $this->session->set_flashdata('warning', 'Data tidak berhasil disimpan, kode pembayaran yang dimasukan sudah terdaftar');
        redirect('kps/daftar');
      }
    }else{
      $this->kps_m->edit($DataKPS, 
        array('no_kps' => $no_kps)
      );
      $this->session->set_flashdata('success', 'Data berhasil diubah');
      redirect('kps/daftar');
    }
  }

  // public function hapus(){
  //   if($this->uri->segment(3) != null){
  //     $query = $this->pembayaran_m->get(
  //       array('kode_pembayaran' => $this->uri->segment(3))
  //     );
  //     if(count($query) > 0 ){
  //       $this->pembayaran_m->delete(
  //         array('kode_pembayaran' => $this->uri->segment(3))
  //       );
  //       $this->session->set_flashdata('success', 'Data telah dihapus');
  //       redirect('pembayaran/daftar');
  //     }else{
  //       $this->session->set_flashdata('warning', 'Data yang dipilih tidak ditemukan');
  //       redirect('pembayaran/daftar');
  //     }
  //   }else{
  //     $this->session->set_flashdata('warning', 'Tidak ada data yang dipilih');
  //     redirect('pembayaran/daftar');
  //   }
  // }
}