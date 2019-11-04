<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class User extends MY_Controller{

        public $value = 
                        [   'name'  => 'User1',
                            'age'   => '14',
                            'email' => 'user1@email.com'
                        ];
                        // [   'name'      => 'Camera',
                        //     'price'     => '120000',
                        //     'color'     => 'black'
                        // ];

// ----    ***    INSERT    ***    ----  //
        public function addVal(string $table_name){
            $data['view']       = 'User';
            $data['site_title'] = 'My Assignment';
            $data['page_title'] = 'User -'.$data['site_title'];
            
            $this->load->model('UserModel');
            
            $result = $this->UserModel->insertValue($table_name , $this->value);
            $data['result_inserted'] = $result;

            $this->load->view('layout' , $data);
        }

// ----    ***    UPDATE    ***    ----  //       
        public function updateVal(string $table_name, int $id = null){
            $data['view']       = 'User';
            $data['site_title'] = 'My Assignment';
            $data['page_title'] = 'User -'.$data['site_title'];
            
            $this->load->model('UserModel');
            
            $result = $this->UserModel->updateValue($table_name , $this->value , $id);
            $data['result_updated'] = $result;

            $this->load->view('layout' , $data);
        }

// ----    ***    SELECT    ***    ----  //
        public function selectVal(string $table_name, int $id = null){
            $data['view']       = 'User';
            $data['site_title'] = 'My Assignment';
            $data['page_title'] = 'User -'.$data['site_title'];
            
            $this->load->model('UserModel');
            
            $result = $this->UserModel->selectValue($table_name , $id);
            $data['selected_result'] = $result;

            $this->load->view('layout' , $data);
        }

// ----    ***    DELETE    ***    ----  //
        public function deleteVal(string $table_name, int $id ){
            $data['view']       = 'User';
            $data['site_title'] = 'My Assignment';
            $data['page_title'] = 'User -'.$data['site_title'];
            
            $this->load->model('UserModel');
            
            $result = $this->UserModel->deleteValue($table_name , $id);
            $data['result_deleted'] = $result;

            $this->load->view('layout' , $data);
        }     
        
    }