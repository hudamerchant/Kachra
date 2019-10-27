<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class About_us extends MY_Controller{
        public function index(){
            $this->load->helper('url');  //for linking css in view
            $this->load->view('About_us');
        }
    }