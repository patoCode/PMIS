<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'models/custom/SYS_Model.php';


class Variable_model extends SYS_Model {

    public function create($input){
        print_r($input);
        return $this->db->insert('pmis_variable', $input);
    }

    public function update($input, $id){
        $this->db->where('id_variable', $id);
        return $this->db->update('pmis_variable', $input);
    }

    public function delete(){}

    public function list(){
        $this->db->where('estado_reg',ESTADO_REG_VALID);
        $this->db->where('estado',ESTADO_ACTIVO);
        $query = $this->db->get('pmis_variable');
        $result = $query->result();
        return $result;
    }

    public function findById($id){
        $this->db->where('id_variable', $id);
        $this->db->where('estado_reg',ESTADO_REG_VALID);
        $this->db->where('estado',ESTADO_ACTIVO);
        $query = $this->db->get('pmis_variable');
        $result = $query->result();
        return $result;
    }


}
