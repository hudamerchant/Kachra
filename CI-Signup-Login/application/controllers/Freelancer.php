<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Freelancer extends MY_Controller{
        function __construct(){
            parent::__construct();
        }
        public function index(){ 
            $this->load->model('UserModel');
            if($this->session->userdata('logged in')){
                $where  = [ 'email' => $this->session->userdata('user_info') ];
                $user   = $this->UserModel->selectValue($where)->row();
                if($user->role_id == 1)
                {
                    $data['view']       = 'Freelancer';
                    $data['site_title'] = 'My Assignment';
                    $data['page_title'] = 'Freelancer -'.$data['site_title'];                    
                    $this->load->view('layout',$data);
                }
                elseif($user->role_id == 2)
                {
                    redirect(site_url('Client'));
                }
            }
            else
            {
                redirect(site_url('Login'));
            }

        }
    }