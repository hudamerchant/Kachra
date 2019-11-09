<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Signup extends MY_Controller{
        public function index(){
            $data['view']       = 'Signup';
            $data['site_title'] = 'My Assignment';
            $data['page_title'] = 'Sign Up -'.$data['site_title'];                    
                
            $this->load->library('form_validation');
            if(isset($_POST['submit']))
            {
                $rules = [
                            [
                                'field' => 'name' ,
                                'label' => 'Name' ,
                                'rules' => 'required'
                            ],
                            [
                                'field' => 'age' ,
                                'label' => 'Age' ,
                                'rules' => 'required|numeric'
                            ],
                            [
                                'field' => 'email' ,
                                'label' => 'Email' ,
                                'rules' => 'required|valid_email'
                            ],
                            [
                                'field' => 'password' ,
                                'label' => 'Password' ,
                                'rules' => 'required|min_length[8]'
                            ],
                            [
                                'field' => 're_password' ,
                                'label' => 'Confirm Password' ,
                                'rules' => 'required'
                            ],
                        ];

                $this->form_validation->set_rules($rules);
                if (!$this->form_validation->run())
                {
                    $data['view']       = 'Signup';
                    $data['site_title'] = 'My Assignment';
                    $data['page_title'] = 'Sign Up -'.$data['site_title'];                    
                    $this->load->view('layout',$data);
                    
                }
                else
                {
                    $name          = $_POST['name'];
                    $age           = $_POST['age'];
                    $email         = $_POST['email'];
                    $password      = $_POST['password'];
                    $re_password   = $_POST['re_password'];

                    if($password == $re_password)
                    {
                        $hash = password_hash($password,PASSWORD_DEFAULT);
                        $arr = ['name'      => $name,
                                'age'       => $age,
                                'email'     => $email,
                                'password'  => $hash,
                                ];
                        $this->load->model('UserModel');
                        $result = $this->UserModel->insertValue($arr);
                        $data['result'] = $result;
                        return redirect(site_url('Login'));
                    }
                    else
                    {                    
                        $data['error']      = 'Incorrect Password';
                        $this->load->view('layout',$data);
                        
                    }

                    $this->load->view('layout',$data);
                }
                
            }
            else
            {
                $this->load->view('layout',$data);
            }
            
        }
    }