<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('authentication/auth');
        $this->load->library('recaptcha');
    }
    public function index(){
        $data = array('title'=>'Login Page','eror'=>'');
        $this->load->view('authentication/login', $data);
    }
    public function auth(){
        $captcha_answer = $this->input->post('g-recaptcha-response');
        $response = $this->recaptcha->verifyResponse($captcha_answer);
        if($this->input->post() AND $response['success']){
            $auth = $this->auth->authenticate($this->input->post())->result_array();
            if($auth != NULL){
                $data = array('id' =>$auth[0]['id'],'fullname' => $auth[0]['fullname']);
                $this->session->set_userdata('logeddin',$data);
                redirect('app/dashboard');
            }else{
                $data = array('title'=>'Login Page','eror'=>'<script>swal({
                    title: "Gagal!", 
                    text: "Kombinasi Username dan Password Salah!",
                    type: "error",
                    confirmButtonText: "OK"});</script>');
                    $this->load->view('authentication/login',$data);
            }
        }else{
            $data = array(
                'title' => 'Login Admin BPC',
                'eror' => '<script>swal({
                    title: "Gagal!", 
                    text: "Capcha Harus Diisi!",
                    type: "error",
                    confirmButtonText: "OK"});</script>'
                );
                $this->load->view('authentication/login', $data);
        }
    }
    public function logout(){
        $this->session->sess_destroy();
        redirect('app/login');
    }
}