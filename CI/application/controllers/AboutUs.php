<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class AboutUs extends MY_Controller{
        public function index(){
            $data['view']       = 'AboutUs';
            $data['site_title'] = 'My Assignment';
            $data['page_title'] = 'About Us -'.$data['site_title'];
            $this->load->view('layout.php',$data);
        }
    }