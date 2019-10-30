<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Home extends MY_Controller{
        public function index(){ 
            $data['site_url'] = site_url();
            $this->load->view('Home_page',$data);
        }
    }