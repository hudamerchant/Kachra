<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class UserModel extends MY_Model{

        public $table_name;
        function __construct()
        {
            parent::__construct();
            $this->table_name = 'users';
        }   
    }