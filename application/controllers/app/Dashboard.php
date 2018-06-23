<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('app/m_dashboard');
        if(empty($this->session->userdata('logeddin'))){
            redirect('app/login');
        }
    }
    public function index(){
        $sess = $this->session->userdata('logeddin');
        $id = $sess['id'];

        $data_user = $this->m_dashboard->user("where id_user='$id'");
        $data = array(
            'nama_user' => $data_user[0]['nama'],
            'kelas' => $data_user[0]['kelas'],
            'jurusan' => $data_user[0]['jurusan']
        );
        $theme_data['main_content'] = $this->load->view(DASHBOARD_ADM, $data, true);
        $this->load->view(MASTER, $theme_data);
    }
}