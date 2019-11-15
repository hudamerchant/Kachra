<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class ChatboxModel extends MY_Model{

        public $table_name;
        function __construct()
        {
            parent::__construct();
            $this->table_name = 'chat';
        }   
    }