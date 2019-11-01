<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class User extends MY_Controller{
        public function index(){ 
            $data['view']       = 'User';
            $data['site_title'] = 'My Assignment';
            $data['page_title'] = 'User -'.$data['site_title'];

            $this->load->model('UserModel');
            $result = $this->UserModel->index();
            
            $data['result'] = $result->result_array();

            $this->load->view('layout',$data);
        }
    }