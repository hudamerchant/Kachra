<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Login extends MY_Controller{
        function __construct(){
            parent::__construct();
        }
        public function index(){
            if($this->session->userdata('logged in')){
                $this->load->model('UserModel');
                $where  = [ 'email' => $this->session->userdata('user_info') ];
                $user   = $this->UserModel->selectValue($where)->row();
                if($user->role_id == 1)
                {
                    redirect(site_url('Freelancer'));
                }
                elseif($user->role_id == 2)
                {
                    redirect(site_url('Client'));
                }
            }
            else
            {   
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
                        $where = [ 'email' => $email]; 
                        $user = $this->UserModel->selectValue($where)->row();
                        if(password_verify($password , $user->password))
                        {
                            $this->session->set_userdata('logged in' , true );
                            $this->session->set_userdata('user_info' , $user->email );
                            if($user->role_id == 1)
                            {
                                return redirect(site_url('Freelancer'));
                            }
                            elseif($user->role_id == 2)
                            {
                                return redirect(site_url('Client'));
                            }
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
    }