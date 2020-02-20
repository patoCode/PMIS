<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'models/custom/SYS_Model.php';


class Privilege_model extends SYS_model{
    
    public function create($input){}
    public function update($input, $id){}
    public function delete(){}
    public function list(){}
    public function findById($id){}
    
    public function getPrivilegesByIdUser($idUser){
        $this->db->select('p.id_privilegio, p.privilegio, p.route');
        $this->db->from('pmis_rol_usuario pru');
        $this->db->join('pmis_privilegio_rol pr','pr.id_rol = pru.id_rol');
        $this->db->join('pmis_privilegio p','p.id_privilegio = pr.id_privilegio');
        $this->db->where('id_usuario', $idUser);
        $this->db->group_by('p.id_privilegio, p.privilegio, p.route');
        $result = $this->db->get();
        return $result->result();
    }
}