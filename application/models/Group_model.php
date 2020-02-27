<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'models/custom/SYS_Model.php';


class Group_model extends SYS_model{

    public function create($input){
        return $this->db->insert('pmis_grupo', $input);
    }
    public function update($input, $id){}
    public function delete(){}
    public function list(){
        $this->db->where('estado_reg',ESTADO_REG_VALID);
        $this->db->where('estado',ESTADO_ACTIVO);
        $query = $this->db->get('pmis_grupo');
        $result = $query->result();
        return $result;
    }
    public function findById($id){}

}