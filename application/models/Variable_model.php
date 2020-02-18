<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'models/custom/SYS_Model.php';


class Variable_model extends SYS_Model {
    
    public function create($input){
        return $this->db->insert('pmis_variable', $input);
    }
    
    public function update($input, $id){
        $this->db->where('id_variable', $id);
        return $this->db->update('pmis_variable', $input);
    }
    
    public function list(){
        $query = $this->db->get('pmis_variable');
        $result = $query->result();
        return $result;
    }
    
    public function findById($id){
        $this->db->where('id_variable', $id);
        $query = $this->db->get('pmis_variable');
        $result = $query->result();
        return $result;
    }
    
 
}
