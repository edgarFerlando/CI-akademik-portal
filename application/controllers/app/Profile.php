<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Profile extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('app/m_profile');
        if(empty($this->session->userdata('logeddin'))){
            redirect('app/login');
        }
    }
    public function index(){
        $sess = $this->session->userdata('logeddin');
        $id = $sess['id'];

        $data_user = $this->m_profile->get_data("where id_user='$id'");
        $data = array(
            'nama_user' => $data_user[0]['nama'],
            'kelas' => $data_user[0]['kelas'],
            'prodi' => $data_user[0]['jurusan'],
            'alamat' => $data_user[0]['alamat'],
            'telepon' => $data_user[0]['telp'],
            'photo' => $data_user[0]['photo']
        );
        $theme_data['main_content'] = $this->load->view(PROFILE_ADM, $data, true);
        $this->load->view(MASTER, $theme_data);
    }
}