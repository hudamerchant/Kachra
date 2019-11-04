<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class ContactUs extends MY_Controller{
        public function index(){
            $data['view']       = 'ContactUs';
            $data['site_title'] = 'My Assignment';
            $data['page_title'] = 'Contact Us -'.$data['site_title'];
            $this->load->view('layout',$data);
        }
    }