<?php
    class MY_Model extends CI_Model{
//CRUD

        public $table_name ;
//  ----   CREATE / INSERT   ----  //
        public function insertValue(string $table , array $arr){
            $this->table_name = $table; 
            $query = $this->db->insert($this->table_name , $arr);
            if($query)
            {
                $msg = 'data inserted successfully at ';
                return $msg . $this->db->insert_id();
            }     
            else
            {
                return 'ERROR';
            }    
        }

//  ----   RETRIEVE / SELECT   ----   //
        public function selectValue(string $table, int $id = null){ 
            $this->table_name = $table;

            if(!empty($id))
            {
                $query = $this->db->get_where($this->table_name , ['id' => $id])
                                  ->result();
                return $query;    
            }
            else
            {
                $query = $this->db->get($this->table_name)
                                  ->result();
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