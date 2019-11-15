<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Logout extends MY_Controller{
        function __construct(){
            parent::__construct();
        }
        public function index(){ 
            $data['view']       = 'Logout';
            $data['site_title'] = 'My Assignment';
            $data['page_title'] = 'Logout Up -'.$data['site_title'];
            $this->session->unset_userdata('logged in');

            // redirect(site_url('Login'));
            $this->load->view('layout',$data);
        }
    }