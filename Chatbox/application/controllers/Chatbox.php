<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Chatbox extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
    } 
    public function index(){ 
        $data['view']       = 'Chatbox';
        $data['site_title'] = 'My Assignment';
        $data['page_title'] = 'Chatbox -'.$data['site_title'];                   
        $this->load->view('layout',$data);
    }
    public function addChat(){
        $this->load->model('ChatboxModel');
        $this->load->model('UserModel');
        $user = $this->UserModel
                    ->selectValue('email' , $this->session->userdata('user_info'))
                    ->row();
        $user_id = $user->user_id;
        $arr = [    'message' => $_POST['message'],
                    'user_id' => $user_id ];
        $result = $this->ChatboxModel->insertValue($arr);
    }
    public function getChat(){
        $this->load->model('ChatboxModel'); 
        $this->load->model('UserModel');
        $offset = $_POST['offset'];
        $messages = $this->db
                    ->select()
                    ->from('chat')
                    ->offset(6)
                    ->get()
                    ->result();
        var_dump($messages);die;
        // foreach($messages as $msg_obj)
        // {
        //     $html = '<li>';
        //     $html .= $msg_obj->message;
        //     $html .= '</li>';
        // }
        // echo $html;
    }
}
