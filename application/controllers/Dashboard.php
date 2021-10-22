<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

  public function __construct(){
    parent::__construct();
    if($this->session->userdata('username')==''){
        redirect('login/logout');
    }
    $this->load->model('mahasiswa_m');
  }

  public function index(){
    $data['title_tab'] = 'Dashboard';
    $data['title_page'] = 'Dashboard';
    $data['mhs'] = $this->mahasiswa_m->get(
      array('nim' => $this->session->userdata('userAlias'))
    );
    $data['page'] = 'dashboard/dashboard';
    $this->load->view('main', $data);
  }
}