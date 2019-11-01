<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class UserModel extends MY_Controller{
        public function index(){ 
            $query = $this->db->get('users');
            return $query;
        }
    }