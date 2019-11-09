<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Login extends MY_Controller{
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
                    $users = $this->UserModel->selectValue()->result_array();
                    $found = false ;
                    foreach($users as $user)
                    {
                        if(password_verify($password , $user['password']))
                        {
                            $found = true;
                        }
                    }
                    if($found)
                    {
                            
                        $this->session->set_userdata('status', 'logged in');
                        return redirect(site_url('Welcome'));
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