<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Home extends MY_Controller{
        public function index(){ 
            $this->load->helper('url');  //for linking css in view 
            $this->load->view('Home_page');
        }
    }