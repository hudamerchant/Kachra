<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Client extends MY_Controller{
        function __construct(){
            parent::__construct();
        }
        public function index(){ 
            $this->load->model('UserModel');
            if($this->session->userdata('logged in')){
                $where  = [ 'email' => $this->session->userdata('user_info') ];
                $user   = $this->UserModel->selectValue($where)->row();
                if($user->role_id == 2)
                {
                    $data['view']       = 'Client';
                    $data['site_title'] = 'My Assignment';
                    $data['page_title'] = 'Client -'.$data['site_title'];                    
                    $this->load->view('layout',$data);
                }
                elseif($user->role_id == 1)
                {
                    redirect(site_url('Freelancer'));
                }
            }
            else
            {
                redirect(site_url('Login'));
            }

        }
    }