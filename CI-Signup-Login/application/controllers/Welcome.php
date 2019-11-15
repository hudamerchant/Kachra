<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Welcome extends MY_Controller{
        function __construct(){
            parent::__construct();
        }
        public function index(){ 
            if($this->session->userdata('logged in')){
                $data['view']       = 'Welcome';
                $data['site_title'] = 'My Assignment';
                $data['page_title'] = 'Welcome -'.$data['site_title'];                    
                $this->load->view('layout',$data);
            }
            else
            {
                redirect(site_url('Login'));
            }

        }
    }