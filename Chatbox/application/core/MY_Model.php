<?php
    class MY_Model extends CI_Model{
        function __construct()
        {
            parent::__construct();
        } 
//  ----   CREATE / INSERT   ----  //
        public function insertValue(array $arr){
            $query = $this->db->insert($this->table_name , $arr);
            if($query)
            {
                return $this->db->affected_rows();
            }     
            else
            {
                return 'ERROR';
            }    
        }

//  ----   RETRIEVE / SELECT   ----   //
        public function selectValue( string $where = '' , $value = '' , $offset = ''){
            if(!empty($where))
            {
                $query = $this->db->select()
                                    ->from($this->table_name)
                                    ->where( $where , $value )
                                    ->offset($offset)
                                    ->get();
                // $query = $this->db->get_where($this->table_name ,[ $where => $value ] , $offset );
                return $query;    
            }
            else
            {
                $query = $this->db->get($this->table_name);
                return $query;
            }
        }

//  ----   UPDATE   ----  //
        public function updateValue(string $table , array $arr , int $id = null){ 
            $this->table_name = $table;
            
            if(!empty($id))
            {
                $query = $this->db->update($this->table_name , $arr , ['id' => $id]);
                if($query){
                    $msg = 'Record updated successfully at ';
                    return $msg . $id;
                }     
                else
                {
                    return 'ERROR';
                }      
            }
            else
            {
                $query = $this->db->update($this->table_name , $arr);
                if($query){
                    $msg = 'Table updated successfully';
                    return $msg ;
                }     
                else
                {
                    return 'ERROR';
                }             
            }
        }


//  ----   DELETE   ----  //
        public function deleteValue(string $table , int $id){ 
            $this->table_name = $table; 
            $query = $this->db->delete($this->table_name , ['id' => $id]);      
            if($query){
                $msg = 'Record deleted successfully';
                return $msg ;
            }     
            else
            {
                return 'ERROR';
            }
        }

    }