<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Contact_us extends MY_Controller{
        public function index(){
            $data['site_url'] = site_url();
            $this->load->view('Contact_us',$data);
        }
    }