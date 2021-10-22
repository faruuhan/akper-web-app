<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

  public function __construct(){
    parent::__construct();
    if($this->session->userdata('username')==''){
        redirect('login/logout');
    }
    $this->load->model('users_m');
    $this->load->model('mahasiswa_m');
    $this->load->helper('string');
    $this->load->library('form_validation');
  }

  public function index(){
    $data['title_tab'] = 'Tambah User';
    $data['title_form'] = 'Form User';
    $data['list_mhs'] = $this->mahasiswa_m->get();
    $data['page'] = 'user/form_add';
    $this->load->view('main', $data);
  }

  public function daftar(){
    $data['title_tab'] = 'Daftar User';
    $data['title_form'] = 'List User';
    $data['mhs'] = $this->mahasiswa_m->get();
    $data['list_user'] = $this->users_m->get();
    $data['page'] = 'user/list_user';
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
        $data['page'] = 'user/form_edit';
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
    $id = $this->input->post('id');
    $userType = $this->input->post('userType');
    $userAlias = $this->input->post('userAlias');
    $username = $this->input->post('username');
    $pass = $this->input->post('password');

    if($userType == 'Mahasiswa'){
      $user = array(
        'userType' => $userType,
        'userAlias' => $userAlias,
        'username' => $username,
        'password' => $pass
      );
    }else if($userType == 'Akademik'){
      $user = array(
        'userType' => $userType,
        'userAlias' => 'Akademik',
        'username' => $username,
        'password' => $pass
      );
    }else if($userType == 'PA'){
      $user = array(
        'userType' => $userType,
        'userAlias' => 'PA',
        'username' => $username,
        'password' => $pass
      );
    }else{
      $user = array(
        'userType' => $userType,
        'userAlias' => 'Admin',
        'username' => $username,
        'password' => $pass
      );
    }
    

    if($id == null){
      $query = $this->users_m->get(
        array('userAlias' => $id)
      );
      if(count($query) == 0 ){
        $user['id'] = random_string('numeric', 5);
        $user['status'] = '1';
        $this->users_m->add($user);
        $this->session->set_flashdata('success', 'Data berhasil disimpan');
        redirect('user/daftar');
      }else{
        $this->session->set_flashdata('warning', 'Data tidak berhasil disimpan, User sudah ada');
        redirect('user/daftar');
      }
    }else{
      //echo "<pre>";print_r($dosen);"</pre>";
      $this->users_m->edit($user, 
        array('id' => $id)
      );
      $this->session->set_flashdata('success', 'Data berhasil diubah');
      redirect('user/daftar');
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