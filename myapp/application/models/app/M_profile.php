<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_profile extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
    public function get_data($where = ''){
        $query = $this->db->query("select * from user_data $where");
        if($query >= null){
            return $query->result_array();
        }else{
            return false;
        }
    }
}