<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Home extends MY_Controller{
        public function index(){ 
            $data['view']       = 'Home_page';
            $data['site_title'] = 'My Assignment';
            $data['page_title'] = 'Home -'.$data['site_title'];

            $this->load->view('layout',$data);
        }
    }