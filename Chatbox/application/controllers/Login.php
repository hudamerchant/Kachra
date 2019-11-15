<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Login extends MY_Controller{
        function __construct()
        {
            parent::__construct();
        } 
        public function index(){ 
            $this->load->library('form_validation');
            if(isset($_POST['submit']))
            {
                $rules = [
                            [
                                'field' => 'email' ,
                                'label' => 'Email' ,
                                'rules' => 'required'
                            ],
                            [
                                'field' => 'password' ,
                                'label' => 'Password' ,
                                'rules' => 'required'
                            ]
                        ];
                
                $this->form_validation->set_rules($rules);
                if (!$this->form_validation->run())
                {
                    $data['view']       = 'Login';
                    $data['site_title'] = 'My Assignment';
                    $data['page_title'] = 'Login -'.$data['site_title'];                    
                    $this->load->view('layout',$data);
                    
                }
                else
                {
                    $email         = $_POST['email'];
                    $password      = $_POST['password'];

                    $this->load->model('UserModel');
                    $user = $this->UserModel->selectValue('email' , $email)->row();
                    if(password_verify($password , $user->password))
                    {
                        $this->session->set_userdata('status', 'logged in');
                        $this->session->set_userdata('user_info', $user->email);
                        return redirect(site_url('Chatbox'));
                    }
                    else
                    {
                        $data['view']       = 'Login';
                        $data['site_title'] = 'My Assignment';
                        $data['page_title'] = 'Login -'.$data['site_title'];
                        $this->session->set_flashdata('login_error', 'Invalid Email or Password!');                    
                        $this->load->view('layout',$data);
                        
                    }
                }

            }
            else
            {
                $data['view']       = 'Login';
                $data['site_title'] = 'My Assignment';
                $data['page_title'] = 'Login -'.$data['site_title'];
                $this->load->view('layout',$data);
            }
        }
    }