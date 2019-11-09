<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Welcome extends MY_Controller{
        public function index(){ 
            $data['view']       = 'Welcome';
            $data['site_title'] = 'My Assignment';
            $data['page_title'] = 'Welcome -'.$data['site_title'];                    
            $this->load->view('layout',$data);

        }
    }